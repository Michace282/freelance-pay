@extends('layouts.app')

@section('content')
 <section class = "head">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Наши клиенты</h2>
                </div>
            </div>
    </section>
    <section class = "clientsInfo bc-secondary p-0">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "clientsInfo__items fc-white d-flex justify-content-between col-12 col-xl-9">
                    <div class = "clientsInfo__item d-flex flex-column align-items-center col-3 col-xl-3">
                        <div class = "clientsInfo__item__img">
                            <img src = "img/customer.svg">
                        </div>
                        <div class = "d-flex align-items-center">
                            <h1>8k+</h1>
                        </div>
                        <p class = "text-center">
                            Клиентов - фрилансеров и исполнителей
                        </p>
                    </div>
                    <div class = "clientsInfo__item d-flex flex-column align-items-center col-3 col-xl-3">
                        <div class = "clientsInfo__item__img">
                            <img src = "img/handshake.svg">
                        </div>
                        <div class = "d-flex align-items-center">
                            <h1>10k+</h1>
                        </div>
                        <p class = "text-center">
                            Проведено безопасных сделок
                        </p>
                    </div>
                    <div class = "clientsInfo__item d-flex flex-column align-items-center col-3 col-xl-3">
                        <div class = "clientsInfo__item__img">
                            <img src = "img/money.svg">
                        </div>
                        <div class = "d-flex align-items-center">
                            <h1>5M+</h1>
                        </div>
                        <p class = "text-center">
                            Заработано за всю историю фриланс-биржи
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "countries">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <h3 class = "fc-main text-center col-12">Cтраны наших клиентов</h3>
            </div>
            <div class = "row position-relative justify-content-center">
                <div class = "countries__list d-flex justify-content-center col-12 col-xl-4">
                    <ul class = "fc-main p-0">
                        <li>Россия,</li>
                        <li>США,</li>
                        <li>Беларусь,</li>
                        <li>Молдова,</li>
                        <li>Индия,</li>
                        <li>Германия,</li>
                        <li>Канада,</li>
                        <li>Австралия,</li>
                        <li>Великобритания,</li>
                        <li>Франция,</li>
                        <li>Тайланд,</li>
                        <li>Греция,</li>
                        <li>Грузия,</li>
                        <li>Чехия</li>
                    </ul>
                    <ul class = "fc-main p-0">
                        <li>Венгрия,</li>
                        <li>Дания,</li>
                        <li>Мексика,</li>
                        <li>Израиль,</li>
                        <li>Польша,</li>
                        <li>Египет,</li>
                        <li>Тайланд,</li>
                        <li>Болгария,</li>
                        <li>Эстония,</li>
                        <li>Армения,</li>
                        <li>Азербайджан,</li>
                        <li>Казахстан,</li>
                        <li>Португалия,</li>
                        <li>Норвегия</li>
                    </ul>
                </div>
                <div class = "countries__map position-xl-relative text-center col-12 col-xl-7">
                    <img src = "img/map.svg" class = "position-xl-absolute">
                </div>
            </div>
        </div>
    </section>
    <section class = "clientsTrust">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h3 class = "text-center fc-main">Почему freelance-pay.com можно доверять?</h3>
                </div>
            </div>
            <div class = "row justify-content-md-center">
                <div class = "clientsTrustContent border-right bc-akcent d-none d-md-flex justify-content-xl-center align-items-center col-md-8 col-xl-8">
                    <div class = "clientsTrustContent__txt d-flex flex-column justify-content-center col-md-8 col-xl-8">
                        <p class = "fc-white">Надежность</p>
                        <p class = "fc-white">Персональный аттестат Webmoney выдан в 2009 году.</p>

                        <p class = "fc-white">Больше двух лет на рынке цифровых и материальных товаров в сфере безопасной сделки.</p>

                        <p class = "fc-white">Система вычисления вероятности того, что партнер по сделке - мошенник.</p>

                        <p class = "fc-white">Актуальный черный список с автоматической проверкой всех пользователей.</p>

                        <p class = "fc-white">Финансовые транзакции проходят через счёт в государственном банке.</p>
                    </div>
                    <div class = "clientsTrustContent__img d-flex flex-column justify-content-center align-items-center col-5">
                        <img src = "img/clients_trust_1.png">
                    </div>
                </div>
                <div class = "clientsTrustContent border-right bc-akcent d-none d-md-flex justify-content-xl-center align-items-center col-md-8 col-xl-8">
                    <div class = "clientsTrustContent__txt d-flex flex-column justify-content-center col-md-8 col-xl-8">
                        <p class = "fc-white">конфиденциальность</p>
                        <p class = "fc-white">Сделка проходит на закрытой странице, доступ к которой есть только у участников сделки и модератора сервиса.</p>

                        <p class = "fc-white">Запрет публикации данных для идентификации продаваемого товара/услуги.</p>

                        <p class = "fc-white">Простое урегулирование спорных ситуаций между продавцом и покупателем.</p>

                        <p class = "fc-white">Возможность проводить защищенные платежи между физическими лицами.</p>
                    </div>
                    <div class = "clientsTrustContent__img d-flex flex-column justify-content-center align-items-center col-5">
                        <img src = "img/clients-trust-2.png">
                    </div>
                </div>
                <div class = "clientsTrustContent border-right bc-akcent d-none d-md-flex justify-content-xl-center align-items-center col-md-8 col-xl-8">
                    <div class = "clientsTrustContent__txt d-flex flex-column justify-content-center col-md-8 col-xl-8">
                        <p class = "fc-white">Удобство</p>
                        <p class = "fc-white">Автоматизированное проведение сделки без участия реального посредника.</p>

                        <p class = "fc-white">Круглосуточная работа сервиса - сервис доступен к использованию в любое время суток.</p>

                        <p class = "fc-white">Защита сделок купли-продажи 24/7 без похода к юристу и в банк.</p>

                    </div>
                    <div class = "clientsTrustContent__img d-flex flex-column justify-content-center align-items-center col-5">
                        <img src = "img/clients-trust-3.png">
                    </div>
                </div>
                <div class = "clientsTrust__wrapper d-flex flex-column col-12">
                    <div class = "clientsTrustContent align-self-end border-right bc-akcent d-flex justify-content-end d-md-none col-11">
                        <div class = "clientsTrustContent__mobile col-12">
                            <img src = "img/clients_trust_1.png" class = "img-left col-6">
                            <p class = "fc-white">НАДЕЖНОСТЬ</p>
                            <p class = "fc-white">Персональный аттестат Webmoney выдан в 2009 году.</p>

                            <p class = "fc-white">Больше двух лет на рынке цифровых и материальных товаров в сфере безопасной сделки.</p>

                            <p class = "fc-white">Система вычисления вероятности того, что партнер по сделке - мошенник.</p>

                            <p class = "fc-white">Актуальный черный список с автоматической проверкой всех пользователей.</p>

                            <p class = "fc-white">Финансовые транзакции проходят через счёт в государственном банке.</p>
                        </div>
                    </div>
                    <div class = "clientsTrustContent align-self-start border-right bc-akcent d-flex justify-content-start d-md-none col-11">
                        <div class = "clientsTrustContent__mobile col-12">
                            <img src = "img/clients-trust-2.png" class = "img-right col-6">
                            <p class = "fc-white">КОНФИДЕНЦИАЛЬНОСТЬ</p>
                            <p class = "fc-white">Сделка проходит на закрытой странице, доступ к которой есть только у участников сделки и модератора сервиса.</p>

                            <p class = "fc-white">Запрет публикации данных для идентификации продаваемого товара/услуги.</p>

                            <p class = "fc-white">Простое урегулирование спорных ситуаций между продавцом и покупателем.</p>

                            <p class = "fc-white">Возможность проводить защищенные платежи между физическими лицами.</p>
                        </div>
                    </div>
                    <div class = "clientsTrustContent align-self-end border-right bc-akcent d-flex justify-content-start d-md-none col-11">
                        <div class = "clientsTrustContent__mobile col-12">
                            <img src = "img/clients-trust-3.png" class = "img-left col-6">
                            <p class = "fc-white">УДОБСТВО</p>
                            <p class = "fc-white">Автоматизированное проведение сделки без участия реального посредника.</p>

                            <p class = "fc-white">Круглосуточная работа сервиса - сервис доступен к использованию в любое время суток.</p>

                            <p class = "fc-white">Защита сделок купли-продажи 24/7 без похода к юристу и в банк.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection