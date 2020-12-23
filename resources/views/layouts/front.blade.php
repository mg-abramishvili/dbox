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

        <script src="{{ asset('js/turn.min.js') }}"></script>

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

        @php
            $host1file = 'http://localhost/host1.txt';
            $host2file = 'http://localhost/host2.txt';
            $ntafile = 'http://localhost/nta.txt';
            $host1 = file($host1file);
            $host2 = file($host2file);
            $nta = file($ntafile);
            
            foreach ($host1 as $host1line) { $h1 = $host1line; }
            foreach ($host2 as $host2line) { $h2 = $host2line; }
            foreach ($nta as $ntaline) { $hnta = $ntaline; }
        @endphp

        @php if ($hnta == 'y') { @endphp
            @php if ($h1 == $h2) { @endphp
                
                <main>
                    @yield('content')
                </main>

            @php } else { @endphp

                <div style="position: absolute; top: 40vh; left: 0; right: 0; text-align: center;"><p style="font-size: 50px;"><strong>Ошибка</strong><br>Повторное использование лицензии.</p></div>

            @php } @endphp
            @php } elseif ($hnta == 'n') { @endphp

                <div style="position: absolute; top: 30vh; left: 0; right: 0; text-align: center; font-size: 40px;">
                    <img src="/logo-h.png" style="width: 340px; display: block; margin: 0 auto;margin-bottom: 125px">
                    <input type="text" id="key-input" placeholder="Введите ключ" style="padding: 18px 40px; border-radius: 10px; width: 700px;">
                    <button id="activate-button" style="background-color: #ffc940; box-shahow: none; padding: 20px 40px; border: 0; border-radius: 10px; color: #fff;">Активировать</button>
                </div>

        @php } @endphp

        @yield('scripts')

        <script>
            $('#activate-button').click(function () {
                var vid = "";
                var count = "";
                var keycheck = $('#key-input').val();
                $.getJSON('http://touchlab.su/api/keys', function(data) {
                    $.each(data.data, function(i, v) {
                        if (v.key == keycheck) {
                            if (v.status == 'waiting') {
                                
                                vid = v.id;
                                count = 'y';

                            }
                            else {
                                count = 'a';
                            }
                        }
                    });

                    if (count == 'y') {
                        alert('Ключ принят');
                        $.get('nta-y.php', function(data) {
                        });
                    }
                    else if (count == 'a') {
                        alert('Этот ключ уже был активирован');
                    }
                    else {
                        alert('Введите ключ');
                    }

                    $.ajax({
                        type:"POST",
                        url:"http://touchlab.su/api/key/update/"+ vid +"",
                        data:"status=active",
                        dataType:"json",
                        success: function(data) {
                            alert('Активация успешна!');
                            window.location = "http://localhost";
                        }
                    });

                });
            });
        </script>
    </body>
</html>