@extends('layouts.master')
@section('title',$product->name )
@section('content')

    <div class="container-fluid mt-2 mb-3">
        <div class="row no-gutters">
            <div class="col-md-5 pr-2">
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                            <li data-thumb="https://i.imgur.com/KZpuufK.jpg">
                                <img src="{{asset('storage/'.$product->image)}}" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="about"> <h1 class="font-weight-bold " >{{$product->name}} </h1>
                        <h4 class="font-weight-bold" ><span id="price">{{$product->price}} </span>₽</h4>
                    </div>

                    <div class="buttons">
                        <a style="padding-top: 10px" href="https://wa.me/+996708714147?text=Здрасвтвуйте.%0aЯ хочу приобрести {{$product->name}} .%0a Ссылка : {{route('product.show', $product->id)}}" class="btn btn-outline-warning btn-long cart"  >Купить в один клик</a>
                        <button class="btn btn-warning btn-long buy" data-id="{{ $product->id }}" id="addToCart">Добавить в корзину</button>
                    </div>
                    <div id="cart-result"></div>
                    <hr>
                    <div class="product-description">
                        <p>
                            <strong>Линейка: <br> В линейке по 4 шт.</strong>
                        </p>
                        <div><span style="font-weight: bold">Доступные цвета:</span></div>
                        <div class="d-flex justify-content-between align-items-center pt-1 my-2">

                            <div class="color-select d-flex ">

                                @foreach($product->colors as $key => $color)
                                            <label>
                                                <input class="radios" type="radio" name="color" value="{{$color->id}}" @if($key==0) {{'checked'}} @endif />
                                                <span style="background:{{$color->color}};"class="graphical-radio"></span>
                                            </label>

                            @endforeach


                        </div>
                        </div>
                        <div class="mt-2"> <span class="" style="font-weight: bold">Описание</span>
                            <p>
                               {{$product->description}}
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Создать группу свойств</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" class="ajax" method="post">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label class="form-label">Название</label>
                            <div class="col">
                                <input class="form-control prop1" name="name_group" id="name_group" placeholder="Название"/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success" >Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('styles')
    <style>
        input[type="radio"] {
            display: none;
        }

        .graphical-radio {
            margin-right: 5px;
            display: inline-block;
            width: 25px;
            height: 25px;
            border-radius: 100%;
            border: 1px solid gray;
        }

        input[type="radio"]:checked + .graphical-radio {
            border: 4px solid gray;
        }
        .card {
        background-color: #fff;
        padding: 14px;
        border: none
        }

        .demo {
        width: 100%
        }

        ul {
        list-style: none outside none;
        padding-left: 0;
        margin-bottom: 0
        }

        li {
        display: block;
        float: left;
        margin-right: 6px;
        cursor: pointer
        }

        img {
        display: block;
        height: auto;
        width: 100%
        }

        .stars i {
        color: #f6d151
        }

        .stars span {
        font-size: 13px
        }

        hr {
        color: #d4d4d4
        }



        .badge i {
        font-size: 10px
        }



        .comment-ratings i {
        font-size: 13px
        }


        .date span {
        font-size: 12px
        }

        .p-ratings i {
        color: #f6d151;
        font-size: 12px
        }

        .btn-long {
        padding-left: 35px;
        padding-right: 35px
        }

        .buttons {
        margin-top: 15px
        }

        .buttons .btn {
        height: 46px
        }

        .buttons .cart {
        border-color: black;
        color: black;
        }

        .buttons .cart:hover {
        background-color: black !important;
        color: #fff
        }

        .buttons .buy {
        color: #fff;
        background-color: black;
        border-color: black;
        }

        .buttons .buy:hover {
            color: black !important;
            background-color: white !important;
            border-color: black !important;
        }



        .buttons .buy:hover {
        color: #fff;
        background-color: black;
        border-color: black;
        }



        .buttons .wishlist:hover i {
        color: #fff
        }

        .buttons .wishlist i {
        color: #ff7676
        }

        .comment-ratings i {
        color: #f6d151
        }


    </style>
@endpush
@push('scripts')
    @push('scripts')

        <script>
            function Color(){
                let radios = document.getElementsByName('color');
                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        return  radios[i].value;
                    }
                }
                return 0;
            }

            $(document).on('click', '#addToCart', function (e) {
                let productId = $(this).data('id');
                let cartResult = document.getElementById('cart-result');
                let price = Number(document.getElementById("price").innerText);
                let radios = document.getElementsByName('color');
                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        let color = radios[i].value;
                        break;
                    }
                }
                console.log(price);
                $.ajax({
                    method: 'get',
                    url: '{{ route('addProduct.toCart') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        productId: productId,
                        quantity: 1,
                        price: price,
                        color : Color(),
                    },
                    success: function (){
                        cartResult.innerHTML = '<div class="alert alert-success mt-3" role="alert">Товар успешно добавлен в корзину </div>'
                    },
                    error: function (){
                        cartResult.innerHTML = '<div class="alert alert-danger mt-3" role="alert">Произошла ошибка </div>'
                    }
                })
            });
        </script>
@endpush
