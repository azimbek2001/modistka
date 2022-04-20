@extends('layouts/app')

@section('content')
<div id="history-orders" class="container mt-5 mb-5">
    <form method="get" action="">
        <div class="form-row align-items-center container ">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Фильтр заказов</label>
                <select class="form-control" name="filter">
                    <option value="0">Все</option>
                    <option value="1">В работе</option>
                    <option value="2">Архивированные</option>
                </select>

                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Фильтровать</button>
                </div>
            </div>

        </div>
    </form>
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
                            <th class="text-center">Действие</th>
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
                                <td class="text-center">{{optional($order->status)->title}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.orders.edit', $order->id)}}">Открыть</a>
                                    <form action="{{ route('admin.orders.archive' , $order->id) }}" method="post"  class="ajax row">
                                        @csrf
                                        @method('put')
                                        <div>
                                            <button class="button-update" type="submit">
                                                @if($order->is_archive != 1)
                                                    {{'Архивировать'}}
                                                @else
                                                    {{'Разархивировать'}}
                                                @endif
                                            </button>
                                        </div>
                                    </form>
                                </td>
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
