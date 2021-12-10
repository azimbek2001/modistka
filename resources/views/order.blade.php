@extends('layouts.master')
@section('title','Оформление заказа')
@section('content')
    <div class="div-about d-flex align-items-center">
        <div class="container text-center  ">
            <div class="pt-3 title">Оформление заказа</div>
        </div>
    </div>
<div class="container">
    <!-- Page title -->
    <div class="card mt-4 mb-4" >

        <div class="card-body">
            <form action="{{Route('orders.store')}}" method="post" class="ajax">
                @csrf
                <div class="col-md-12">
                    <fieldset class="fieldset">
                        @if(Auth()->user())
                                <div class="mb-3">
                                    <label class="form-label" style="font-weight:bold">Имя <span class="text-danger">* </span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Пример: Азамат" value="{{Auth()->user()->name}}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            <div class="mb-3">
                                <label class="form-label"  style="font-weight:bold">Телефон<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="Пример: 0555889944" value="{{Auth()->user()->phone}}" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        @else
                            <div class="mb-3">
                                <label class="form-label" style="font-weight:bold">Имя<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Пример: Азамат"  required>
                                <div class="invalid-feedback"></div>
                            </div>
                        <div class="mb-3">
                            <label class="form-label"  style="font-weight:bold">Телефон<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                   placeholder="Пример: 0555889944" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        @endif
                            <div class="mb-3">
                                <label class="form-label"  style="font-weight:bold">Город<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="city" id="city"
                                       placeholder="Пример: Москва" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"  style="font-weight:bold">Адрес<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="address" id="address"
                                       placeholder="Пример: Московская,32" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"  style="font-weight:bold">Почтовый индекс<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="mail" id="mail"
                                       placeholder="Пример: 65-21-34" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div>
                            <button id="sub1" class="btn btn-success" type="submit">
                                Оформить заказ
                            </button>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
