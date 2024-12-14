@extends('layouts.app')

@section('content')
    <section class = "main">
        <div class = "container-fluid">
            <div class = "row">
                <div class = "mainImg d-block d-xl-none col-12">
                    <img src = "img/people.png">
                </div>
                <div class = "mainContent d-flex flex-column justify-content-center col-12 col-xl-7">
                    <h1 class = "fc-main">freelance-pay.com – ТВОЙ <span class = "fc-akcent">УМНЫЙ ВЫБОР</span> СРЕДИ ФРИЛАНС-БИРЖ</h1>
                    <div class = "mainContent__btns d-flex justify-content-center">
                                                    <a href="{{ route('deals.create') }}" class = "btn bc-secondary border-right fc-white  @if (!auth()->check()) openModal @endif" data-modal = "1">Начать сейчас</a>
                                                    @if (!auth()->check())
                            <button class = "btn bc-btn-lg border-left fc-white openModal" data-modal = "2">Регистрация</button>
                            @endif
                                            </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "partners">
        <div class = "container-fluid">
            <div class = "row">
                <div class="partnersInfo d-flex align-items-center justify-content-center col-12">
                    <span class = "fc-akcent">Нам доверяют:</span>
                    <div class = "partnersInfo__img d-flex align-items-center justify-content-center flex-wrap">
                        <img src="img/qiwi.svg">
                        <img src="img/avito.svg">
                        <img src="img/google.svg">
                        <img src="img/p&g.svg">
                        <img src="img/paypal.svg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "safe">
        <div class = "container-fluid">
            <div class = "row">
                <div class = "safeContent d-flex align-items-center justify-content-center justify-content-xl-between flex-wrap col-12">
                    <div class = "safeContent__txt col-12 col-xl-5">
                        <h3 class = "fc-main">Что такое безопасная сделка?</h3>
                        <p class = "fc-main">Безопасная сделка – сервис защиты исполнителя и заказчика в интернете.</p>

                        <p class = "fc-main">
                            Безопасная сделка гарантирует 100% предоплату,
                            которая хранится на счете гаранта freelance-pay.com,
                            пока исполнитель не выполнит все свои обязательства, а заказчик не получит услугу.
                            Также безопасная сделка обеспечивает сохранность средств заказчика:
                            если исполнитель нарушает условия сделки, гарант-сервис freelance-pay.com
                            возвращает средства или предлагает заказчику скидку.</p>
                    </div>
                    <div class = "safeContent__img col-12 col-xl-5">
                        <img src = "img/safe_block.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="steps">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <h3 class = "fc-main text-center col-12">Как это работает?</h3>
            </div>
            <div class = "row">
                <div class = "stepsFunc d-flex col-12">
                    <div class = "stepsFunc__elem btn fc-white border-right text-center tab__title active__tab" data-tab = "1">Заказчик</div>
                    <div class = "stepsFunc__elem btn text-center fc-white border-left tab__title" data-tab = "2">Исполнитель</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "tab-content" data-tab = "1">
                <div class = "stepsItems bc-secondary d-flex align-items-xl-center align-items-end col-12">
                    <div class = "stepItems__item activeItem d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/writing.svg">
                            <h4 class = "fc-white">Создайте сделку</h4>
                        </div>
                        <p class = "item__open fc-white">
                            Заполните все поля, логин исполнителя, условия сделки, цену, сроки.
                        </p>
                    </div>
                    <div class = "stepItems__item d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/hourglass.svg">
                            <h4 class = "fc-white">Дождитесь исполнителя</h4>
                        </div>
                        <p class = "item__open fc-white">
                            Исполнитель должен перейти в пункт Мои Сделки, после чего перейти на страницу самой сделки и принять её.
                        </p>
                    </div>
                    <div class = "stepItems__item d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/deal.svg">
                            <h4 class = "fc-white">Проведите сделку</h4>
                        </div>
                        <p class = "item__open fc-white">
                            Подробный процесс проведения сделки описан ниже.
                        </p>
                    </div>
                    <div class = "stepItems__item d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/operation.svg">
                            <h4 class = "fc-white">Подтвердите оплату</h4>
                        </div>
                        <p class = "item__open fc-white">
                            Если услуга соответствует заявленным характеристикам, после получения подтвердите платеж.
                        </p>
                    </div>
                </div>
            </div>
            <div class = "tab-content" data-tab = "2">
                <div class = "stepsItems bc-secondary d-flex align-items-xl-center align-items-end col-12">
                    <div class = "stepItems__item activeItem d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/writing.svg">
                            <h4 class = "fc-white">Заказчик создает сделку</h4>
                        </div>
                        <p class = "item__open fc-white">
                            После создания новая сделка появится в разделе Мои сделки. Вы должны принять её.
                        </p>
                    </div>
                    <div class = "stepItems__item d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/hourglass.svg">
                            <h4 class = "fc-white">Заказчик оплачивает
                                сделку</h4>
                        </div>
                        <p class = "item__open fc-white">
                            Ни в коем случае не передавайте услугу, если нет сообщения об оплате сделки.
                        </p>
                    </div>
                    <div class = "stepItems__item d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/deal.svg">
                            <h4 class = "fc-white">Проведите сделку</h4>
                        </div>
                        <p class = "item__open fc-white">
                            Подробный процесс проведения сделки описан ниже.
                        </p>
                    </div>
                    <div class = "stepItems__item d-flex flex-column align-items-center col-3">
                        <div class="block__open text-center">
                            <img src="img/operation.svg">
                            <h4 class = "fc-white">Подтвердите оплату</h4>
                        </div>
                        <p class = "item__open fc-white">
                            После того как заказчик подтвердит платеж, средства поступят на ваш баланс.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "scheme">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <h3 class = "fc-main col-12 text-center ">Схема работы фриланс-биржи</h3>
            </div>
            <div class = "row p-0">
                <div class = "schemeMain__items d-flex justify-content-between align-items-end col-12 p-0">
                    <div class = "schemeMain__item bc-akcent fc-white border-right col-4 col-xl-3">
                        <h4 class = "text-center">Регистрация</h4>
                        <p class = "text-center">Услуги нашего сервиса безопасных сделок предоставляются только после того,
                            как оба участника регистрируются на сайте.</p>
                    </div>
                    <div class = "schemeMain__item bc-akcent fc-white border-right col-4 col-xl-3">
                        <h4 class = "text-center">Закрытие сделки</h4>
                        <p class = "text-center">Если на балансе сделки нет денег, то заказчик её закрывает.
                            Сделка через гаранта завершена.</p>
                    </div>
                </div>
                <div class = "schemeMain__items d-flex justify-content-between align-items-center col-12 p-0">
                    <div class = "schemeMain__item bc-akcent fc-white border-right col-4 col-xl-3">
                        <h4 class = "text-center">Обсуждение условий сделки</h4>
                        <p class = "text-center">Участники обсуждают характеристики услуг и сумму оплаты, выбирают платежную систему.
                            Также обсуждают дальнейшие действия в случае претензии по услуге.</p>
                    </div>
                    <div class = "schemeMain__item bc-akcent fc-white border-right col-4 col-xl-4">
                        <h4 class = "text-center">Исполнение обязательств</h4>
                        <p class = "text-center">Заказчик вносит деньги на баланс сделки, средства сразу же блокируются.
                            Исполнитель видит это и передаёт услугу, после чего заказчик переводит деньги с баланса на баланс исполнителя.
                            Исполнитель может отказаться от сделки и вернуть деньги заказчику.
                            Суть в том, что участники могут переводить деньги с баланса только на баланс друг друга, но не на свои.
                            В случае спора участники могут обратиться к гаранту сделок (арбитраж).</p>
                    </div>
                </div>
                <div class = "schemeMain__items d-flex justify-content-center align-items-center col-12">
                    <div class = "schemeMain__item bc-akcent fc-white border-right col-4 col-xl-4">
                        <h4 class = "text-center">Открытие сделки</h4>
                        <p class = "text-center">Заказчик открывает сделку, исполнитель её принимает.
                            Если на данном этапе что-то идёт не так (исполнитель пропал), то сделка отменяется, оплата возвращается заказчику.
                            Для общения и передачи информации используется внутренний чат.</p>
                    </div>
                </div>
            </div>
            <div class = "row">
                <div class = "scheme__question d-flex justify-content-center align-items-center flex-wrap col-12">
                    <p class = "text-start text-xl-center fc-main col-10 col-xl-2 m-0">До сих пор есть вопросы?</p>
                    <p class = "text-end text-xl-center col-10 col-xl-2 m-0">
                        <a href = "javascript:void(0);" class = "open_support fc-akcent">Задайте их в нашем чате поддержки</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class = "reviewsSlider p-0">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <h3 class = "fc-main col-12 text-center ">Отзывы</h3>
            </div>
            <div class = "row">
                <div class = "sliderWrapper justify-content-center position-relative px-0 col-12">
                    <div class="slider position-relative d-flex align-items-center col-12">
                        <div class="slides d-flex">
                            <div class="slide d-flex align-items-center col-12">
                                <div class = "reviewSlider__img d-none d-xl-block col-4">
                                    <img src="img/photo_review_1.png">
                                </div>
                                <div class = "reviewSlider__img d-block d-xl-none col-1">
                                    <img src = "img/photo_review_mobile.png">
                                </div>
                                <div class = "reviewsSlider__content d-flex flex-column justify-content-center d-xl-block col-10 col-xl-9">
                                    <div class = "reviewsSlider__txt d-flex flex-row flex-xl-column align-items-center align-items-xl-start col-12 col-xl-8">
                                        <div class = "reviewsSlider__txt__img">
                                            <img src = "img/reviewer1.png">
                                        </div>
                                        <div class = "reviewsSlider__txt__review col-4 col-md-5 col-xl-9">
                                            <p class = "m-0 fc-main">
                                                "Очень удобная система. Прекрасно... что есть страховка от недобросовестных заказчиков. Удобный и понятный функционал. При необходимости всегда можно быстро заработать денег!"
                                            </p>
                                        </div>
                                    </div>
                                    <div class = "reviewsSlider__txt__username fc-main d-flex flex-row flex-xl-column col-12 col-xl-8">
                                        <p class = "m-0">Мария, </p>
                                        <p class = "m-0">дизайнер, </p>
                                        <p class = "m-0">г. Краснодар</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide d-flex align-items-center col-12">
                                <div class = "reviewSlider__img d-none d-xl-block col-4">
                                    <img src="img/photo_review_1.png">
                                </div>
                                <div class = "reviewSlider__img d-block d-xl-none col-1">
                                    <img src = "img/photo_review_mobile.png">
                                </div>
                                <div class = "reviewsSlider__content d-flex flex-column justify-content-center d-xl-block col-11 col-xl-9">
                                    <div class = "reviewsSlider__txt d-flex flex-row flex-xl-column align-items-center align-items-xl-start col-12 col-xl-8">
                                        <div class = "reviewsSlider__txt__img">
                                            <img src = "img/reviewer2.png">
                                        </div>
                                        <div class = "reviewsSlider__txt__review col-4 col-md-5 col-xl-9">
                                            <p class = "m-0 fc-main">
                                                "Сайт очень удобный и прибыльный. На нем реально заработать, главное не бояться и четко выполнять указанные задания. Данная площадка подойдет как для начинающего фрилансера, так и для более опытного. "
                                            </p>
                                        </div>
                                    </div>
                                    <div class = "reviewsSlider__txt__username fc-main d-flex flex-row flex-xl-column col-12 col-xl-8">
                                        <p class = "m-0">Александра, </p>
                                        <p class = "m-0">фрилансер, </p>
                                        <p class = "m-0">г. Томск</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slide d-flex align-items-center col-12">
                                <div class = "reviewSlider__img d-none d-xl-block col-4">
                                    <img src="img/photo_review_1.png">
                                </div>
                                <div class = "reviewSlider__img d-block d-xl-none col-1">
                                    <img src = "img/photo_review_mobile.png">
                                </div>
                                <div class = "reviewsSlider__content d-flex flex-column justify-content-center d-xl-block col-11 col-xl-9">
                                    <div class = "reviewsSlider__txt d-flex flex-row flex-xl-column align-items-center align-items-xl-start col-12 col-xl-8">
                                        <div class = "reviewsSlider__txt__img">
                                            <img src = "img/Ellipse_1.jpg">
                                        </div>
                                        <div class = "reviewsSlider__txt__review col-4 col-md-5 col-xl-9">
                                            <p class = "m-0 fc-main">
                                                "Одним из больших преимуществ данного сайта для меня было обеспечение
                                                безопасности сделки, т.е. заказчик НЕ сможет не заплатить
                                                Вам за выполненную качественно и в срок работу. "
                                            </p>
                                        </div>
                                    </div>
                                    <div class = "reviewsSlider__txt__username fc-main d-flex flex-row flex-xl-column col-12 col-xl-8">
                                        <p class = "m-0">Антон, </p>
                                        <p class = "m-0">фрилансер, </p>
                                        <p class = "m-0">г. Москва</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sliderControl control__left d-flex">
                        <img src="img/arrow-left.svg" class="sliderControl__left">
                    </div>
                    <div class="sliderControl control__right d-flex">
                        <img src="img/arrow-right.svg" class="sliderControl__right">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "adventages">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <h3 class = "fc-main col-12 text-center ">Почему freelance-pay.com можно доверять? </h3>
            </div>
            <div class = "row">
                <div class = "adventagesContent d-flex align-items-center justify-content-between col-12 col-xl-11">
                    <div class = "adventagesContent__items col-4 col-xl-6">
                        <div class = "adventagesContent__item text-center">
                            <img src = "img/nadezh.png">
                            <h4 class = "fc-main">Надежность</h4>
                        </div>
                        <div class = "adventagesContent__item text-center">
                            <img src = "img/konfid.png">
                            <h4 class = "fc-main">Конфиденциальность</h4>
                        </div>
                        <div class = "adventagesContent__item text-center">
                            <img src = "img/comfort.png">
                            <h4 class = "fc-main">Удобство</h4>
                        </div>
                    </div>
                    <div class = "adventagesContent__txt bc-akcent fc-white col-8 col-xl-6">
                        <p>Персональный аттестат Webmoney выдан в 2009 году.</p>

                        <p>Больше двух лет на рынке цифровых и материальных товаров в сфере безопасной сделки.</p>

                        <p>Система вычисления вероятности того, что партнер по сделке - мошенник.</p>

                        <p>Актуальный черный список с автоматической проверкой всех пользователей.</p>

                        <p>Финансовые транзакции проходят через счёт в государственном банке.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection