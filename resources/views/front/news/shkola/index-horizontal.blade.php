@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
@endsection

<div class="shkola">

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 header-logo">
                    <a href="/">
                        <div class="header-logo-img">
                            <img src="{{ $settings->logo }}">
                        </div>
                        <p class="header-title">{{ $settings->title }}</p>
                    </a>
                </div>
                <div class="col-6 text-right">
                    <div class="calendar">
                        <span>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('D MMMM, dddd')}}
                        </span>
                    </div>
                    <div class="header-time"></div>
                    <script>
                        $(function() {
                            startRefresh();
                        });

                        function startRefresh() {
                            setTimeout(startRefresh,30000);
                            $.get('/timeonly.php', function(data) {
                                $('.header-time').html(data);    
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </header>

    <div class="container" style="margin-top: 45px;">
        <div class="news">
            <div class="row">
                <div class="col-12">
                    <ul class="news-list">
                        @foreach($news as $new)
                        <li class="news-list-item">  
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h2>{{ $new->title }}</h2>
                                    <div class="news-list-item-text-preview">
                                        {{ \Illuminate\Support\Str::limit($new->text ?? '', 100, $end='...') }}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a href="/front-news/{{ $new->id }}">Подробнее</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="backbutton">
                
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <a href="/" class="shkola-home shkola-home-sub">
                <img src="/img/medhome.svg" alt="">
            </a>
            <a href="/front-news" class="shkola-footer-second"><span>Новости</span></a>
        </div>
    </footer>
</div>

