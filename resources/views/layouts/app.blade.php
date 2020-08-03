<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @include('layouts.head')
    </head>
    <body>
        <div id="app">
            <div class="container">
                @include('layouts.notification')
                <div class="mb-5">
                    @include('layouts.menu')
                </div>
                @yield('content')
            </div>
        </div>
    </body>
    @include('layouts.foot')
</html>
