<div class="col-lg-4 col-md-6 ">



    <div  class="card-cat card mx-auto mb-3" style="max-width: 300px;">
        <!-- Изображение -->
        <a class="card-a" href="{{route('product',[$product->category->code,$product->id])}}"><img class="card-img-top" height="200" src="{{Storage::url($product->image)}}" alt="{{$product->name}}"></a>
        <!-- Текстовый контент -->
        <div class="card-body">
            <h4 class="card-title"><a  class="card-b" href="{{route('product',[$product->category->code,$product->id])}}" style="">{{$product->name}},{{$product->year}}</a></h4>
            <table class="w-100">
                <tr>
                    <td class="card-info">Категория</td>
                    <td class="card-text text-right"><a class="card-link" href="{{route('category',$product->category->id)}}">{{$product->category->name}}</a></td>
                </tr>
                <tr>
                    <td class="card-info">Бренд</td>
                    <td class="card-text text-right"><a class="card-link" href="{{route('brand',$product->brand->id)}}">{{$product->brand->name}}</a></td>
                </tr>
                <tr>
                    <td class="card-info">Цвет</td>
                    <td class="card-text text-right">{{$product->color}}</td>
                </tr>

            </table>
            <br>
            <span class="fw-bold text-dark" style="font-size: 20px;line-height: 28px;">{{$product->price}} сом </span><span class="card-info">/ сутки</span>
            <p>
            @if($product->rent==0)
                <form action="{{Route('addOrder',[$product->id])}}" method="POST">
                    <button type="submit"class=" btn btn-primary" style="float:left">Забронировать</button>
                    @csrf
                </form>
            @else
                <button type="submit"class=" btn btn-primary" style="float:left">Занят</button>
            @endif
            <a href="{{route('product',[$product->category->code,$product->id])}}" style="float:right;" class=" btn btn-primary">Перейти</a>
            </p>
        </div>
    </div><!-- Конец карточки -->
</div>
