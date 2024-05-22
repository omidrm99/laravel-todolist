<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TASKS PAGE</title>
    @yield('styles')
</head>
    <body>
        <h1>
            @yield('title')
        </h1>
        <div>
            @if(session()->has('success'))
                <div style="color: green">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    <div>
        @yield('content')
    </div>
    </body>
</html>
