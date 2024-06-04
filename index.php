<?php
/*
Template Name: Home
*/ ?>

<?php get_header(); ?>

<body>
    <div class="in9-wrapper">
        <main class="in9-page">
            <div class="in9-page__decor">
                <div class="in9-page__bg">
                    <div class="in9-border"></div>
                    <div class="in9-page__title">
                        Роман и Дарья
                        <span>24/07/2024</span>
                    </div>
                </div>

                <div class='in9-page__container _in9-container'>

                    <!-- Опрос -->
                    <div class="in9-survey">
                        <div class="in9-survey__block">
                            <div class="in9-survey__subtitle in9-title">Дорогие наши гости!</div>
                            <div class="in9-survey__text">
                                Позвольте пригласить Вас на самый знаменательный праздник этого лета - День Рождения
                                нашей семьи! Любовь, чувство юмора, уважение – это то, что нас соединило. Мы есть друг у
                                друга. И это то, чем мы хотим поделиться с Вами. Мы хотим, чтобы в этот день рядом с
                                нами были самые близкие и дорогие для нас люди.
                            </div>
                        </div>
                        <div class="in9-survey__title">Пожалуйста, подтвердите свое присутствие.</div>
                        <div class="in9-survey__box">
                            <div href="in9-form" onclick="showPopup('agree')"
                                class="in9-survey__btn in9-btn _popup-link">Я приду</div>
                            <div href="in9-form" onclick="showSurveyBox('notagree')"
                                class="in9-survey__btn in9-btn _popup-link">К
                                сожалению, я не приду</div>
                        </div>
                    </div>

                    <!-- История любви -->
                    <div class="in9-wishes">
                        <div class="in9-wishes__title in9-title">Наша история любви</div>
                        <div class="in9-wishes__text">Мы познакомились еще в далекие школьные годы, однако тогда были
                            просто друзьями. Хотя огонёчек любви зажегся у обоих, мы не предпринимали попыток пойти на
                            сближение. Пока однажды, на третьем курсе университета, Роман не выдержал и не решил взять
                            неприступную, но безумно привлекательную крепость Дарью! И вот с этого момента, ровно 4 года
                            назад, мы идем рука об руку по выбранному жизненному пути, даря любовь и счастье друг другу.
                        </div>
                        <div class="in9-wishes__row">
                            <div class="in9-wishes__column">
                                <div class="in9-wishes__image_1">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/wishes01.jpg" alt="" />
                                </div>
                            </div>
                            <div class="in9-wishes__column">
                                <div class="in9-wishes__image_2">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/wishes02.jpg" alt="" />
                                </div>
                            </div>
                            <div class="in9-wishes__column">
                                <div class="in9-wishes__image_3">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/wishes03.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Программа -->
                    <div class="in9-program">
                        <div class="in9-program__title in9-title">Программа свадебного дня</div>
                        <div class="in9-program__block">
                            <p></p>
                            <div class="in9-program__item">
                                <div class="in9-program__time">15:00</div>
                                <div class="in9-program__box">
                                    <div class="in9-program__subtitle">Сбор гостей у дома торжеств «Государь» на
                                        welcome-фуршет</div>
                                    <div class="in9-program__text">Дом торжеств «Государь» <br>
                                        Адрес: г. Москва, ул. Лобненская, д. 11 </div>
                                </div>
                            </div>
                            <div class="in9-program__item">
                                <div class="in9-program__time">16:00</div>
                                <div class="in9-program__box">
                                    <div class="in9-program__subtitle">Свадебная церемония</div>
                                </div>
                            </div>
                            <div class="in9-program__item">
                                <div class="in9-program__time">17:00 </div>
                                <div class="in9-program__box">
                                    <div class="in9-program__subtitle">Начало праздничного вечера</div>
                                </div>
                            </div>
                            <div class="in9-program__item">
                                <div class="in9-program__time">22:00</div>
                                <div class="in9-program__box">
                                    <div class="in9-program__subtitle">Окончание банкета</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Место торжества -->
                    <div class="in9-place">
                        <div class="in9-place__titel in9-title">Место торжества</div>
                        <div class="in9-place__row">
                            <div class="in9-place__column">
                                <div class="in9-place__item">
                                    <div class="in9-place__image"><img src="<?php bloginfo('template_url'); ?>/assets/img/place01.jpg" alt="" />
                                    </div>
                                    <div class="in9-place__block">
                                        <div class="in9-place__subtitle">Дом торжеств «Государь»</div>
                                        <a href="https://yandex.ru/maps/org/gosudar/1580125126/?indoorLevel=0&ll=37.530571%2C55.888922&z=17"
                                            class="in9-place__btn in9-btn_w">Посмотреть на карте</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Отвечаем на Ваши вопросы -->
                    <div class="in9-questions">
                        <div class="in9-questions__block">
                            <div class="in9-questions__decor">
                                <div class="in9-questions__title in9-title">Отвечаем на Ваши вопросы</div>
                                <div class="in9-questions__subtitle">Возможно ли приехать на своем автомобиле?</div>
                                <div class="in9-questions__text_1">Да, на территории имеется парковка на 40 машиномест.
                                </div>

                                <div class="in9-questions__subtitle">Какие подарки предпочтительны?  </div>
                                <div class="in9-questions__text_2">Не затрудняйте себя выбором подарка! Приносите себя,
                                    хорошее настроение и подарки в конвертах.</div>

                                <div class="in9-questions__subtitle">Нужно ли дарить цветы?</div>
                                <div class="in9-questions__text">Просим Вас не дарите нам цветы. Мы расстроимся, когда
                                    не сможем забрать их с собой с торжества. Возьмите вместо них бутылочку вашего
                                    любимого алкогольного или безалкогольного напитка. Обязательно напишите пожелание на
                                    какой повод нам стоит её открыть;)</div>

                                <div class="in9-questions__subtitle">Какой стиль свадьбы?</div>
                                <div class="in9-questions__text_2">Наша свадьба планируется в стиле «Greenary» - данный
                                    оттенок олицетворяет цвет свежей зелени как символ начала новой жизни. Поэтому
                                    подойдет абсолютно любой зеленый – изумрудный, оливковый, фисташковый, мятный,
                                    сливочный оттенок матча. Также актуальными цветами будут нюдовые оттенки природной
                                    гаммы.</div>

                                <div class="in9-questions__subtitle">Цветовая палитра свадьбы
                                </div>
                                <div class="col">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/color1.svg" alt="" />
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/color2.svg" alt="" />
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/color3.svg" alt="" />
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/color4.svg" alt="" />
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/color5.svg" alt="" />
                                </div>
                            </div>


                            <div class="in9-questions__subtitle">Будет ли дресс-код?
                            </div>
                            <div class="in9-questions__text_1">Будем очень признательны, если Вы поддержите палитру
                                нашего торжества при выборе своего наряда.
                                FOR LADIES: Праздничное платье или костюм в палитре свадьбы. </br>
                                FOR GENTLEMENS: Классический костюм или смокинг.</div>


                            <div class="in9-questions__subtitle">Кому можно задать вопросы по организации
                                мероприятия?
                            </div>
                            <div class="in9-questions__text_1">Если Вы потерялись, готовите сюрприз или у Вас
                                появились какие-либо вопросы, Вам с радостью подскажет наш организатор <br>
                                <a href="tel:+79658321965">+7 965-832-19-65</a> Мария
                            </div>
                            <a href="tel:+79658321965" class="in9-questions__btn in9-btn_w">Позвонить Марии</a>
                        </div>
                    </div>

                    <!-- Контакты -->
                    <div class="in9-contacts">
                        <div class="in9-contacts__block">
                            <div class="in9-contacts__text">Если вдруг Вы не сможете прийти, а уже подтвердили свое
                                присутствие, сообщите нам об этом лично. Для нас это очень важно.</div>
                            <div class="in9-contacts__row">
                                <div class="in9-contacts__column">
                                    <div class="in9-contacts__item">
                                        <div class="in9-contacts__name">
                                            Роман
                                            <span>8 (926) 872-15-72</span>
                                        </div>
                                        <a href="tel:+79268721572" class="in9-contacts__btn in9-btn_w">Позвонить
                                            жениху</a>
                                    </div>
                                </div>
                                <div class="in9-contacts__column">
                                    <div class="in9-contacts__item">
                                        <div class="in9-contacts__name">
                                            Дарья
                                            <span>8(985) 115-20-45</span>
                                        </div>
                                        <a href="tel:+79851152045" class="in9-contacts__btn in9-btn_w">Позвонить
                                            жениху</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="in9-footer">
                        <div class="in9-footer__items">
                            <div class="in9-footer__item">
                                <div class="in9-footer__text">
                                    Мы Вас ждем! <br>
                                    Дарья и Роман
                                </div>
                            </div>
                            <div class="in9-footer__item">
                                <div class="in9-footer__row">
                                    <div class="in9-footer__column">
                                        <div class="in9-footer__image">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/img/wishes04.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div class="in9-footer__column">
                                        <div class="in9-footer__image">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/img//wishes05.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div class="in9-footer__column">
                                        <div class="in9-footer__image">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/img/wishes06.jpg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="popup popup_in9-form">
    <div class="popup__content">
        <div class="popup__body">
            <div class="popup__close"></div>
            <div class="in9-form__content">
                <div class="in9-form__decor">
                    <div class="in9-form__title in9-title">Опрос</div>
                    <div class="in9-form__regret">Мы сожалеем, что вы не сможете присутствовать.</div>
                    <form enctype="multipart/form-data" method="POST"
                            action="/wp-content/themes/romandaria/survey_mail.php" class="in9-form__form">
                        <input type="hidden" id="attendanceStatus" name="form-visit" value="">
                        <div class="in9-form__block">
                            <div class="in9-form__box">
                                <input type="text" name="form-name" placeholder="Ваше имя и фамилия." data-value=""
                                    class="in9-form-input _req">
                                <input type="text" name="form-phone" placeholder="Ваш номер телефона." data-value=""
                                    class="in9-form-input _phone _req">
                            </div>
                            <div class="in9-form__subtitle">В каком количестве вы прийдете на торжество?</div>
                            <div class="in9-form__item">
                                <label for="adults" class="in9-radio__other">Взрослые
                                    <textarea name="old" data-value="Ваше пожелание" class="in9-survey-others _digital"
                                        rows="8"></textarea>
                                </label>
                                <label for="children " class="in9-radio__other">Дети
                                    <textarea name="child" data-value="Ваше пожелание"
                                        class="in9-survey-otherc _digital" rows="8"></textarea>
                                </label>
                            </div>
                            <div class="in9-form__subtitle">Ваши предпочитаемые блюда?</div>
                            <div class="in9-form__item">
                                <input id="radio-meat" type="radio" name="form-food" data-value="" value="meat"
                                    class="in9-form-input-radio" />
                                <label for="radio-meat" class="in9-form-radio">Мясные</label>

                                <input id="radio-fish" type="radio" name="form-food" data-value="" value="fish"
                                    class="in9-form-input-radio">
                                <label for="radio-fish" class="in9-form-radio">Рыбные</label>

                                <input id="radio-bird" type="radio" name="form-food" data-value="" value="bird"
                                    class="in9-form-input-radio">
                                <label for="radio-bird" class="in9-form-radio">Блюда из птиц</label>


                                <input id="radio-vegetable" type="radio" name="form-food" data-value="" value="vegetable"
                                    class="in9-form-input-radio">
                                <label for="radio-vegetable" class="in9-form-radio">Овощные</label>
                            </div>
                            <div class="in9-form__subtitle">Что Вы предпочитаете из напитков?</div>
                            <div class="in9-form__item">
                                <input id="radio-white" type="radio" name="form-drinks" data-value="" value="white"
                                    class="in9-form-input-radio">
                                <label for="radio-white" class="in9-form-radio">Вино белое </label>

                                <input id="radio-no-red" type="radio" name="form-drinks" data-value=""
                                    value="red" class="in9-form-input-radio">
                                <label for="radio-no-red" class="in9-form-radio">Вино красное</label>

                                <input id="radio-vodka" type="radio" name="form-drinks" data-value=""
                                    value="vodka" class="in9-form-input-radio">
                                <label for="radio-vodka" class="in9-form-radio">Водка</label>

                                <input id="radio-cognac" type="radio" name="form-drinks" data-value=""
                                    value="cognac" class="in9-form-input-radio">
                                <label for="radio-cognac" class="in9-form-radio">Коньяк </label>


                                <input id="radio-non-alcoholic" type="radio" name="form-drinks" data-value=""
                                    value="no-alco" class="in9-form-input-radio">
                                <label for="radio-non-alcoholic" class="in9-form-radio">Безалкогольное </label>
                            </div>
                        </div>

                        <div class="in9-form__box-no">
                            <input type="text" name="form-name-no" placeholder="Ваше имя и фамилия." data-value=""
                                class="in9-form-input-no _req">
                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <button type="submit" class="in9-form__btn in9-btn">Отправить</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup popup_thanks">
    <div class="popup__content">
        <div class="popup__body">
            <div class="popup__close"></div>
            <div class="thanks__title">Спасибо!</div>
            <div class="thanks__text">Анкета отправлена.<br>
            </div>
        </div>
    </div>
</div>
</body>

<?php
get_footer(); ?>