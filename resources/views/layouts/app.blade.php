<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'El-Aroma') }}</title> -->
    <title>@yield('title-b')</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"     integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


    {{--<script src="https://code.jquery.com/jquery-3.5.1.js"    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>--}}


    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>
<body>
    <div id="app">

    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom bg-light">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-1 text-danger">El-Aroma</span>
            </a>

            <nav class="d-inline-flex mt-3 mt-md-0 ms-md-auto fs-5">
                <span class="fs-4 text-success">+7 977 456 02 43</span>
            </nav>

            
            <nav class="d-inline-flex mt-2 md-0 ms-md-auto fs-5">
                @if (Auth::user() && Auth::user()->name == 'Admin')
                <div class="dropdown fs-5">
                    <button class="btn btn-light dropdown-toggle me-3 fs-5 mt-0 pt-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Продукт
                    </button>
                        <ul class="dropdown-menu fs-5" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/products">Список</a></li>
                            <li><a class="dropdown-item" href="{{route('brend-view')}}">Бренд</a></li>
                            <li><a class="dropdown-item" href="{{route('category-view')}}">Категория</a></li>
                            <li><a class="dropdown-item" href="{{route('capacity-view')}}">Объем</a></li>
                        </ul>
                </div>
                @endif
                <div class="dropdown fs-5">
                    <button class="btn btn-light dropdown-toggle me-3 fs-5 mt-0 pt-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @else
                            Аккаунт
                        @endif
                    </button>
                        <ul class="dropdown-menu fs-5" aria-labelledby="dropdownMenuButton1">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Выход') }}
                            </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                        @endguest                            
                        </ul>
                </div>
            </nav>                          
                    
        </div>
    </div>

    <main class="py-3">
        @if(Request::is('/'))
            @include('inc.carousel')
        @endif               
       
            @yield('content')
        
        @if(Request::is('/'))
        @include('inc.footer')
        @else        
        @endif
    </main>
</div>
    {{--<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>--}}
    {{--<script src="{{ asset('js/app2.js') }}" defer></script>--}}
</body>
</html>
