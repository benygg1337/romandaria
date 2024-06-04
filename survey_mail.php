<?php

// Файлы phpmailer
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/php/PHPMailer.php';
require __DIR__ . '/php/SMTP.php';
require __DIR__ . '/php/Exception.php';

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

// Определяем путь и имя файла для логов
$logFile = __DIR__ . '/log.txt';

// Функция для записи логов
function writeLog($message)
{
    global $logFile;
    $logMessage = "[" . date("Y-m-d H:i:s") . "] " . $message . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}

function writeResponseLog($response)
{
    global $logFile;
    $logMessage = "[" . date("Y-m-d H:i:s") . " form_by_survey] Response: " . $response . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}


// Актуальная функция для проверки reCAPTCHA
function checkRecaptcha($response)
{
    define('SECRET_KEY', '6LceTPApAAAAADRkg0U_Hqb-LNobmxKAN4b4MKaV');
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => SECRET_KEY,
        'response' => $response
    ];

    $recaptcha_options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data)
        ]
    ];

    $recaptcha_context = stream_context_create($recaptcha_options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
    $recaptcha_json = json_decode($recaptcha_result);

    return $recaptcha_json;

}

//Проверка reCAPTCHA
if (isset($_POST['g-recaptcha-response'])) {
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $recaptcha_json = checkRecaptcha($recaptcha_response);
    $data['info_captcha'] = $recaptcha_json;

    if (!$recaptcha_json->success || $recaptcha_json->score < 0.6) {
        $data['result'] = "error";
        $data['errorType'] = "captcha";
        $data['info'] = "Ошибка проверки reCAPTCHA";
        $data['desc'] = "Вы являетесь роботом!";
        // Отправка результата
        header('Content-Type: application/json');
        echo json_encode($data);
        writeLog("Ошибка отправки письма: {$data['desc']}");
        writeResponseLog(json_encode($data));
        exit();
    }

} else {
    $data['result'] = "error";
    $data['errorType'] = "captcha";
    $data['info'] = "Ошибка проверки reCAPTCHA";
    $data['desc'] = "Код reCAPTCHA не был отправлен";
    // Отправка результата
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

// Будут ли на свадьбе
$visit = $_POST['form-visit'];
if ($visit === 'agree') {
    $visit = "Сможет присутствовать";
} elseif ($visit === 'notagree') {
    $visit = "Не сможет присутствовать";
}



// Предпочтения по еде 
$eatInput = $_POST['form-food'] ?? null; // Используем оператор нулевого слияния для предотвращения ошибки
if ($eatInput === 'meat') {
    $eat = "Мясо";
} elseif ($eatInput === 'fish') {
    $eat = "Рыба";
} elseif ($eatInput === 'bird') {
    $eat = "Птица"; 
} elseif ($eatInput === 'vegetable') {
    $eat = "Овощи";
}        
else {
    $eat = null; // Данные отсутствуют
}

// Предпочтения по алкоголю
$drinkInput = $_POST['form-drinks'] ?? null; // Используем оператор нулевого слияния для предотвращения ошибки
if ($drinkInput === 'white') {
    $drink = "Вино белое";
} elseif ($drinkInput === 'red') {
    $drink = "Вино красное";
} elseif ($drinkInput === 'vodka') {
    $drink = "Водка";
} elseif ($drinkInput === 'cognac') {
    $drink = "Коньяк";
}  elseif ($drinkInput === 'no-alco') {
    $drink = "Безалкогольное";
}
else {
    $drink = null; // Данные отсутствуют
}


// Проверка, что ошибки нет и переменные
if (!error_get_last()) {

    $phone = isset($_POST['form-phone']) && !empty($_POST['form-phone']) ? $_POST['form-phone'] : null;
    $guest = 'Не указано';
    $oldvisit = isset($_POST['old']) && !empty($_POST['old']) ? $_POST['old'] : 'Не указано';
    $childvisit = isset($_POST['child']) && !empty($_POST['child']) ? $_POST['child'] : 'Не указано';

    if (isset($_POST['form-name']) && !empty($_POST['form-name'])) {
        $guest = $_POST['form-name'];
    } elseif (isset($_POST['form-name-no']) && !empty($_POST['form-name-no'])) {
        $guest = $_POST['form-name-no'];
    }


    


//Отправка в таблицу
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . __DIR__ . '/secret_new.json');

$client = new Client();
$client->useApplicationDefaultCredentials();
$client->setApplicationName("marryme");
$client->setScopes([
    'https://www.googleapis.com/auth/spreadsheets'
]);
// Очистка и приведение типов данных

$oldvisit = trim($oldvisit);
$childvisit = trim($childvisit);

// Преобразование данных в целочисленные значения

$oldvisit = (int)$oldvisit;
$childvisit = (int)$childvisit;

try {
    $service = new Sheets($client);
    $spreadsheetId = '1rBIvNtSltU8YEVIduOltlJVHI3LvyW63F_VnfLXi2YE'; // Ваш ID таблицы
    $date_time = date("Y-m-d H:i:s");

    // Данные для добавления
    $values = [
        [$guest, $phone, $visit, $oldvisit, $childvisit, $eat, $drink, $date_time]
    ];
    
    $range = 'A2'; 
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    
    $params = [
        'valueInputOption' => 'RAW'
    ];

    $range = 'A2'; // Допустим, вы хотите начать добавление с A1
    $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
} catch (Exception $e) {
    // Обработка ошибки
    $data['result'] = "error";
    $data['info'] = "Произошла ошибка при добавлении данных в Google Sheets: " . $e->getMessage();
    writeLog("Ошибка Google Sheets: " . $e->getMessage());
    writeResponseLog(json_encode($data));
} 

    // Формирование самого письма
    $headers = "Content-Type: text/html; charset=UTF-8";
    $title = "Результат опроса";
    $body = "<h1>Запрос заполнил: $guest</h1>
    <b>Присутствие:</b> $visit<br>";

    if ($phone) {
        $body .= "<b>Номер телефона:</b> $phone<br>";
    }
    if ($oldvisit) {
        $body .= "<b>Количество взрослых:</b> $oldvisit<br>";
    }
    if ($childvisit) {
        $body .= "<b>Количество детей:</b> $childvisit<br>";
    }
    if ($eat) {
        $body .= "<b>Предпочтение по еде:</b> $eat<br>";
    }
    if ($drink) {
        $body .= "<b>Предпочтения по напиткам:</b> $drink<br>";
    }
 


    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function ($str, $level) {
        $GLOBALS['data']['debug'][] = $str;
    };

    // Настройки вашей почты
    $mail->Host = 'mail.marryme-invites.ru'; // SMTP сервера вашей почты
    $mail->Username = 'noreply@marryme-invites.ru'; // Логин на почте
    $mail->Password = '4638743aA'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('noreply@marryme-invites.ru', 'Свадебный сайт'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('loko419@yandex.ru'); 





//Определяем переменные файлов
    $file_arr = [
        'name' => [],
        'full_path' => [],
        'type' => [],
        'tmp_name' => [],
        'error' => [],
        'size' => []
    ];

    foreach ($_FILES as $name_file => $file_content){
        if(substr( $name_file, 0, 5 ) === "files"){
            $file_arr['name'][] = $file_content['name'];
            $file_arr['full_path'][] = $file_content['full_path'];
            $file_arr['type'][] = $file_content['type'];
            $file_arr['tmp_name'][] = $file_content['tmp_name'];
            $file_arr['error'][] = $file_content['error'];
            $file_arr['size'][] = $file_content['size'];
        }
    }
$file = $file_arr;

// Обработка массива файлов
for ($i = 0; $i < count($file['tmp_name']); $i++) {
    if ($file['error'][$i] === 0) {
        $mail->addAttachment($file['tmp_name'][$i], $file['name'][$i]);
    }
}

    //     // Сохраняем файл на сервер
//     if ($_SERVER["REQUEST_METHOD"] === "POST") {
//         // Проверка наличия файлов
//         if (!empty($file['name'][0])) {
//             $husband = htmlspecialchars($_POST['fio_husband']);
//             $wife = htmlspecialchars($_POST['fio_wife']);

    //             // Путь к папке загрузки с именем мужа и жены
//             $target_dir = __DIR__ . '/загрузки/' . $husband . '_' . $wife . '/';

    //             // Создание директории, если она не существует
//             if (!file_exists($target_dir)) {
//                 mkdir($target_dir, 0755, true);
//             }

    //         }
//     }

    // // Перемещение загруженных файлов
// foreach ($_FILES['formImage']['tmp_name'] as $key => $tmp_name) {
//     $file_name = basename($_FILES['formImage']['name'][$key]);
//     $target_file = $target_dir . $file_name;

    //     if (move_uploaded_file($tmp_name, $target_file)) {
//         // Файл успешно перемещен в папку "ЗАГРУЗКИ"
//         echo "Файл $file_name успешно загружен в папку 'ЗАГРУЗКИ'.";
//     } else {
//         echo "Ошибка при перемещении файла $file_name.";
//     }
// }

    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;

    // Проверяем отправленность сообщения
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
        writeLog("Сообщение успешно отправлено!");
        writeResponseLog(json_encode($data));
    } else {
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
        writeLog("Ошибка отправки письма: {$mail->ErrorInfo}");
        writeResponseLog(json_encode($data));
        
    }

} else {
    $data['result'] = "error";
    $data['info'] = "В коде присутствует ошибка";
    $data['desc'] = error_get_last();
}

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);

?>