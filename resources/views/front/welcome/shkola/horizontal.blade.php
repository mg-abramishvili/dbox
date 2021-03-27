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

    <div class="container container-index">
        <div class="row sortable">

            @foreach($pages as $page)
                <div class="col-3" @if($page->sort) data-index="sort_{{ $page->sort }} @endif">
                    <div class="user-pages-item-item">
                        <a href="/front-pages/{{ $page->id }}" class="index-button">
                            @if($page->image_as_icon == 1)
                                <div class="user-pages-item-image" style="background-image:url({{ $page->image }});"></div>
                                <span class="t6-p">{{ $page->title }}</span>
                            @else
                                @if($page->icons()->exists())
                                    @foreach($page->icons as $icon)
                                        <div class="index-button-icon">
                                            <img src="{{ $icon->icon }}">
                                        </div>
                                        <span>{{ $page->title }}</span>
                                    @endforeach
                                @else
                                    <div class="index-button-icon">
                                        <img src="/img/icons/014-passport.svg">
                                    </div>
                                    <span>{{ $page->title }}</span>
                                @endif
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach

            @if($settings->module_routes == 'y')
                <div class="col-3" @if($settings->module_routes_sort) data-index="sort_{{ $settings->module_routes_sort }} @endif">
                    <a href="/front-r01routes/" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/019-home-1.svg">
                        </div>
                        <span>План клиники</span>
                    </a>
                </div>
            @endif

            @if($settings->module_news == 'y')
                @if($news->count() >= 1)
                    <div class="col-3" @if($settings->module_news_sort) data-index="sort_{{ $settings->module_news_sort }} @endif">
                        <a href="/front-news/" class="index-button">
                            <div class="index-button-icon">
                                <img src="/img/icons/002-newspaper.svg">
                            </div>
                            <span>Новости</span>
                        </a>
                    </div>
                @endif
            @endif

            @if($settings->module_photoalbums == 'y')
                <div class="col-3" @if($settings->module_photoalbums_sort) data-index="sort_{{ $settings->module_photoalbums_sort }} @endif">
                    <a href="/front-photoalbums/" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/001-picture.svg">
                        </div>
                        <span>Фотогалерея</span>
                    </a>
                </div>
            @endif

            @if($settings->module_videoalbums == 'y')
                <div class="col-3" @if($settings->module_videoalbums_sort) data-index="sort_{{ $settings->module_videoalbums_sort }} @endif">
                    <a href="/front-videoalbums/" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/006-video-player.svg">
                        </div>
                        <span>Видеогалерея</span>
                    </a>
                </div>
            @endif

            @if($settings->module_reviews == 'y')
                <div class="col-3" @if($settings->module_reviews_sort) data-index="sort_{{ $settings->module_reviews_sort }} @endif">
                    <a href="/front-reviews/" class="index-button">
                        <span>Оставить отзыв</span>
                    </a>
                </div>
            @endif

        </div>
    </div>

</div>

@section('scripts')
    @parent
    <script>
        asc=false;   
        var sorted=$('.col-3').sort(function(a,b){
                return (asc ==
                    ($(a).data('index') <  $(b).data('index'))) ? 1 : -1;
            });
            asc = asc ? false : true;
            $('.sortable').html(sorted);
    </script>
@endsection