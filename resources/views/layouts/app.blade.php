
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Modistka</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/app.css">
    @stack('styles')
</head>
<body >
<section style="background: whitesmoke">
    <div class="container">
        <div class="d-flex justify-content-end">
            <div class="auth" style="font-size: 15px!important">
                @if(!auth()->user())
                    <a href="{{ route('login') }}" class="text-dark"><i
                            class="w-icon-account"></i>Войти</a>
                    <span class="delimiter d-lg-show">/</span>
                    <a href="{{ route('register') }}" class="ml-0  text-dark">Регистрация</a>
                @else
                    <a href="{{ route('home') }}" class="d-lg-show text-dark">Личный кабинет</a>
                    <span class="delimiter d-lg-show">/</span>
                    <a onclick="document.getElementById('logout-form-auth').submit();" class="logout text-dark">Выйти</a>
                    <form id="logout-form-auth" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                @endif
            </div>
        </div>
    </div>
</section>
<main class="header_main">
    <header class="header">
        <h1>modistka</h1>
        <nav>
            <a href="/">Главная</a>
            <a href="{{route('categories')}}">Категории</a>
            <a href="{{route('products.index')}}">Каталог</a>
            <a href="#">О нас</a>
        </nav>
    </header>
</main>
@yield('content')

<!-- Footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/app.js"></script>
@stack('scripts')
</body>
</html>
