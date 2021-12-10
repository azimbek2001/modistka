@extends('layouts/app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Создание цвета</h3>
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="{{ route('admin.colors.index') }}">
                            Назад
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.colors.store') }}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Цвет</legend>
                            <div class="mb-3">
                                <label class="form-label">Название <span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Пример:Чёрный" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Номер цвета <span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="color" id="color"
                                       placeholder="Пример #fffff" required>
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

