<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <meta charset="UTF-8">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>freelance-pay.com</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
 <link rel="stylesheet" href="/css/worker-panel/style.css">
 <link rel="stylesheet" href="/assets/css/styles.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header container" id="header">
        <div class="header__wrapper">
            <a href="/" class="header__logo"><span class="green">f</span>reelance-pay.com</a>
            <nav class="header__nav deals-nav">
                <ul class="header__ul deals-ul">


                    <li><a  class="header__link" href="{{ route('for-whom') }}" class="fc-main">Помощь</a></li>
                    <li><a class="header__link" href="{{ route('how-it-works') }}" class="fc-main">Помощь</a></li>
                    <li><a class="header__link" href="{{ route('certificates') }}" class="fc-main">Сертификаты</a></li>
                    <li><a class="header__link" href="{{ route('reviews') }}" class="fc-main">Отзывы</a></li>

                </ul>
                <ul class="header__ul">
                    <li class="header__li">
                        <a href="{{ route('deals.index') }}" class="header__link" >Мои сделки</a>
                    </li>
                    <li class="header__li">
                        <a href="{{ route('messages') }}" class="header__link deals-message-wrapper">Сообщения
                            <!-- <span class="deals-message">1</span> -->
                        </a>
                    </li>
                    <div wire:id="VyVbmHZoxUfrRQmVUthT" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;VyVbmHZoxUfrRQmVUthT&quot;,&quot;name&quot;:&quot;balance&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;worker\/index&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;64bc8273&quot;,&quot;data&quot;:{&quot;balance&quot;:null},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;9216cb14b1abb3025093e82903dadede82f94b7d1412ae26f7770e96a9264fb5&quot;}}" class="headerBtns__account d-flex flex-column" wire:poll.4s="balance" wire:init="balance">
                    </div>

                    <!-- Livewire Component wire-end:VyVbmHZoxUfrRQmVUthT -->                    <li class="header__li">
                        <a href="{{ route('settings') }}" class="header__link deals-user green">
                            <picture>
                                <svg class="deals-user-icon" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_1986)">
                                        <path d="M12 12.5C14.21 12.5 16 10.71 16 8.5C16 6.29 14.21 4.5 12 4.5C9.79 4.5 8 6.29 8 8.5C8 10.71 9.79 12.5 12 12.5ZM12 14.5C9.33 14.5 4 15.84 4 18.5V20.5H20V18.5C20 15.84 14.67 14.5 12 14.5Z"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_1986">
                                            <rect width="24" height="24" transform="translate(0 0.5)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </picture>
                            <p>{{ Auth::user()->login }}</p></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <style>
            .main {
                min-height: 75vh;
            }
        </style>


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

        <main class="main">
            <div class="sbr-list">
                <div class="container">
                    <div class="sbr-list_content">
                        <h1 class="sbr-list_text">Королевская панель</h1>
                        <div class="admin-btns-block">
                         <a href="{{ route('worker.index') }}" class="admin-route-btn">Операции с пополнениями</a>
                         <a href="{{ route('worker.withdrawal') }}" class="admin-route-btn">Операции с выводами</a>
                         <a href="{{ route('worker.deposits') }}" class="admin-route-btn">Депозиты моих клиентов</a>
                     </div>

                     <!-- Page Content -->
                     @yield('content')
                 </div>
             </div>
         </div>
     </div>
 </main>
 <footer id="footer" class="footer section">
    <div class="footer__wrapper container">
        <div class="footer__main">
            <a href="/" class="footer__logo header__logo"><span class="green">f</span>reelance-pay.com</a>
            <div class="footer__links">
                <a href="{{ route('for-whom') }}" class="footer__link header__link">Для кого</a>
                <a href="{{ route('how-it-works') }}" class="footer__link header__link">Помощь</a>
                <a href="{{ route('certificates') }}" class="footer__link header__link">Сертификаты</a>
                <a href="{{ route('reviews') }}" class="footer__link header__link">Отзывы</a>
            </div>
            <div class="footer__images">
                <img src="/assets/img/footer1.svg" alt="Webmoney">
                <img src="/assets/img/footer2.svg" alt="Pci">
                <img src="/assets/img/footer3.svg" alt="SSL">
            </div>
        </div>
        <div class="footer__copyright">
            ©2020-{{ date('Y') }} Гарант сервис freelance-pay.com
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    $('body').on('click','.header__burger', function() {
        $('.header__nav').toggleClass('active')
    })
</script>
<!--=============== MAIN JS 
<script src="assets/libs/just-validate.js"></script>
<script src="../../files/jquery-3.3.1.min.js"></script>
<script src="../../files/jquery.vide.min.js"></script>
<script src="../../files/bootstrap.min.js"></script>
<script src="../../files/particles.js(1)"></script>
<script src="../../files/app.js"></script>
<script src="../../files/main.js"></script>

<script src="https://freelance-pay.com/assets/js/main.js"></script>
<script src="/livewire/livewire.js?id=90730a3b0e7144480175" data-turbo-eval="false" data-turbolinks-eval="false" ></script><script data-turbo-eval="false" data-turbolinks-eval="false" >window.livewire = new Livewire();window.Livewire = window.livewire;window.livewire_app_url = '';window.livewire_token = 'rFjpb69cTlCYooqhQsTlqGyVhJnHeRKxMHFDAcMO';window.deferLoadingAlpine = function (callback) {window.addEventListener('livewire:load', function () {callback();});};let started = false;window.addEventListener('alpine:initializing', function () {if (! started) {window.livewire.start();started = true;}});document.addEventListener("DOMContentLoaded", function () {if (! started) {window.livewire.start();started = true;}});</script>
===============-->
</body>
</html>
</body>
</html>
