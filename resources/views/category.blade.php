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
        <div class="row  my-5">
            @foreach($category->products as $product)
                @include('layouts.card',compact('product'))
            @endforeach
        </div>
    @else
        <div class="container text-center h2 my-5">
            Пока , что нет товаров данной категории .
        </div>
    @endif
@endsection
