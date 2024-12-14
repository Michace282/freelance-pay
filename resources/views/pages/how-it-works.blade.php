@extends('layouts.app')

@section('content')
 <section class = "head">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title text-center col-12">
                    <h2 class = "text-center fc-main">Как это работает?</h2>
                </div>
            </div>
            <div class = "row">
                <div class = "head__description">

                </div>
            </div>
            <div class = "row">
                <div class = "headImgs d-flex justify-content-center flex-wrap">
                    <div class = "headImgs__img d-flex flex-column align-items-center justify-content-start justify-content-xl-center">
                        <img src = "img/speech-bubble1.svg">
                        <p class = "fc-white">шаг 1</p>
                        <p class = "fc-white text-center">Заказчик и исполнитель договорились о сделке</p>
                    </div>
                    <div class = "headImgs__img d-flex flex-column align-items-center justify-content-start justify-content-xl-center">
                        <img src = "img/speech-bubble2.svg">
                        <p class = "fc-white">шаг 2</p>
                        <p class = "fc-white text-center">Заказчик либо исполнитель создает сделку</p>
                    </div>
                    <div class = "headImgs__img d-flex flex-column align-items-center justify-content-start justify-content-xl-center">
                        <img src = "img/speech-bubble3.svg">
                        <p class = "fc-white">шаг 3</p>
                        <p class = "fc-white text-center">Заказчик переводит средства на баланс сделки, сумма замораживается</p>
                    </div>
                    <div class = "headImgs__img d-flex flex-column align-items-center justify-content-start justify-content-xl-center">
                        <img src = "img/speech-bubble4.svg">
                        <p class = "fc-white">шаг 4</p>
                        <p class = "fc-white text-center">Осуществляется выполнение услуги исполнителем</p>
                    </div>
                    <div class = "headImgs__img d-flex flex-column align-items-center justify-content-start justify-content-xl-center">
                        <img src = "img/speech-bubble5.svg">
                        <p class = "fc-white">шаг 5</p>
                        <p class = "fc-white text-center">Заказчик принимает и проверяет услугу на соответствие</p>
                    </div>
                    <div class = "headImgs__img d-flex flex-column align-items-center justify-content-start justify-content-xl-center">
                        <img src = "img/speech-bubble6.svg">
                        <p class = "fc-white">шаг 6</p>
                        <p class = "fc-white text-center">Заказчик подтверждает платёж, деньги переходят на баланс исполнителю</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "howScheme">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "howScheme__title text-center col-12">
                    <h2 class = "text-center fc-main">Схема работы фриланс-биржи</h2>
                </div>
                <div class = "row justify-content-center">
                    <div class = "howSheme__description col-12 col-xl-5">
                        <p class = "text-center fc-main ">Все защищенные сделки имеют определенные статусы в зависимости от этапа. Статусы управляются пользователями или сервисом, согласно заданных условий.</p>
                    </div>
                </div>
            </div>
            <div class = 'row'>
                <div class = "howScheme__items d-flex flex-wrap justify-content-center align-items-start col-12">
                    <div class = "howScheme__item bc-akcent border-left fc-white d-flex flex-column align-items-center col-12 col-xl-3">
                        <img src = "img/process.svg" class = "align-self-end">
                        <h3>Статус «Ожидает подтверждения»</h3>
                        <p>После того, как Заказчик или Исполнитель создали сделку, статус сделки становится «Ожидает подтверждения». В этом статусе Заказчик или Исполнитель должны подтвердить сделку на странице Мои сделки.
                            В условиях сделки можно указать подробные условия, обязательные к исполнению одной или обеими сторонами – условия доставки, этапы оплаты, качество услуг, срок проверки или гарантийные обязательства.</p>
                    </div>
                    <div class = "howScheme__item bc-akcent border-left fc-white d-flex flex-column align-items-center col-12 col-xl-3">
                        <img src = "img/process2.svg" class = "align-self-end">
                        <h3>Статус «Ожидается оплата»</h3>
                        <p>После подтверждения сделки обеими сторонами, сделка переходит в статус «Ожидается оплата». Для совершения дальнейших действий Заказчику необходимо произвести оплату по сделке.</p>
                    </div>
                    <div class = "howScheme__item bc-akcent border-left fc-white d-flex flex-column align-items-center col-12 col-xl-3">
                        <img src = "img/process3.svg" class = "align-self-end">
                        <h3>Статус «Оплачена»</h3>
                        <p>Заказчик вносит деньги на баланс сделки, средства сразу же блокируются. Исполнитель видит это и передаёт услугу, после чего заказчик переводит деньги с баланса на баланс исполнителя. Исполнитель может отказаться от сделки и вернуть деньги заказчику. Суть в том, что участники могут переводить деньги с баланса только на баланс друг друга, но не на свои. В случае спора участники могут обратиться к гаранту сделок (арбитраж).</p>
                    </div>
                    <div class = "howScheme__item bc-akcent border-left fc-white d-flex flex-column align-items-center col-12 col-xl-4">
                        <img src = "img/process4.svg" class = "align-self-end">
                        <h3>Статус «Арбитраж»</h3>
                        <p>Если стороны не пришли к соглашению (услуга не соответствует заявленным характеристикам), то они могут прибегнуть к помощи опытных арбитражных консультантов freelance-pay.com которые изучат суть спора и предложат сторонам возможные компромиссные решения.</p>
                    </div>
                    <div class = "howScheme__item bc-akcent border-left fc-white d-flex flex-column align-items-center col-12 col-xl-4">
                        <img src = "img/process5.svg" class = "align-self-end">
                        <h3>Статус «Завершенная сделка»</h3>
                        <p>Сделка успешно завершена. В случае выполнения обязательств перед заказчиком freelance-pay.com переводит денежные средства на баланс исполнителя, при выявленном ненадлежащим исполнении условий сделки - возвращает заказчику. Сделка закрывается.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "howPeriod">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "howPeriod__title text-center col-12">
                    <h2 class = "text-center fc-main">Период защиты сделки</h2>
                </div>
            </div>
            <div class = "row justify-content-center">
                <div class = "howPeriod__description bc-secondary border-left fc-white col-12 col-xl-5">
                    <p>ВНИМАНИЕ! Период защиты сделки распространяется только в случае купли-продажи услуг.</p>

                    <p>Составляет 21 день с момента выполнения услуги, если в условиях сделки не указан иной срок. Если в течение периода защиты сделки Заказчик не осуществил действия “Подтвердить выполнение сделки” или “Арбитраж”, сделка считается завершенной, деньги переводятся Исполнителю.</p>
                </div>
            </div>
        </div>
    </section>
@endsection