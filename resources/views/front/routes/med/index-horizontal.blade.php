@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
@endsection

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
        <div class="row">
            <div class="col-5">
                <div class="med-route-sidebar">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск ...">
                    @include('front.keyboard')
                    <ul id="myUL">
                    @foreach ($r01routes as $scheme => $route)
                        @foreach($route as $routeItem)
                            @if($loop->first)
                                @if($routeItem->schemes2->count())
                                    @foreach ($routeItem->schemes2 as $rs)
                                        <strong style="text-transform: uppercase">{{ $rs->title }}</strong>
                                    @endforeach
                                @else
                                    @foreach ($routeItem->schemes as $rs)
                                        <strong style="text-transform: uppercase">{{ $rs->title }}</strong>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                        @foreach($route as $routeItem)
                            <li>
                                <a href="/front-r01routes/{{ $routeItem->id }}">{{ $routeItem->title }}</a>
                            </li>
                        @endforeach
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-7">
                <img src="{{ $schemes->image }}" style="width:auto; height: auto; max-width: 100%; max-height: 70vh; display:block; margin: 0 auto;">
            </div>
        </div>
    </div>    

    <footer>
        <div class="container">
            <a href="/" class="med-home med-home-sub">
                <img src="/img/medhome.svg" alt="">
            </a>
            <a href="/front-r01routes" class="med-footer-second"><span>План клиники</span></a>
        </div>
    </footer>