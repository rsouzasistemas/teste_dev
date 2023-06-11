<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{env('APP_NAME')}}</title>

        @vite(['resources/css/app.css','resources/sass/app.scss'])
    </head>
    <body style="background-color: #eee">
        <div class="wrapper">
            <main class="container">
                @include('blade_views.includes.head')
                @yield('contents')
            </main>
        </div>

        @vite(['resources/js/app.js'])
    </body>
</html>