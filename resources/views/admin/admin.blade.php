@extends('layouts.app')
@section('title','Админ панель')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark " style="color:white;">{{ __('Dashboard') }}</div>

                    <div class="card-body ">
                        <a href="" style="color:black;">Категории</a><br>
                        <a href="" style="color:black;">Товар</a><br>
                        <a href="" style="color:black;">Заказы</a><br>
                        <a href="" style="color:black;">Цвета</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
