@extends('layouts.app')

@section('content')
 <section class = "head">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Отзывы</h2>
                </div>
            </div>
            <div class = "row">
                <div class = "head__description col-12 col-xl-6">
                    <p class = "text-center fc-main"> Мы собрали честные отзывы от наших фрилансеров и вот что они думают про нас.</p>
                </div>
            </div>
        </div>
    </section>
    <section class = "reviews">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "reviews__item justify-content-between d-flex flex-column align-items-center border-right col-12 col-md-4 p-0">
                    <div class = "reviews__item__img bc-akcent d-flex align-items-center justify-content-center col-12">
                        <img src = "img/trustpilot_logo.svg">
                    </div>
                    <div class = "bc-block d-flex flex-column align-items-center">
                        <p class = "text-center fc-main">
                            Датская компания, управляющая веб-сайтом отзывов, основанная в 2007 году, на котором размещены многочисленные положительных отзывы о нашей деятельности.
                        </p>
                        <a href = "https://testdomenssite.online/trustpilotspaceReview.html" class = "btn border-right bc-secondary fc-white">Читать больше</a>
                    </div>
                </div>
                <div class = "reviews__item justify-content-between d-flex flex-column align-items-center border-left col-12 col-md-4 p-0">
                    <div class = "reviews__item__img bc-akcent d-flex align-items-center justify-content-center col-12">
                        <img src = "img/3401.svg">
                    </div>
                    <div class = "bc-block d-flex flex-column align-items-center">
                        <p class = "text-center fc-main">
                            Самый полезный форум отзывов, где миллионы людей обмениваются полезным опытом, делятся фото и видео, ставят оценки и создают рейтинги лучших.
                        </p>
                        <a href = "https://testdomenssite.online/otzovik.html" class = "btn border-right bc-secondary fc-white">Читать больше</a>
                    </div>
                </div>
                <div class = "reviews__item justify-content-between d-flex flex-column align-items-center border-right-top col-12 col-md-4 p-0">
                    <div class = "reviews__item__img bc-akcent d-flex align-items-center justify-content-center col-12">
                        <img src = "img/fff.svg">
                    </div>
                    <div class = "bc-block d-flex flex-column align-items-center">
                        <p class = "text-center fc-main">
                            Независимый ресурс для всех, кто желает получать грамотную и объективную информацию, Bits.media стал одним из ведущих специализированных новостных и аналитических сайтов о криптовалютах и блокчейне на русском языке.
                        </p>
                        <a href = "https://testdomenssite.online/bitsmedia.html" class = "btn border-right bc-secondary fc-white">Читать больше</a>
                    </div>
                </div>
                <div class = "reviews__item justify-content-between  d-flex flex-column align-items-center border-left-top col-12 col-md-4 p-0">
                    <div class = "reviews__item__img bc-akcent d-flex align-items-center justify-content-center col-12">
                        <img src = "img/webmoney-logo.svg">
                    </div>
                    <div class = "bc-block d-flex flex-column align-items-center">
                        <p class = "text-center fc-main">
                            Электронная система расчётов, основанная в 1998, где мы прошли аттестацию, что гарантирует вам проведение операции с конкретным человеком.
                        </p>
                        <a href = "https://passport.webmoney.ru/asp/CertView.asp?wmid=936717964293" class = "btn border-right bc-secondary fc-white">Читать больше</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "reviewers">
        <div class = "container-fluid">
            <div class = "row d -flex justify-content-center flex-wrap">
                <div class = "reviewer d-flex align-items-center col-12">
                    <p class = "reviewer__name d-flex justify-content-end fc-main col-3">Алина, дизайнер, г. Челябинск</p>
                    <div class = "reviewer__photo col-4 col-xl-2">
                        <img src = "img/reviewer-1.png">
                    </div>
                    <p class = "reviewer__txt fc-main col-4">
                        Минусов нет. Нигде моими проблемами не занимались так внимательно, не искали пути решения и не предлагали помощь. Я очень довольна! Очень хорошая биржа, где можно без проблем работать с клиентом.
                    </p>
                </div>
                <div class = "reviewer d-flex align-items-center justify-content-end col-12">
                    <p class = "reviewer__txt fc-main col-3 col-xl-4">
                        Превосходный сервис, всем рекомендую, мы заработали больше 50к рублей именно через эту биржу фриланса.
                    </p>
                    <div class = "reviewer__photo col-5 col-xl-3">
                        <img src = "img/reviewer-2.png">
                    </div>
                    <p class = "reviewer__name d-flex justify-content-start fc-main col-3">Yudaev team, Worldwide</p>
                </div>
                <div class = "reviewer d-flex align-items-center col-12">
                    <p class = "reviewer__name d-flex justify-content-end fc-main col-3">Олег, фрилансер, г. самара</p>
                    <div class = "reviewer__photo col-4 col-xl-2">
                        <img src = "img/reviewer-3.png">
                    </div>
                    <p class = "reviewer__txt fc-main col-4">
                        Доволен биржей полностью. Все просто и понятно. Можно быстро взять заказ и не волноваться, что заказчик не заплатит за работу.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class = "trust">
        <div class = "container-fluid">
            <div class = "row justify-content-center">
                <div class = "head__title col-12 text-center">
                    <h2 class = "text-center fc-main">Почему нам доверяют?</h2>
                </div>
            </div>
            <div class = "row justify-content-center">
                <div class = "trustContent justify-content-center align-items-end align-items-xl-center d-flex col-12 col-xl-8">
                    <div class = "trustContent__txt text-center col-3">
                        <p class = "fc-main">надежность</p>
                        <p class = "fc-main">Персональный аттестат Webmoney выдан в 2009 году.</p>
                    </div>
                    <div class = "trustContent__img bc-secondary border-right d-flex align-items-center justify-content-center col-2">
                        <img src = "img/reliability.svg">
                    </div>
                    <div class = "trustContent__img bc-secondary border-left d-flex align-items-center justify-content-center col-2">
                        <img src = "img/automation.svg">
                    </div>
                    <div class = "trustContent__txt text-center col-3">
                        <p class = "fc-main">Автоматизация</p>
                        <p class = "fc-main">Защита сделок купли-продажи 24/7 без похода к юристу и в банк.</p>
                    </div>
                </div>
                <div class = "trustContent justify-content-center align-items-start align-items-xl-center d-flex col-12 col-xl-8">
                    <div class = "trustContent__txt text-center col-3">
                        <p class = "fc-main">удобство</p>
                        <p class = "fc-main">Защита сделок купли-продажи 24/7 без похода к юристу и в банк.</p>
                    </div>
                    <div class = "trustContent__img bc-secondary border-right-top d-flex align-items-center justify-content-center col-2">
                        <img src = "img/reliability2.svg">
                    </div>
                    <div class = "trustContent__img bc-secondary border-left-top d-flex align-items-center justify-content-center col-2">
                        <img src = "img/confidentiality2.svg">
                    </div>
                    <div class = "trustContent__txt text-center col-3">
                        <p class = "fc-main">конфиденциальность</p>
                        <p class = "fc-main">Сделка проходит на закрытой странице, доступ к которой есть только у участников сделки и модератора сервиса.
                        </p>
                    </div>
                </div>
            </div>
            <div class = "row justify-content-center">
                <div class = "trustBl d-flex justify-content-center align-items-center col-12 col-md-8 col-xl-8">
                    <p class = "fc-main col-4 col-md-4 col-xl-3">Актуальный черный список с автоматической проверкой всех пользователей.</p>
                    <p class = "fc-main col-4 col-md-4 col-xl-3">Возможность проводить защищенные платежи между физическими лицами.</p>
                </div>
            </div>
        </div>
    </section>
@endsection