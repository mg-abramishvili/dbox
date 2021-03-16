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
        <script src="{{ asset('js/panzoom.js') }}"></script>

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

                <div style="position: absolute; top: 20vh; left: 0; right: 0; display: block; width: 50vw; margin: 0 auto; text-align: center; font-size: 40px;">
                    
                    <img src="/logo-h.png" style="width: 340px; display: block; margin: 0 auto;margin-bottom: 125px">
                    
                    <div id="phase_one">
                        <input type="text" id="key-input" placeholder="Введите ключ" style="display: inline-block; padding: 18px 40px; border-radius: 10px; width: 59%;">
                        <button id="activate-button" style="display: inline-block; width: 40%; background-color: #ffc940; box-shahow: none; padding: 20px 40px; border: 0; border-radius: 10px; color: #fff;">Далее</button>
                    </div>

                    <form action="/settings/{{$settings->id}}" method="post" enctype="multipart/form-data">@csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$settings->id}}">

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Тема
                            </dt>
                            <dd class="col-sm-9">
                                <input name="theme" id="theme" class="form-control">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Ориентация экрана
                            </dt>
                            <dd class="col-sm-9">
                                <input name="orientation" id="orientation" class="form-control">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Заголовок
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title">
                            </dd>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg btn-success">Активировать</button>
                            </div>
                        </div>
            
                    </form>

                </div>

        @php } @endphp

        @yield('scripts')

        <script>
            $('form').hide();
            $('#key-input').val('');

            $('#activate-button').click(function () {
                var vid = "";
                var count = "";
                var keycheck = $('#key-input').val();
                $.getJSON('http://touchlab.su/api/key/view/' + keycheck, function(data) {
                    
                    if (data.key == keycheck) {
                        if (data.status == 'waiting') {
                            
                            datakey = data.key;
                            program = data.programs[0].title;

                            dreambox_theme = data.parameters[0].dreambox_theme;
                            dreambox_orientation = data.parameters[0].dreambox_orientation;
                            dreambox_title = data.parameters[0].dreambox_title;

                            count = 'y';

                        }
                        else {
                            count = 'a';
                        }
                    }

                    if (count == 'y') {
                        //alert('Ключ принят');
                        $('#phase_one').hide();
                        $('form').show();

                        $.ajax({
                            type:"POST",
                            url:"http://touchlab.su/api/key/activate/"+ datakey +"",
                            data:"status=active",
                            dataType:"json",
                            success: function(data) {
                                //alert('Активация успешна!');
                                //window.location = "http://localhost";
                                $('#theme').val(dreambox_theme);
                                $('#orientation').val(dreambox_orientation);
                                $('#title').val(dreambox_title);
                                $.get('nta-y.php', function(data) {
                                });
                            },
                            error: function(data) {
                                console.log(data);
                            },
                        });

                    } else if (count == 'a') {
                        alert('Этот ключ уже был активирован');
                    }

                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    alert('Неверный ключ!');
                });
            });
        </script>

<script>
        $(document).ready(function(){
            $("svg").find("text").hide();
            $("svg").find("text:first").show();
            $("svg").find("text:last").show();
            //$("#wrapper").html($("#wrapper").html());
        });
    </script>

    <script> // ZOOM
        const elem = document.getElementById('wrapper-inner');
            const zoomInButton = document.getElementById('zoomin');
            const zoomOutButton = document.getElementById('zoomout');
            const resetButton = document.getElementById('reset');
            const panzoom = Panzoom(elem, {
                contain: 'outside',
                duration: 200,
                startX: 0,
                startY: 0,
                startScale: 1,
                maxScale: 6,
                minScale: 1,
            });
            const parent = elem.parentElement
        parent.addEventListener('wheel', panzoom.zoomWithWheel);
        zoomInButton.addEventListener('click', panzoom.zoomIn)
        zoomOutButton.addEventListener('click', panzoom.zoomOut)
        resetButton.addEventListener('click', panzoom.reset)
    </script>

<script>
        document.onkeydown = function(e){
            e = e || window.event;
            var key = e.which || e.keyCode;
            if(key===65){
                window.location.href = "/login";
            }
        }        
        </script>

    </body>
</html>