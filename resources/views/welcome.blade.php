@extends('layouts.master')
@section('title','Главная')
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 h-90" src="https://images.pexels.com/photos/4473400/pexels-photo-4473400.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-90" src="https://images.pexels.com/photos/3826676/pexels-photo-3826676.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Second slide">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="py-3 container">
        <div class="my-4 mb-3"><h1 class="text-center">Вас приветствует швейная компания "Модистка"</h1>
           </div>
        <div class="my-4">
            <div class="d-block d-md-flex justify-content-between">
    
                <div class="d-flex flex-column align-items-center p-2"><img src="/img/b2_100x100_c2d.png" alt="">
                    <div>
                        <div class="font-weight-bold h4 ">Оплата после получения</div>
                        <div>После оформления заказа мы свяжемся с вами, подтвердим получение и займемся подготовкой.
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center p-2"><img src="/img/b3_100x100_c2d.png" alt="">
                    <div>
                        <div class="font-weight-bold h4">Акции и бонусы</div>
                        <div>После оформления заказа мы свяжемся с вами, подтвердим получение и займемся подготовкой.
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center p-2"><img src="/img/b4_100x100_c2d.png" alt="">
                    <div>
                        <div class="font-weight-bold h4">Быстрая доставка</div>
                        <div>После оформления заказа мы свяжемся с вами, подтвердим получение и займемся подготовкой.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="display-3">Как сделать заказ?</div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <ol class="step pl-0">
                        <li class="step-element pb-0">
                            <div class="step-number"><span class="number">1</span></div>
                            <div class="step-excerpt"><h6 class="font-weight-bold dark-grey-text mb-3">Write your
                                    requirements</h6>
                                <p class="text-muted">Think the or organization same proposal to affected heard reclined
                                    in be it reassuring.</p></div>
                        </li>
                        <li class="step-element pb-0">
                            <div class="step-number"><span class="number">2</span></div>
                            <div class="step-excerpt"><h6 class="font-weight-bold dark-grey-text mb-3">Sign the
                                    contract</h6>
                                <p class="text-muted">Think the or organization same proposal to affected heard reclined
                                    in be it reassuring.</p></div>
                        </li>
                        <li class="step-element pb-0">
                            <div class="step-number"><span class="number">3</span></div>
                            <div class="step-excerpt"><h6 class="font-weight-bold dark-grey-text mb-3">We start
                                    developing</h6>
                                <p class="text-muted">Think the or organization same proposal to affected heard reclined
                                    in be it reassuring.</p></div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        
        <div class="mb-5 bt-4">
            <div class="h5">Позвольте расширенно ознакомить и рассказать вам о нашей компании.</div>
            <div class="text-secondary"><h6>В НЕЙ ИМЕЮТСЯ:</h6>
<ul>
    <li>швейные цеха с современным производством по пошиву женской одежды.</li>
<li>новейшие оборудования, что позволяет изготавливать качественные и добротные продукты, отвечающие всем нужным стандартам ЕАЭС.</li>
    <li>высококвалифицированные работники, проходящие ежемесячное повышение квалификации.</li>
</ul>
<h6>РАБОТНИКИ СЛЕДЯТ ЗА:</h6>
<ul>
<li>отличным исполнением;</li>
<li>аккуратным пошивом изделий.</li>
</ul>
<h6>Также мы обладаем:</h6>
<ul>
<li>конструкторским бюро;</li>
<li>отделом дизайнеров, которые всегда предлагают удобные лекала и современные модели с правильной посадкой.</li>
</ul>
<h6>В ПРОИЗВОДСТВЕ ОДЕЖДЫ используется только:</h6>
<ul>
<li>проверенная и качественная ткань;</li>
<li>первосортная фурнитура.</li>
</ul>
            </div>
            <div class="h5">Вы можете заказать, пошив одежды любой сложности и объема,не сомневаясь ни в чём!</div>
            <div class="text-secondary">
ОДЕЖДА, изготовленная на наших фабриках смотрится стильно,солидно и модно!
Мы стараемся соответствовать вашим требованиям и ожиданиям.
Выполняем свою работу:
<ul><li class="h6">КАЧЕСТВЕННО;</li>
<li class="h6">БЫСТРО;</li>
<li class="h6">НАДЁЖНО!</li>
</ul>           
 </div>
   </div>
   </div>        
@endsection
