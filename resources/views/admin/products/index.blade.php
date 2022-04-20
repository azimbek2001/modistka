@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Товары</h3>
                <ul class="nav nav-pills card-header-pills">

                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="{{route('admin.products.create')}}">
                            Создать
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 80px">#</th>
                        <th>Название</th>
                        <th class="text-center" style="width: 100px">Категория</th>
                        <th class="text-center" style="width: 100px">Размеры</th>
                        <th class="text-center" style="width: 100px">Цена</th>
                        <th class="text-center" style="width: 200px">Действие</th>
                    </tr>
                    </thead>
                    <tbody>

                    @isset($products)
                        @foreach($products as $product)

                            <tr id="category_{{ $product->id }}">
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="vertical-align: center;">
                                    {{ $product->name }}
                                </td>
                                <td class=" text-center" style="vertical-align: center;">
                                    {{ $product->category->name }}
                                </td>
                                <td class=" text-center" style="vertical-align: center;">
                                    {{ $product->sizes }}
                                </td>
                                <td class=" text-center" style="vertical-align: center;">
                                    {{ $product->price }}
                                </td>

                                <td class="text-center">

                                    <form action="{{route('admin.products.destroy',$product->id)}}" method="POST">
                                        <a href="{{route('admin.products.edit' , $product->id)}}" class="" >Изменить</a>
                                        @csrf
                                        <input class="button-delete"type="submit" value='Удалить'>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Content here -->
    </div>

@endsection
