@extends('layouts.master')
@section('title','Регистрация')
@section('content')
    <div class="container">
        <div class="row align-items-center  justify-content-center pt-5 pb-5" style="min-height: 70vh">
            <div class="col-md-8">
                <div class="card">
                    <div class="page-header">
                        <p class=" text-center text_title">
                            Регистрация
                        </p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="container">
                                <div class="form-group row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ФИО') }}</label>

                                    <div class="col-md-8">
                                        <input id="name"
                                               type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               placeholder="Введите ФИО"
                                               value="{{ old('name')}}"
                                               required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-8">
                                        <input id="email"
                                               type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Введите email"
                                               name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Телефон') }}</label>

                                    <div class="col-md-8">
                                        <input id="phone"
                                               type="phone"
                                               placeholder="Введите телефон"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                                    <div class="col-md-8">
                                        <input id="password"
                                               type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Введите пароль"
                                               name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Подтвердите пароль') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm"
                                               type="password"
                                               class="form-control"
                                               placeholder="Введите пароль"
                                               name="password_confirmation"
                                               required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group mb-0 d-flex justify-content-end">
                                    {{--                            <div class="">--}}
                                    <button type="submit" class="custom-btn btn-6"><span>Регистрация</span></button>
                                    {{--                            </div>--}}
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>


@endsection
