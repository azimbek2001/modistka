@extends('layouts.master')
@section('title','Каталог')
@section('content')
    <div class="div-about d-flex align-items-center">
        <div class="container text-center  ">
            <div class=" pt-3 title ">Каталог</div>
        </div>
    </div>

    <div class="container">

    @if($products->count()!=0)

        <div class="container">

            <div class="row  my-5">
                @foreach($products as $product)
                    @include('layouts.card', compact('product'))
                @endforeach
            </div>
        </div>

    @else
        <div class="container text-center h2 my-5">
            Пока , что нет товаров данной категории .
        </div>
    @endif
    </div>

@endsection

@push('styles')
    <style>

        .card {
            background-color: #fff;
            border: none;
            border-radius: 10px;
            width: 260px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        .image-container {
            position: relative
        }

        .thumbnail-image {
            border-radius: 10px !important
        }


        .first {
            position: absolute;
            width: 100%;
            padding: 9px
        }

        .dress-name {
            font-size: 15px;
            font-weight: bold;
            width: 65%
        }

        .new-price {
            font-size: 15px;
            font-weight: bold;
            color: red
        }



    </style
@endpush
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>

    </script>
@endpush
