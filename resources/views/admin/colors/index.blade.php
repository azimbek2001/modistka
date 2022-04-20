@extends('layouts/app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Цвета</h3>
                <ul class="nav nav-pills card-header-pills">

                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="{{route('admin.colors.create')}}">
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
                        <th class="text-center" style="width: 50px">Цвет</th>
                        <th class="text-center" style="width: 200px">Действия</th>
                    </tr>
                    </thead>
                    <tbody>

                    @isset($colors)
                        @foreach($colors as $color)

                            <tr id="category_{{ $color->id }}">
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="vertical-align: center;">
                                    {{ $color->name }}
                                </td>
                                <td style="  width:10px; height:10px; background: {{$color->color}}"
                                    class="text-center">
                                </td>
                                <td class="text-center">

                                    <form action="{{route('admin.colors.destroy',$color->id)}}" method="POST">
                                        <a href="{{route('admin.colors.edit' , $color->id)}}" class="">Изменить</a>
                                        @csrf
                                        <input class="button-delete" type="submit" value='Удалить'>
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
