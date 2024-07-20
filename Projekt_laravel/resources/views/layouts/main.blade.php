<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="../../../../A_cherry_W_preview_rev_1.png">
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        @yield('content')

            <ol>
                <li> <a href="{{ route('home') }}">HOME</a></li>
                <li> <a href="{{ route('about_us') }}">ABOUT US</a></li>
            </ol>
    </body>
</html>