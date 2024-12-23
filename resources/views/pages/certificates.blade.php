@extends('layouts.app')

@section('content')
 <section class = "head">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Сертификаты</h2>
                </div>
            </div>
            <div class = "row">
                <div class = "head__description col-12 col-xl-6">
                    <p class = "text-center fc-main">Используйте наш сервис freelance-z.ru, не рискуя самостоятельно проверять человека на честность. Мошенник никогда и ни при каких условиях не согласиться проводить безопасную сделку.</p>
                </div>
            </div>
        </div>
    </section>
    <section class = "sert">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "sertItems col-12 col-xl-7">
                    <div class = "sertItems__item d-flex align-items-start align-items-xl-center justify-content-between col-12">
                        <div class = "sertItems__item__txt fc-main col-6">
                            <div class = "number">1</div>
                            <h3 class = "fc-main">SSL</h3>
                            <p>Протокол SSL обеспечивает защищенный обмен данных между пользователями сервиса.</p>
                        </div>
                        <div class = "sertItems__item__img text-center col-6">
                            <img src = "img/gg.svg">
                        </div>
                    </div>
                    <div class = "sertItems__item d-flex align-items-start align-items-xl-center justify-content-between col-12">
                        <div class = "sertItems__item__img col-6">
                            <img src = "img/ssltypeb-ev-grid.svg">
                        </div>
                        <div class = "sertItems__item__txt fc-main col-6">
                            <div class = "number">2</div>
                            <h3 class = "fc-main">Extended Validation Certificate (EV-сертификат)</h3>
                            <p>Сертификат с расширенной проверкой (EV-сертификат) доказывает, что сайт не является одним из мошеннических или поддельных сайтов. Владелец сертификата проходит полную проверку подлинности согласно самым высоким стандартам индустрии безопасности. Проверку и выпуск сертификата осуществляет специализированный центр сертификации (GeoTrust).</p>
                        </div>
                    </div>
                    <div class = "sertItems__item d-flex align-items-start align-items-xl-center justify-content-between col-12">
                        <div class = "sertItems__item__txt fc-main col-6">
                            <div class = "number">3</div>
                            <h3 class = "fc-main">PCI DSS</h3>
                            <p>Операции с банковским картами и электронные платежи осуществляются через партнеров MandarinPay и Robokassa, имеющих действующие сертификаты безопасности PCI DSS версии 3.2</p>
                        </div>
                        <div class = "sertItems__item__img text-center col-6">
                            <img src = "img/pci1.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "honest">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "honest__description bc-akcent border-right fc-white text-center text-xl-start col-12 col-xl-8">
                    <p>Помните! <br>
                        Никогда не проверяйте человека на честность самостоятельно, так как риск потерять ваш товар очень и очень велик! Используйте гарант сервис freelance-z.ru. <br>
                        Мошенник никогда, не при каких условиях не согласится на безопасную сделку, на гаранта.</p>
                </div>
            </div>
        </div>
    </section>
@endsection