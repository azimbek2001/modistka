@extends('layouts.master')
@section('title','Корзина')
@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Корзина</h1>
        </div>
    </div>
    @if(!session('cart') || empty(session('cart')))
        <section class="container" style="height:80vh;">
        <div class="page-header" id="emptyDiv" style="background-color: #eee">
            <div class="container">
                <h1 class="page-title mt-5">Корзина пуста</h1>
            </div>
        </div>
        </section>
    @else
        <!-- Card -->
    <section class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->

            <div class="col-lg-8">
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Продукт</th>
                            <th class="text-center">Цвет</th>
                            <th class="text-center" style="width: 50px">Количество</th>
                            <th class="text-center" style="width: 200px">Итог</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session()->get('cart') as $id => $product)
                            <tr>
                            <td>
                            @php
                               $prod =  \App\Models\Product::find(key(session()->get('cart')));
                            @endphp
                                <p> {{$product['name']}}</p>
                            </td>
                                <td class="text-center"><div style="width:35px; height:35px; margin:auto; background: {{$prod->color($product['color'])->color}}"></div></td>
                            <td><input class=" form-control " type="number" min="1"  value="{{ $product['quantity'] }}"></td>
                            <td class="text-center">  {{ $product['subtotal'] }} ₽</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">

                        <h4 class="mb-3">ИТОГИ КОРЗИНЫ</h4>
                        <hr class="divider mb-6">
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <label><strong>Итог</strong></label>
                            <span class="ls-50" id="total">{{ session()->get('total') }} ₽</span>
                        </div>
                        <hr class="divider mb-6">
                        <a href="{{route('orders.create')}}"
                           class="btn btn-outline-dark">
                            Перейдите к оформлению заказа<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
                <hr class="divider mb-6">
                <div class="cart-action mb-6">
                    <button type="submit" class="btn btn-outline-dark btn-clear" name="clear_cart" value="Clear Cart">Очистить корзину</button>
                    <a href="/" class="btn btn-dark btn-rounded btn-icon-right btn-shopping ">Продолжить покупки<i class="w-icon-long-arrow-right"></i></a>
                </div>
                <hr class="divider mb-6">
                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Block Content-->

@endif
@endsection

@push('styles')
<style>

    </style>
@endpush

@push('scripts')

    <script>
        $(document).on('click', '.w-icon-plus', function (e){
            let productId = $(this).data('product');
            let increment = 1;
            let val = $('.quantityValue-'  + productId).val();
            if (val < 3) {
                updateCart( productId, increment)
            }
            else{
                $(this).addClass('disabled')
            }
        })

        $(document).on('click', '.w-icon-minus', function (e){

            let productId = $(this).data('product');
            let decrement = 0;
            let val = $('.quantityValue-' + productId).val();
            if (val > 1) {
                updateCart( productId, decrement)
            }
            else{
                $(this).addClass('disabled')
            }

        })

        function updateCart( productId, type) {

            $.ajax({
                method: "put",
                url: '{{ route('update.cart') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    productId: productId,
                    type: type
                },
                success: function (data) {
                    if (data.increment) {
                        $('.quantityValue-' + productId).get(0).value++;
                        $('.subtotalProd-'  + productId).text(data.subtotal)
                        $('#total').text(data.total)
                    } else {
                        $('.quantityValue-'  + productId).get(0).value--;
                        $('.subtotalProd-' + productId).text(data.subtotal)
                        $('#total').text(data.total)

                    }
                }

            })
        }

        $(document).on('click', '.btn-close', function (e) {
            let prodId = $(this).data('product');


            $.ajax({
                url: '{{ route('delete.product') }}',
                method: 'delete',
                data: {
                    _token: '{{ csrf_token() }}',
                    prodId: prodId,
                },
                success: function (data){
                    $(e.currentTarget).parent().parent().parent().closest('tr').remove();

                    if ($('.cart-table tr').length === 1)
                    {
                        let div = $('<div class="page-header" id="emptyDiv" style="background-color: #eee"><div class="container"> <h1 class="page-title mb-0">Корзина пуста</h1> </div></div>');
                        $('.cart-data').html(div);
                    }
                    $('#total').text(data.total)

                }
            })
        })

        $(document).on('click', '.btn-clear', function (e) {
            $.ajax({
                url: '{{ route('clear.cart') }}',
                method: 'delete',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data){
                    let div = $('<div class="page-header" id="emptyDiv" style="background-color: #eee"><div class="container"> <h1 class="page-title mb-0">Корзина пуста</h1> </div></div>');
                    $('.cart-data').html(div);
                    $('#total').text(data.total)
                    location.reload();
                }
            })
        })
    </script>
@endpush
