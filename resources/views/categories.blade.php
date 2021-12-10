@extends('layouts.master')
@section('title','Все категории')
@section('content')
    <div class="div-about d-flex align-items-center">
        <div class="container text-center  ">
            <div class="pt-3 title">Категории</div>
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
