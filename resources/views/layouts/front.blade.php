<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DreamApp</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @yield('styles')

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/lightgallery.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('css/flickity.css') }}">
        <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>

        <script>
            //document.oncontextmenu = new Function("return false;");
        </script>

        <script>
            document.onkeydown = function(e){
                e = e || window.event;
                var key = e.which || e.keyCode;
                if(key===65){
                    window.location.href = "http://localhost/pages";
                }
            }        
        </script>

    </head>
    <body>

        <main>
            @yield('content')
        </main>

    </body>
</html>