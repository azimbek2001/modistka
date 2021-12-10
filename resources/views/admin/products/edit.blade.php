@extends('layouts/app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Создание товара</h3>
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">
                            Назад
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Товар</legend>
                            <div class="mb-3">
                                <label class="form-label">Название <span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Пример:Платье" required value="{{$product->name}}">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Цена<span style="color:red">*</span></label>
                                <input type="number" class="form-control" name="price" id="price"
                                       placeholder="Пример 5000" required value="{{$product->price}}">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Размеры<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="sizes" id="sizes"
                                       placeholder="Пример 50-90" required value="{{$product->sizes}}">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Описание<span style="color:red">*</span></label>
                                <textarea type="number" class="form-control" name="description" id="description"
                                          placeholder="Какой-нибудь текст" required>{{$product->description}}
                                </textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            @isset($colors)
                                <div class="mb-3">
                                    <label class="form-label">Цвета *</label>
                                    <div class="form-check">
                                        @foreach($colors as $color)
                                            <input class="form-check-input" type="checkbox" name="colors[]"
                                                   id="{{$color->id}}"
                                                   value="{{$color->id}}"
                                                {{$product->colors->contains($color->id) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" >
                                                {{$color->name }}
                                                <div style="width:30px;height:30px; border-radius=50%; background:{{$color->color}}"></div>
                                            </label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            @endisset

                            @isset($categories)
                                <div class="mb-3">
                                    <label class="form-label">Категория *</label>
                                    <div class="form-check">
                                        @foreach($categories as $category)
                                            <input class="form-check-input" type="radio" name="category_id"
                                                   id="{{$category->id}}"
                                                   value="{{$category->id}}" @if($category->id === $product->category_id) checked @endif>
                                            <label class="form-check-label" >
                                                {{$category->name }}
                                            </label><br>
                                        @endforeach
                                    </div>
                                </div>
                            @endisset
                            <div class="mb-3">
                                <label class="form-label">Картинка *</label><br>
                                <input type="file"  id='image' name='image'>
                                <div class="invalid-feedback"></div>
                            </div>

                        </fieldset>
                        <div>
                            <button id="sub1" class="btn btn-success" type="submit">
                                Сохранить
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
@endsection

