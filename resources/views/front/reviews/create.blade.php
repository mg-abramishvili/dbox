@extends('layouts.front')
@section('content')

@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
@endsection

<div class="wrapper" style="">

<header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="calendar">
                        <strong>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('D')}}
                        </strong>
                        <span>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('MMMM')}}
                            <small>{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('dddd')}}</small>
                        </span>
                    </div>
                </div>
                <div class="col-4 header-logo">
                    <a href="/"><img src="{{ $settings->logo }}"></a>
                </div>
                <div class="col-4 text-right">
                    <div class="header-time"></div>
                    <script>
                        $(function() {
                            startRefresh();
                        });

                        function startRefresh() {
                            setTimeout(startRefresh,60000);
                            $.get('/timeonly.php', function(data) {
                                $('.header-time').html(data);    
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <form action="/front-reviews" method="post" enctype="multipart/form-data">@csrf

            <input type="text" class="form-control" name="title" placeholder="Имя (необязательно)">

            <textarea rows="7" type="text" class="form-control" name="review"></textarea>
            @if ($errors->has('review'))
                <div class="alert alert-danger">
                    Напишите отзыв
                </div>
            @endif

            <button type="submit" class="btn btn-lg btn-success">Отправить</button>

        </form>

        </div>

<footer>
    <div class="container">
        <a href="/" class="med-home med-home-sub">
            <img src="/img/medhome.svg" alt="">
        </a>
        <a href="/front-photoalbums" class="med-footer-second"><span>Фотогалерея</span></a>
    </div>
</footer>

                    </div>
@endsection