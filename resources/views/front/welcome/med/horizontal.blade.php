@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
@endsection

<div class="med">

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

    <div class="container container-index">
        <div class="row">

            @if($settings->module_photoalbums == 'y')
                <div class="col-6">
                    <a href="/front-photoalbums/" class="index-button">
                        <span>Фотогалерея</span>
                    </a>
                </div>
            @endif

            @if($settings->module_videoalbums == 'y')
                <div class="col-6">
                    <a href="/front-videoalbums/" class="index-button">
                        <span>Видеогалерея</span>
                    </a>
                </div>
            @endif

            @if($settings->module_news == 'y')
                <div class="col-6">
                    <a href="/front-news/" class="index-button">
                        <span>Новости</span>
                    </a>
                </div>
            @endif
            
            @foreach($pages as $page)
                <div class="col-6">
                    <div class="user-pages-item-item">
                        <a href="/front-pages/{{ $page->id }}" class="index-button">
                            @if($page->image_as_icon == 1)
                                <div class="user-pages-item-image" style="background-image:url({{ $page->image }});"></div>
                            @else
                                @if($page->icons()->exists())
                                    @foreach($page->icons as $icon)
                                        <!--<img src="{{ $icon->icon }}">-->
                                    @endforeach
                                @else
                                    
                                @endif
                            @endif
                            <span>{{ $page->title }}</span>
                        </a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

    <footer>
        <div class="container">
            <a href="/" class="med-home">
                <img src="/img/medhome.svg" alt="">
            </a>
        </div>
    </footer>

</div>

@section('scripts')
    @parent
    
@endsection