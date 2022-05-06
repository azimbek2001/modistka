@extends('layouts.master')
@section('title','О нас')
@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header" id="about-title">
            <div class="container">
                <h1 style='color:white !important;' class="page-title mb-0" >О нас</h1>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <section class="mt-3 mb-5">
                    <h1 class="title-about title-center">
                        Вас приветствует швейная компания «МОДИСТКА»
                    </h1>
                    <p class=" mx-auto text-center">
                        Позвольте расширенно ознакомить и рассказать вам о нашей компании.
                    </p>
                    <div class="text-secondary"><h4>В НЕЙ ИМЕЮТСЯ:</h4>
                        <ul>
                            <li>швейные цеха с современным производством по пошиву женской одежды.</li>
                            <li>новейшие оборудования, что позволяет изготавливать качественные и добротные продукты, отвечающие всем нужным стандартам ЕАЭС.</li>
                            <li>высококвалифицированные работники, проходящие ежемесячное повышение квалификации.</li>
                        </ul>
                        <h4>РАБОТНИКИ СЛЕДЯТ ЗА:</h4>
                        <ul>
                            <li>отличным исполнением;</li>
                            <li>аккуратным пошивом изделий.</li>
                        </ul>
                        <h4>Также мы обладаем:</h4>
                        <ul>
                            <li>конструкторским бюро;</li>
                            <li>отделом дизайнеров, которые всегда предлагают удобные лекала и современные модели с правильной посадкой.</li>
                        </ul>
                        <h4>В ПРОИЗВОДСТВЕ ОДЕЖДЫ используется только:</h4>
                        <ul>
                            <li>проверенная и качественная ткань;</li>
                            <li>первосортная фурнитура.</li>
                        </ul>
                        <h4>Подробно О НАШИХ УСЛОВИЯХ:</h4>
                        <ul>
                            <li>Осуществляем пошив на аутсорсинге для швейных производств;</li>
                            <li>Поиск и подбор ткани и фурнитуры;</li>
                            <li>Конструируем лекала и отшиваем опытные образцы;</li>
                            <li>Любой одежды;</li>
                            <li>Пошив женской одежды;</li>
                            <li>Ставим петли и пуговицы на промышленном оборудовании;</li>
                            <li>Устанавливаем кнопки, люверсы;</li>
                            <li>Нам доступны любые виды обработок.</li>

                        </ul>
                        <h4>В КОНСТРУКТОРСКОМ БЮРО:<br>Работаем С ЛЮБЫМИ ВИДАМИ МАТЕРИАЛОВ:</h4>
                        <ul>
                            <li>трикотаж</li>
                            <li>шелк</li>
                            <li>шифон</li>
                            <li>натуральные и смесовые ткани</li>
                            <li>плащевка</li>
                            <li>мембрана</li>
                            <li>пальтовые ткани</li>
                            <li>стежка и тд</li>
                        </ul>
                    </div>
                    <div class="text-secondary">
                        ОДЕЖДА, изготовленная на наших фабриках смотрится стильно,солидно и модно!
                        Мы стараемся соответствовать вашим требованиям и ожиданиям.
                        Выполняем свою работу:

                        <ul><li class="h4">КАЧЕСТВЕННО;</li>
                            <li class="h4">БЫСТРО;</li>
                            <li class="h4">НАДЁЖНО!</li>
                        </ul>
                    </div>

                    <div class="h4 ">Вы можете заказать, пошив одежды любой сложности и объема,не сомневаясь ни в чём!</div>

                </section>

            </div>
        </div>
    </main>

@endsection

@push('styles')
    <style>
        /*main{*/
        /*    font-weight: 400;*/
        /*    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);*/
        /*    --swiper-theme-color: #007aff;*/
        /*    --swiper-navigation-size: 44px;*/
        /*    font-family: Poppins, sans-serif;*/
        /*    font-size: 1.4rem;*/
        /*    line-height: 1.6;*/
        /*    color: #666;*/
        /*    box-sizing: inherit;*/
        /*    display: block;*/
        /*    position: relative;*/
        /*}*/

        #about-title{
            /* The image used */
            /* Used if the image is unavailable */
            width: 100%;/* You must set a specified height */
            /* Center the image */
            /* Do not repeat the image */
            background-image: linear-gradient(to top,rgba(19, 19, 19, 0.35), rgba(166,236,236,255)), url(
            "{{asset('img/about-us-1.png')}}");
            background-size: cover;
            background-position-x: center;
            background-position-y: center;

            /* build polygon */
            clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);
        }

    </style>
@endpush
