@extends('layouts.app')
@section('title','Админ панель')
@section('content')
    <div class="container ">
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark " style="color:white;">{{ __('Меню') }}</div>

                    <div class="card-body pt-4 pb-4">
                        <a href="{{route('categories.index')}}" style="color:black;">Категории</a><br>
                        <a href="{{route('admin.products.index')}}" style="color:black;">Товары</a><br>
                        <a href="{{route('admin.orders.index')}}" style="color:black;">Заказы</a><br>
                        <a href="{{route('admin.colors.index')}}" style="color:black;">Цвета</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

