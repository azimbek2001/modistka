@extends('layouts.master')
@section('title','Личный кабинет')
@section('content')

    <div class="div-about d-flex align-items-center">
        <div class="container text-center  ">
            <div class="pt-3 title">Личный кабинет</div>
        </div>
    </div>

    <!-- Page title -->
    <div class=" mt-5 mb-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Меню') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul style="margin-left: 0; padding-left: 0;">
                            <li style="list-style-type: none;" class="mb-1"><a href="#profile-result" id="profile" class="text-dark">Личные
                                    данные</a></li>
                            <li style="list-style-type: none;" class="mb-1"><a href="#history-orders" id="history-orders" class="text-dark">История
                                    заказов</a></li>
                            <li style="list-style-type: none;" class="mb-1"> <a onclick="document.getElementById('logout-form-auth').submit();" class="logout text-dark">Выйти</a></li>
                                <form id="logout-form-auth" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" mt-5 mb-5 " id="profile-result">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Личные данные</div>
                    <div class="card-body">
                        <ul style="margin-left: 0; padding-left: 0;">
                            <li style="list-style-type: none;" class="mb-1">ФИО : {{Auth()->user()->name}}</li>
                            <li style="list-style-type: none;" class="mb-1">Телефон : {{Auth()->user()->phone}}</li>
                            <li style="list-style-type: none;" class="mb-1">Email : {{Auth()->user()->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="history-orders" class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;vertical-align: middle">#</th>
                                <th style="vertical-align: middle">Город</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Адрес</th>
                                <th class="text-center" style="vertical-align: middle;width:100px">Итог</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Дата</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="">{{$order->city}}</td>
                                    <td class="text-center">{{$order->address}}</td>
                                    <td class="text-center">{{$order->total}}</td>
                                    <td class="text-center">{{$order->created_at->format('d.m.Y')}}</td>
                                    <td class="text-center">{{$order->status->title}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
    @push('scripts')
        <script>

        </script>
    @endpush
