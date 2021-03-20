@section('styles')
    @parent
    <link href="{{ asset('css/style-muzei.css') }}" rel="stylesheet">
@endsection

<div class="muzei">

    <div class="container">

    <div class="row">
        <div class="col-3">
            <div class="m-sidebar">
                <div class="m-logo">
                    <a href="/"><img src="{{ $settings->logo }}"></a>
                </div>
                <div class="m-title">
                    <p>{{ $settings->title }}</p>
                </div>

                @if($settings->module_videoalbums == 'y')
                    <a href="/front-videoalbums/" class="m-sidebar-button">
                        <span>Видеогалерея</span>
                        <img src="/img/muzei/vdbtn.png">
                    </a>
                @endif
            </div>
        </div>
        <div class="col-9">
            <div class="m-content">

                <div class="m-banner" style="background-image: url(/img/muzei/mbn.jpg);"></div>

                <div class="row m-buttons">

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

                    @if($settings->module_routes == 'y')
                        <div class="col-6">
                            <a href="/front-r01routes/" class="index-button">
                                <span>План клиники</span>
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

                    @if($settings->module_photoalbums == 'y')
                        <div class="col-6">
                            <a href="/front-photoalbums/" class="index-button">
                                <span>Фотогалерея</span>
                            </a>
                        </div>
                    @endif

                    @if($settings->module_reviews == 'y')
                        <div class="col-6">
                            <a href="/front-reviews/" class="index-button">
                                <span>Оставить отзыв</span>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    </div>

</div>

@section('scripts')
    @parent
    
@endsection