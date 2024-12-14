@extends('layouts.app')

@section('content')
 <section class = "head">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Для кого</h2>
                </div>
            </div>
            <div class = "row">
                <div class = "head__description col-12 col-xl-6">
                    <p class = "text-center fc-main">freelance-pay.com – сервис для приема платежей и защиты онлайн сделок услуг. Для физических и юридических лиц.</p>
                </div>
            </div>
            <div class = "row">
                <div class = "headImgs d-flex justify-content-center">
                    <div class = "headImgs__img__users d-flex flex-column justify-content-center align-items-center">
                        <img src = "img/credit-card.svg">
                        <h4 class = "fc-white text-center">Продажа услуг по 100% предоплате</h4>
                    </div>
                    <div class = "headImgs__img__users d-flex flex-column justify-content-center align-items-center">
                        <img src = "img/money-back.svg">
                        <h4 class = "fc-white text-center">Гарантия оплаты при выполнении обязательств</h4>
                    </div>
                    <div class = "headImgs__img__users d-flex flex-column justify-content-center align-items-center">
                        <img src = "img/verified.svg">
                        <h4 class = "fc-white text-center">Защита от подлога и мошенничества</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "adv">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Преимущества сервиса</h2>
                </div>
            </div>
            <div class = "row justify-content-center">
                <div class = "advContent position-relative d-flex justify-content-center flex-wrap col-9 col-md-6 col-xl-12 px-0">
                    <div class = "advContent__img d-flex justify-content-center justify-content-xl-end">
                        <img src = "img/fazuir.png">
                    </div>
                    <ul class = "advContent__txt bc-akcent d-flex flex-column align-items-center justify-content-end justify-content-xl-center col-xl-4">
                        <li class = "fc-white text-center">Контроль ведения сделки;</li>
                        <li class = "fc-white text-center">Выгоднее и надежнее;</li>
                        <li class = "fc-white text-center">Профессиональная команда по урегулированию споров;</li>
                        <li class = "fc-white text-center">Прозрачные условия, автоматический расчет комиссии.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class = "useful">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Кому полезен freelance-pay.com</h2>
                </div>
            </div>
            <div class = "row">
                <div class = "usefulItems col-12">
                    <div class = "usefulItems__item d-flex align-items-center col-12">
                        <div class = "usefulItems__item__img text-center col-6">
                            <img src = "img/useful1.png">
                        </div>
                        <div class = "usefulItems__item__txt border-left fc-white bc-akcent col-6">
                            <p>Виртуальные услуги - freelance-pay.com защитит ваши интересы при продаже услуг, когда вы не можете заранее подтвердить качество исполнителя и не готовы рисковать, отдавая услуги без предоплаты.</p>
                        </div>
                    </div>
                    <div class = "usefulItems__item d-flex align-items-center col-12">
                        <div class = "usefulItems__item__txt border-right fc-white bc-akcent col-6">
                            <p>При продаже дорогой услуги freelance-pay.com необходим, так как предоплата и проверка подлинности товара, неотъемлемые условия, которые позволяют провести сделку для обеих сторон без рисков.</p>
                        </div>
                        <div class = "usefulItems__item__img text-center col-6">
                            <img src = "img/useful2.png">
                        </div>
                    </div>
                    <div class = "usefulItems__item d-flex align-items-center col-12">
                        <div class = "usefulItems__item__img text-center col-6">
                            <img src = "img/useful3.png">
                        </div>
                        <div class = "usefulItems__item__txt border-left fc-white bc-akcent col-6">
                            <p>freelance-pay.com позволит Заказчикам безопасно произвести предоплату онлайн, а вам получить гарантию, что Заказчик заплатит после выполнения вами всех обязательств.</p>
                        </div>
                    </div>
                    <div class = "usefulItems__item d-flex align-items-center col-12">
                        <div class = "usefulItems__item__txt border-right fc-white bc-akcent col-6">
                            <p>Оказание услуг, в том числе удаленно - freelance-pay.com упрощает удаленную работу, так как защищает стороны от риска неисполнения обязательств: Заказчик получает гарантию, что работа будет сделана, Исполнитель – оплату оказанных услуг. freelance-pay.com обеспечит выполнение условий сделки.</p>
                        </div>
                        <div class = "usefulItems__item__img text-center col-6">
                            <img src = "img/useful4.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "warning">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Предупрежден - значит вооружен</h2>
                </div>
            </div>
            <div class = "row">
                <div class = "warningItems col-12">
                    <div class = "warningItems__item d-flex align-items-center justify-content-center justify-content-xl-between flex-wrap col-12">
                        <div class = "warningItems__item__title position-relative text-center bc-akcent border-right col-6 col-md-4 col-xl-3">
                            <p class = "fc-white text-center p-0 m-0">Мошенник-заказчик</p>
                            <div class = "number">1</div>
                        </div>
                        <div class = "warningItems__item__txt d-flex col-12 col-xl-8">
                            <p class = "fc-main">В последнее время набирает оборот очень хитрый способ мошенничества. Мошенник-Заказчик готов вам оплатить полную цену услуги. Вы предоставляете ему кошелек для оплаты, а вместо оплаты вам приходит счет, по которому вы должны оплатить довольно немалую комиссию. Это мошенничество! Ни одна платежная система не требует оплаты комиссии от человека, принимающего денежные средства. Если вы подтвердите оплату, вы просто переведете деньги лжезаказчику, который после их получения просто пропадет из сети.</p>
                        </div>
                    </div>
                    <div class = "warningItems__item d-flex align-items-center justify-content-center justify-content-xl-between flex-wrap col-12">
                        <div class = "warningItems__item__title position-relative text-center bc-akcent border-right col-6 col-md-4 col-xl-3">
                            <p class = "fc-white text-center p-0 m-0">Кардинг</p>
                            <div class = "number">2</div>
                        </div>
                        <div class = "warningItems__item__txt d-flex col-12 col-xl-8">
                            <p class = "fc-main">Кардинг - если у Вас запрашивают CVV код карты и срок её действия - получив эти данные мошенник может снять с карты все деньги. Могут предоставить фейковый скриншот страницы оплаты.</p>
                        </div>
                    </div>
                    <div class = "warningItems__item d-flex align-items-center justify-content-center justify-content-xl-between flex-wrap col-12">
                        <div class = "warningItems__item__title position-relative text-center bc-akcent border-right col-6 col-md-4 col-xl-3">
                            <p class = "fc-white text-center p-0 m-0">страница-однодневка</p>
                            <div class = "number">3</div>
                        </div>
                        <div class = "warningItems__item__txt d-flex col-12 col-xl-8">
                            <p class = "fc-main">Если вам пишет человек со страницы-однодневки (допустим, 20 друзей, 1 фото, нет старых записей на стене в vk.com), то это скорее всего мошенник, но в любом случае мошенник НИКОГДА не согласится на гаранта. То же самое относится и к скайпу. В скайпе можно регистрироваться хоть 100 раз в день, поэтому после совершения сделки вы можете просто не найти этого человека при появлении каких-либо проблем.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row">
                <h4 class = "fc-main text-center">Будьте бдительны, не попадитесь на уловки мошенников!</h4>
            </div>
            <div class = "row justify-content-center">
                <div class = "warningPay d-flex justify-content-center align-items-center col-12 col-md-10 col-xl-8">
                    <p class = "fc-main text-center col-4 col-md-4 col-xl-3">Перевод средств с сайта производится в течении 24 часов, с 3% комиссией при переводе на Банковскую карту.</p>
                    <p class = "fc-main text-center col-4 col-md-4 col-xl-3">Перевод на платежные системы Qiwi Wallet, Yandex Money, Webmoney, PayPal осуществляются с комиссией 1.5%</p>
                </div>
            </div>
            <div class = "row">
                <div class = "warningDefault d-flex justify-content-center">
                    <div class = "warningDefault__item bc-akcent fc-white border-right text-center col-5 col-md-3 col-xl-2">
                        В случае выполнения обязательств перед Заказчиком денежные средства перейдут на ваш счет,
                    </div>
                    <div class = "warningDefault__item bc-akcent fc-white border-left text-center col-5 col-md-3 col-xl-2">
                        а при ненадлежащем исполнении условий сделки — возвращены Заказчику.
                    </div>
                </div>
            </div>
            <div class = "row">
                <div class = "warningAlert text-center fc-main  col-12">
                    <p>Помните! Никогда не проверяйте человека на честность самостоятельно, так как риск потерять ваш товар очень и очень велик! </p>
                    <p>Используйте гарант сервис freelance-pay.com.</p>
                    <p> Мошенник никогда, не при каких условиях не согласится на безопасную сделку, на гарант сервис.</p>
                </div>
            </div>
        </div>
    </section>
@endsection