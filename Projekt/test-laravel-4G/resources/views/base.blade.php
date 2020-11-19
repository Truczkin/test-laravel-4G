<!DOCTYPE html>
<html lang="cs-CZ">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="@yield('description')" />
        <title>@yield('title', env('APP_NAME'))</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">{{ env('APP_NAME') }}</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="{{ url('') }}">Úvod</a>
                <a class="p-2 text-dark" href="{{ route('service.index')}}">Služby</a>
                <a class="p-2 text-dark" href="{{ route('contact.index')}}">Kontakt</a>
                    @auth
                        <a class="p-2 text-dark" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Odhlásit se</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                            @csrf
                        </form>
                    @else
                        <a class="p-2 text-dark" href="{{ route('login') }}">Přihlášení</a>
                    @endauth
            </nav>
        </div>

        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

            <footer class="pt-4 my-md-5 border-top">
                <p>
                    Tručkin 2020 ©
                </p>
            </footer>
        </div>

        @stack('scripts')
    </body>
</html>