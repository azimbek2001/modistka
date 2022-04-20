@extends('layouts.master')
@section('title','Категория:' .$category->name)
@section('content')
    <div class="div-about d-flex align-items-center">
        <div class="container text-center  ">
            <div class=" pt-3 title ">{{$category->name}}</div>
        </div>
    </div>
    <div class="container">
    </div>

    @if($category->products->count()!=0)

        <div class="container">

            <div class="row  my-5">
                @foreach($category->products as $product)
                    <div class="col-md-4 ">
                        <div  class="card-cat card mx-auto mb-3" style="max-width: 300px; " >
                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center"></div>
                                    </div>
                                    <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}" class="img-fluid rounded thumbnail-image">
                                </div>
                                <div class="product-detail-container p-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="dress-name"><a class="dress-name text-dark"href="{{route('product.show', $product->id)}}">{{$product->name}}</a></h5>
                                        <div class="d-flex flex-column mb-2"> <span class="new-price">{{$product->price}} ₽</span> </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-1">
                                        <div class="color-select d-flex ">
                                            @foreach($product->colors as $color)
                                                <span style="width:15px;height:15px;border: 1px solid {{$color->color}};border-radius: 50%;background:{{$color->color}};"> </span>
                                            @endforeach
                                        </div>
                                        <div class="d-flex ">
                                            {{$product->sizes}}
                                        </div>
                                    </div>
                                    <div class="w-100 mt-3">
                                        <a href="{{route('product.show', $product->id)}}" class="btn btn-dark w-100">Подробнее</a>
                                        <a href="https://wa.me/+99670714147?text=Здрасвтвуйте.%0aЯ хочу приобрести {{$product->name}} .%0a Ссылка : {{route('product.show', $product->id)}}" class="btn btn-success w-100">Купить в один клик</a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- Конец карточки -->
                    </div>
                @endforeach
            </div>
        </div>

    @else
        <div class="container text-center h2 my-5">
            Пока , что нет товаров данной категории .
        </div>
    @endif


@endsection

