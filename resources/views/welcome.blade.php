<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="d-flex justify-content-end pe-3">
            @if (Route::has('login'))
                    @auth
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            <a href="{{ url('/instructions') }}" class="link-secondary">Povratak na stranicu...</a>
                        </div>
                    @else
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            <a href="{{ route('login') }}" class="link-secondary pe-3">Prijava</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="link-secondary">Registracija</a>
                            @endif
                        </div>
                    @endauth
            @endif
        </div>
        @include('welcome-info')
        </div>
    </body>
</html>
