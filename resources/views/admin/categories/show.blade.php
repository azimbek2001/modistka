@extends('layouts/app')

@section('content')
    <div class="container pt-5" style="min-height:70vh">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <h1>Категория :{{$category->name}}</h1>
                <table class='table'>
                    <tr>
                        <th>Поле</th>
                        <th >Значение</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>{{$category->id}}</td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>{{$category->name}}</td>
                    </tr>
                    <tr>
                        <td>Картинка</td>
                        <td><img src="{{Storage::url($category->image)}}" alt='{{$category->name}}' width="300" ></td>

                    </tr>
                </table>
            </div>
        </div>

    </div>
@endsection
