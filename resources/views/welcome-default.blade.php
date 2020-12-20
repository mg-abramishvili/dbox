@section('styles')
    @parent
    <link href="{{ asset('css/style-default.css') }}" rel="stylesheet">
@endsection

<div class="default">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="header">
                    <div class="row align-items-center">
                        <div class="col-4 header-logo">
                            <a href="/"><img src="{{ $settings->logo }}"></a>
                        </div>
                        <div class="col-8 header-text">
                            {{ $settings->title }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div class="row">
                    <div class="col-5">
                        @if(isset($photoalbums))
                            <a href="/front-photoalbums/" class="photogalleries">
                                <img src="/img/icon-photogal.svg">
                                Фотогалерея
                            </a>
                        @endif

                        @if(isset($videoalbums))
                            <a href="/front-videoalbums/" class="videogalleries">
                                <img src="/img/icon-videogal.svg">
                                Видеогалерея
                            </a>
                        @endif
                    </div>
                    <div class="col-7">
                        <a href="/front-news/" class="news">
                            <img src="/img/icon-news.svg">
                            Новости
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="user-pages">
                    <div class="user-pages-item-item">
                        Страница один
                    </div>
                    <div class="user-pages-item-item">
                        Страница два
                    </div>
                    <div class="user-pages-item-item">
                        Страница три
                    </div>
                    <div class="user-pages-item-item">
                        Страница четыре
                    </div>
                    <div class="user-pages-item-item">
                        Страница пять
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        var divs = $(".user-pages .user-pages-item-item");
            for(var i = 0; i < divs.length; i+=2) {
            divs.slice(i, i+2).wrapAll("<div class='user-pages-item'></div>");
        }
    </script>

    <script>
        $('.user-pages').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        });
    </script>
@endsection