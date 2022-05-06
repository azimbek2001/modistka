@extends('layouts.master')
@section('title','Все категории')
@section('content')
    <div class="page-header" id="categories-title">
        <div class="container">
            <h1 class="page-title mb-0" style="color:white !important;">Категории</h1>
        </div>
    </div>
    <div class="container">

        <div class="row  my-5">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6 ">
                    <div  class="card-cat card mx-auto mb-3" style="max-width: 300px; " >
                        <!-- Изображение -->
                        <div class="scale">
                            <a class="card-a"  href="{{route('category',$category->id)}}">
                                <img class="card-img-top scale"  src="{{Storage::url($category->image)}}" alt="{{$category->name}}-Modistka">
                            </a>
                        </div>
                        <div class="py-4"style="position:absolute; bottom: 0; background:rgba(0,0,0, .6); width:100%; ">
                        <h4 class="card-title"><a  class="card-b" href="{{route('category',$category->id)}}" style="text-decoration: none!important">{{$category->name}}</a></h4>
                        </div>
                    </div><!-- Конец карточки -->
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <style>
        #categories-title{
            /* The image used */
            /* Used if the image is unavailable */
            width: 100%;/* You must set a specified height */
            /* Center the image */
            /* Do not repeat the image */
            background-image: linear-gradient(to top,rgba(19, 19, 19, 0.35), rgba(166,236,236,255)), url(
            "{{asset('img/categories.png')}}");
            background-size: cover;
            background-position-x: center;
            background-position-y: center;

            /* build polygon */
            clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);
        }
    </style>
@endpush
