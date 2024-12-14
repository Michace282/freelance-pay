<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>freelance-pay.com</title>
   <link href="/img/icon32.png" rel="shortcut icon" type="image/x-icon">
   <link href="/img/icon256.png" rel="apple-touch-icon"
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/css/main.css">
   <link id = "id_theme_light" rel="stylesheet" title="theme" href=/css/style-light.css>
   <link id = "id_theme_dark" rel="stylesheet" title="theme" href=/css/style-dark.css>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

   <style >[wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline], [wire\:loading\.block], [wire\:loading\.flex], [wire\:loading\.table], [wire\:loading\.grid], [wire\:loading\.inline-flex] {display: none;}[wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short], [wire\:loading\.delay\.long], [wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest] {display:none;}[wire\:offline] {display: none;}[wire\:dirty]:not(textarea):not(input):not(select) {display: none;}input:-webkit-autofill, select:-webkit-autofill, textarea:-webkit-autofill {animation-duration: 50000s;animation-name: livewireautofill;}@keyframes livewireautofill { from {} }</style>
</head>
<body>
    <script src="/js/themeChangeBeforeHeader.js"></script>
    
        <header>
    <div class = container-fluid>
        <div class = "row">
            <div class = "header d-flex align-items-xl-center justify-content-between col-12">
                <div class="Nav__menu__img d-flex justify-content-center d-xl-none col-3">
                    <span></span>
                    <span></span>
                </div>
                <div class = "headerLogo d-flex align-items-center justify-content-center col-4 col-xl-1">
                    <div class = "headerLogo__title">
                        <a href="/" class = "fc-main">freelance-pay.com</a>
                    </div>
                </div>
            <nav class="headerNav d-flex justify-content-end justify-content-xl-between align-items-center col-4 col-xl-11">
    <ul class="headerNav__menu d-none d-xl-flex align-items-center col-12 col-xl-8">
        @auth
            <li class="d-flex align-items-center justify-content-center">
                <div class="headerNav__loggedin d-flex d-xl-none">
                    <a href="{{ route('account') }}" class="fc-akcent">Мой счет</a>
                    <span class="fc-akcent">{{ Auth::user()->balance }}s ₽</span>
                </div>
                <div class="headerNav__msgs d-block d-xl-none">
                    <a href="{{ route('messages') }}"><img src="/img/bell.svg" alt="Сообщения"></a>
                </div>
                <div class="headerNav__btn position-relative d-flex d-xl-none justify-content-center align-items-center fc-white bc-btn-lg border-right">
                    <img src="/img/user-menu.svg" alt="Меню пользователя">
                    <span id="shortcut_id_userName">{{ Auth::user()->login }}</span>
                    <img src="/img/up-arrow.svg" alt="Вверх">
                </div>
            </li>
            <li>
                <ul class="p-0 d-xl-none">
                    <li><a href="{{ route('deals.index') }}" class="fc-main">Мои сделки</a></li>
                    <li><a href="{{ route('settings') }}" class="fc-main">Настройки</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="fc-main">Выйти</button>
                        </form>
                    </li>
                </ul>
            </li>
        @elseauth
         @endauth
        @guest
            <li class="d-block d-xl-none col-12">
                <div class="headerNav__btn fc-white bc-btn-lg border-right text-center openModal" data-modal="1">
                    Войти
                </div>
            </li>
        @endguest

        <li><a href="{{ route('how-it-works') }}" class="fc-main">Как это работает</a></li>
        <li><a href="{{ route('for-whom') }}" class="fc-main">Для кого</a></li>
        <li><a href="{{ route('certificates') }}" class="fc-main">Сертификаты</a></li>
        <li><a href="{{ route('reviews') }}" class="fc-main">Отзывы</a></li>
        <li><a href="{{ route('performers') }}" class="fc-main">Лучшие исполнители</a></li>
        <li><a href="{{ route('clients') }}" class="fc-main">Наши клиенты</a></li>
    </ul>
    <div class="d-flex align-items-center justify-content-xl-end col-xl-4">
        @auth
            <div>
                <div class="headerNav__social loggedin d-flex">
                    <a href="#" class="changeTheme" data-theme="dark"><img src="/img/moon.svg" alt="Темная тема"></a>
                    <a href="#" class="changeTheme" data-theme="light"><img src="/img/sun_112421.svg" alt="Светлая тема"></a>
                </div>
                <div class="headerNav__loggedin d-none d-xl-flex">
                    <a href="{{ route('account') }}" class="fc-akcent">Мой счет</a>
                    <span class="fc-akcent">{{ Auth::user()->balance }} ₽</span>
                </div>
            </div>
            <div class="headerNav__msgs d-none d-xl-block">
                <a href="{{ route('messages') }}"><img src="/img/bell.svg" alt="Сообщения"></a>
            </div>
            <div class="headerNav__btn btn__drop position-relative d-none d-xl-flex justify-content-xl-center fc-white bc-btn-lg border-right">
                <img src="/img/user-menu.svg" alt="Меню пользователя">
                <span>{{ Auth::user()->login }}</span>
                <img src="/img/down.svg" class="headerNav__arrow rotate__img" alt="Вниз">
                <div class="headerNav__drop border-right-top bc-block position-absolute">
                    <ul class="p-0">
                        <li><a href="{{ route('deals.index') }}" class="fc-main">Мои сделки</a></li>
                        <li><a href="{{ route('settings') }}" class="fc-main">Настройки</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="fc-main">Выйти</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @elseauth
             @endauth
        @guest
            <div class="headerNav__social d-flex">
                <a href="#" class="changeTheme" data-theme="dark"><img src="/img/moon.svg" alt="Темная тема"></a>
                <a href="#" class="changeTheme" data-theme="light"><img src="/img/sun_112421.svg" alt="Светлая тема"></a>
            </div>
            <div class="headerNav__btn d-none d-xl-flex justify-content-xl-center fc-white bc-btn-lg border-right openModal" data-modal="1">Войти</div>
            @endguest
   
    </div>
</nav>
            </div>
        </div>
    </div>
</header>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

        <!-- Page Content -->
        @yield('content')

        <div class="darkScreen d-none"></div>
<div id="myModal" data-modal='1' class="Modal align-items-center justify-content-center">
    <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
        <div class="modal__header d-flex justify-content-between align-items-center">
            <h3 class = "fc-main">Войти</h3>
            <span class="iconClose closeModal">&times;</span>
        </div>
        <div class="modal__body">
            <form action="{{ route('login') }}" id="loginForm" method="POST" class="form__login d-flex flex-column justify-content-center align-items-center">
                @csrf
                <div class="form__field d-flex align-items-center">
                    <img src = "/img/user.svg">
                    <input type="text" name="login" required="" placeholder="Логин">
                </div>
                <div class="form__field d-flex align-items-center">
                    <img src = "img/unlock.svg">
                    <input type="password" class="password_field" name="password" required="" placeholder="Пароль">
                    <div>
                        <img class = "password_hidder active" src = "/img/hide.svg">
                    </div>
                </div>
                <div class="modal__alert fc-alert">
                    Неправильный пароль
                </div>
                <div class="modalButtons">
                    <button class="btn bc-secondary fc-white border-right" type="submit">Войти</button>
                </div>
            </form>
        </div>
        <div class = "modal__footer fc-main">
            Нет учетной записи? <span class="fc-akcent openModal closeModal" data-modal='2'>Зарегистрировать</span>
        </div>
    </div>
</div>

<div class="darkScreen d-none"></div>
<div id="myModal" data-modal='2' class="Modal align-items-center justify-content-center">
    <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
        <div class="modal__header d-flex justify-content-between align-items-center">
            <h3 class = "fc-main">Регистрация</h3>
            <span class="iconClose closeModal">&times;</span>
        </div>
        <div class="modal__body">
            <form action="{{ route('register') }}" id="registerForm"  method="POST" class="form__login d-flex flex-column justify-content-center align-items-center">
              @csrf                
              <div class="form__field d-flex align-items-center">
                    <img src = "/img/user.svg">
                    <input type="text" name="login" required="" placeholder="Логин">
                </div>
                <div class="form__field d-flex align-items-center">
                    <img src = "/img/email.svg">
                    <input type="email" name="email" required="" placeholder="Email">
                </div>
                <div class="form__field d-flex align-items-center">
                    <img src = "/img/unlock.svg">
                    <input type="password" class="password_field" name="password" required="" placeholder="Пароль">
                    <div>
                        <img class = "password_hidder active" src = "/img/hide.svg">
                    </div>
                </div>
                <div class="form__field d-flex align-items-center">
                    <img src = "img/unlock.svg">
                    <input type="password" class="password_field" name="password_confirmation" required="" placeholder="Подтвердите пароль">
                    <div>
                        <img class = "password_hidder active" src = "/img/hide.svg">
                    </div>
                </div>
                <div class="modal__alert fc-alert">
                    Неправильный пароль
                </div>
                <div class="modalButtons">
                    <button class="btn bc-secondary fc-white border-right" type="submit">Регистрация</button>
                </div>
                <div class="form__field d-flex">
                    <input type="checkbox" id = "check" name="useragreement" required="" value="1" class = "agree">
                    <span class = "agreeSpan col-12">
                                    Я ознакомлен с
                                    <a href="rules.html" class = "fc-akcent">
                                        "Пользовательским соглашением"</a>
                                </span>
                    <label for = "check"></label>
                </div>
            </form>
        </div>
        <div class = "modal__footer fc-main align-self-start">
            Уже есть аккаунт? <span class = "openModal closeModal fc-akcent" data-modal='1'>Войти</span>
        </div>
    </div>
</div>

<!-- Ошибка транзакции-->

<!-- <div id="myModal" data-modal="7" class="Modal align-items-center justify-content-center modal__payment">
    <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
        <div class="modal__header d-flex justify-content-between align-items-center">
    
            <span class="iconClose closeModal">&times;</span>
        </div>
        <div class="modal__body">
            <div class="form__login d-flex flex-column justify-content-center align-items-center">
          
			<p class="modal__text">Ошибка создания транзакции. Обратитесь за помощью в техническую поддержку или воспользуйтесь ручным пополнением. 
			Приносим свои извинения.</p>

            </div>
        </div>
    </div>
</div> -->
<!--  Вы уверены, что хотите продолжить пополнение счета?-->
<div id="myModal" data-modal='3' class="Modal align-items-center justify-content-center modal__payment">
    <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
        <div class="modal__header d-flex justify-content-between align-items-center">
            <h3 class = "fc-main">Внимание</h3>
            <span class="iconClose closeModal">&times;</span>
        </div>
        <div class="modal__body">
            <div class="form__login d-flex flex-column justify-content-center align-items-center">
                <p class="modal__text">Вы уверены, что хотите продолжить пополнение счета?</p>
                <div class="modalButtons">
                    <button class="btn bc-secondary fc-white border-right trigger-button continue" type="submit" style="display: flex; justify-content: center;" onclick="createTransaction()"><p>Да</p>
					<img class="loading-img" style="max-width: 50px; margin: -15px; display: none" src = "/img/loading.webp"></button>
                    <button style = "display: none" class="btn bc-secondary fc-white border-right trigger-button paid" disabled onclick="paid()">Я оплатил(а)</button>
                </div>
            </div>
        </div>
    </div>
</div>		


<div id="myModal" data-modal="5" class="Modal align-items-center justify-content-center modal__payment" style="display: none;">
    <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
        <div class="modal__header d-flex justify-content-between align-items-center">
            <h3 class="fc-main">Пополнение</h3>
            <span class="iconClose closeModal">&times;</span>
        </div>
        <div class="modal__body">
        <p class="modal__text"><b style="color: #36AE7C">1. </b>Совершите перевод в течении <b style="color: #36AE7C">
            <span id="timer">20 минут 00 секунд</span></b> на следующий реквизит: 
             <b style="color: #36AE7C"><a>2200590432207565 TRANSCAPITALBANK </a></b><br><br>
            <b style="color: #36AE7C">2. </b>После этого вернитесь на наш сайт и <b style="color: #36AE7C">нажмите кнопку "Я оплатил(а)"</b>, чтобы заявка поступила в работу <br><br>
            <strong style="color: #36AE7C">Обратите внимание</strong>, что Вам необходимо совершить перевод по указанным реквизитам в течении действия таймера. 
            Если Вы не успели совершить перевод по истечению таймера - создайте новую заявку.</p>
            <div class="modalButtons">
                <button class="btn bc-secondary fc-white border-right trigger-button paid" onclick="paid()">Я оплатил(а)</button>
            </div>




        </div>
    </div>
</div>


<!-- Информация-->
<div id="myModal" data-modal="6" class="Modal align-items-center justify-content-center modal__payment">
    <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
        <div class="modal__header d-flex justify-content-between align-items-center">
            <h3 class="fc-main">Информация</h3>
            <span class="iconClose closeModal">&times;</span>
        </div>
        <div class="modal__body">
            <div class="form__login d-flex flex-column justify-content-center align-items-center">
          
                <p class="modal__text">
                    Ваши средства будут зачислены на Ваш аккаунт в течении от 5 минут до 24 часов.
                </p>


            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/createTransaction.js') }}" charset="UTF-8"></script>
    ﻿<!-- Begin of Chaport Live Chat code -->
<script type="text/javascript">
(function(w,d,v3){
w.chaportConfig = {
appId : '673c4a8aca833ece176ea932'
};

if(w.chaport)return;v3=w.chaport={};v3._q=[];v3._l={};v3.q=function(){v3._q.push(arguments)};v3.on=function(e,fn){if(!v3._l[e])v3._l[e]=[];v3._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.ru/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
</script>


<!-- End of Chaport Live Chat code -->    <footer>
    <div class = "container-fluid">
        <div class = 'row'>
            <div class = "footerNav d-flex align-items-center flex-wrap col-12">
                <div class = "footerNavLogo d-flex align-items-center justify-content-xl-center col-12 col-xl-1">
                    <div class = "footerNavLogo__title">
                        <a href = "/" class = "fc-main">freelance-pay.com</a>
                    </div>
                </div>
                <nav class = "col-12 col-xl-4">
                    <ul class = "footerNav__menu d-flex justify-content-between col-12">
                          <li><a href="{{ route('how-it-works') }}" class="fc-main">Как это работает</a></li>
                          <li><a href="{{ route('certificates') }}" class="fc-main">Сертификаты</a></li>
                          <li><a href = "{{ route('performers') }}" class = "fc-white">Лучшие исполнители</a></li>
                    </ul>
                    <ul class = "footerNav__menu d-flex justify-content-between col-12">
                        <li><a href="{{ route('for-whom') }}" class="fc-main">Для кого</a></li>
                        <li><a href = "{{ route('reviews') }}" class = "fc-white">Отзывы</a></li>
                        <li><a href = "{{ route('clients') }}" class = "fc-white">Наши клиенты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class = "row justify-contect-end">
            <div class = "footerSocial d-flex justify-content-end col-12">
                <img src = "/img/webmoney.svg">
                <img src = "/img/pci.svg">
                <img src = "/img/ssl.svg">
            </div>
        </div>
        <div class = "row">
            <div class = "footerInfo d-flex justify-content-between">
                <span class = "fc-white">©2020-2024 Гарант сервис</span>
                <span><a href = "rules.html" class = "fc-white">Пользовательское соглашение</a></span>
            </div>
        </div>
    </div>
</footer>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script>
        $('.hide_password').click(function () {
            if($(this).hasClass('active')){
                $('.hide_password').removeClass('active').attr('src','/img/remove_red_eye.svg');
                $('.password_field').attr('type','text');
            }else{
                $('.hide_password').addClass('active').attr('src','/img/hide password.svg');
                $('.password_field').attr('type','password');
            }
        })
    </script>
    <!-- Begin of Chaport Live Chat code -->
    <script type="text/javascript">
    (function(w,d,v3){
    w.chaportConfig = {
    appId : '67578c02df5722170fa2c953'
    };

    if(w.chaport)return;v3=w.chaport={};v3._q=[];v3._l={};v3.q=function(){v3._q.push(arguments)};v3.on=function(e,fn){if(!v3._l[e])v3._l[e]=[];v3._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.ru/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
    </script>
    <!-- End of Chaport Live Chat code -->

    <script src="/js/accordeon.js"></script>
    <script src="/js/blockopen.js"></script>

    <script src="/js/scripts.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/modal.js"></script>
    <script src="/js/tabs.js"></script>
    <script src="/js/slider.js"></script>

    <script src="/js/dropuser.js"></script>
    <script src="/js/back.js"></script>
    <script src="/js/theme.js"></script>
    <script src="/js/password_hidder.js"></script>
    <script src="/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="js/livewire.js" data-turbo-eval="false" data-turbolinks-eval="false" ></script><script data-turbo-eval="false" data-turbolinks-eval="false" >window.livewire = new Livewire();window.Livewire = window.livewire;window.livewire_app_url = '';window.livewire_token = 'nQU7pSBkMZL08X3kbmN5ZXSbIq3XwjmFJa545nwT';window.deferLoadingAlpine = function (callback) {window.addEventListener('livewire:load', function () {callback();});};let started = false;window.addEventListener('alpine:initializing', function () {if (! started) {window.livewire.start();started = true;}});document.addEventListener("DOMContentLoaded", function () {if (! started) {window.livewire.start();started = true;}});</script>-->
</body>
</html>
</body>
</html>
