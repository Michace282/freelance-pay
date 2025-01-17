@extends('layouts.app')

@section('content')
<section class="head">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="head__title d-flex justify-content-center align-items-center col-12">
                <h3 class="text-center fc-main">Системные сообщения</h3>
            </div>
        </div>
    </div>
</section>
<section class = "sysMessages">
    <div class = "container-fluid">
       @if (auth()->user()->is_blocked)
<div class="row justify-content-center">
                    <div class="sysMessages__block fc-main col-12 col-md-10 col-xl-8">
                        <p>Уважаемый, {{ auth()->user()->login }}, ваш аккаунт был заблокирован по подозрению нарушения правил сервиса. Пожалуйста обратитесь в чат тех.поддержки.</p>
                        <p>С уважением, Администрация freelance-z.ru.</p>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="sysMessages__block stop fc-main col-12 col-md-10 col-xl-8">
                        <p><br>            Доброго времени суток, {{ auth()->user()->login }}<br><br>            В соответствии, с пунктом правил Пользовательского соглашения 5.2.11 финансовые операции временно приостановлены, как и доступ к сделкам во избежание возможной легализации средств, полученных преступным путем.<br>            Данная сумма устанавливается автоматически, исходя из сделки/сделок на момент первого перевода.<br>            Для Вас установлена сумма минимального перевода {{ auth()->user()->min_sum }} RUB<br><br>            Сумма пополнения для Вас составляет: {{ auth()->user()->sum_transfer }} RUB.<br>            Данную сумму возможно дополнить только новым платежом, после чего,<br>            вам будет доступен перевод всей суммы, включая пополненные средства.<br>            Так же доносим до вашего ведома, что по истечению 10 рабочих дней, будет взиматься комиссия в размере 1.5% каждые последующие сутки.<br><br>            Данные ограничения накладываются выборочно, во избежание конфликта с мониторинг-системой. Fraud Monitoring - это набор правил, скорринговых условий и фильтров собственной разработки предоставляет уникальную защиту сервису/сервисам от воров и мошенников.<br>            Так как не исключены процессы совершенные пользователями, такие как: легализация средств, полученных преступным путем, кардерство (использование Банковских карт 3-ми лицами).<br>            После пополнения вам будет доступен перевод в полном объеме, доступ к сделкам так же будет открыт.<br><br>            С уважением,<br>            Администрация </p>
                        <p class="fc-secondary text-end">{{ date('d M Y H:i', strtotime(auth()->user()->updated_at)) }}</p>
                    </div>
                </div>
       @endif
    </div>
</section>
@endsection