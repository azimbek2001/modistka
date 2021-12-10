@extends('layouts/app')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="card">
        <div class="card-body">

            <div class="col-md-12">
                <fieldset>
                    <legend>Пользователь</legend>
                    <div class="mb-3">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="vertical-align: middle">ФИО</th>
                                <th class="text-center" style="vertical-align: middle;width:150px">Телефон</th>
                                <th class="text-center" style="vertical-align: middle;width:100px">Email</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Зарегестрирован</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {{$order->name}}
                                </td>
                                <td class="text-center">
                                    {{$order->phone}}
                                </td>
                                <td class="text-center">
                                    {{$order->email}}
                                </td>

                                <td class="text-center">
                                    @if(isset($order->user)){{$order->user->created_at->format('d.m.Y')}}@else{{"-"}}@endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <fieldset>
                    <legend>Продукты</legend>
                    <div class="mb-3">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="vertical-align: middle; width:20px" class="text-center">#</th>
                                <th  style="vertical-align: middle;width:150px">Название</th>
                                <th class="text-center" style="vertical-align: middle;width:100px">Цвет</th>
                                <th class="text-center" style="vertical-align: middle;width:100px">Кол-во</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderProducts as $key => $product)
                                <tr>
                                    <td class="text-center">
                                        {{++$key}}
                                    </td>
                                    <td>
                                        {{$product->product->name}}
                                    </td>
                                    <td>
                                        {{$product->color->name}}
                                    </td>
                                    <td class="text-center">
                                        {{$product->amount}}
                                    </td>

                                    <td class="text-center">
                                        {{$product->subtotal}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-12">
                <fieldset>
                    <legend>Заказ</legend>
                    <div class="mb-3">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="vertical-align: middle; width:20px" class="text-center">#</th>
                                <th  style="vertical-align: middle;width:150px">Город</th>
                                <th class="text-center" style="vertical-align: middle;width:100px">Адрес</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Почтовый индекс</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Итого</th>
                                <th class="text-center" style="vertical-align: middle;width:200px">Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">
                                1
                                </td>
                                <td >
                                     {{$order->city}}
                                </td>
                                <td class="text-center">
                                  {{$order->address}}
                                </td>

                                <td class="text-center">
                                    {{$order->mail}}
                                </td>
                                <td class="text-center">
                                    {{$order->total}}
                                </td>

                                <td class="text-center">
                                    {{$order->status->title}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
            <form action="{{ route('admin.orders.update' , $order->id) }}" method="post"  class="ajax row">
                @csrf
                <label>Статус</label>
                <select class="custom-select custom-select-lg mb-3 form-control" id="status" name="status">
                    @foreach($statuses as $id => $status)

                        <option value="{{++$id}}" @if($order->status_id == $id){{'selected'}} @endif  class="form-control">
                            {{$status->title}}
                        </option>
                    @endforeach
                </select>
                <div>
                    <button id="sub1" class="btn btn-success" type="submit">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
