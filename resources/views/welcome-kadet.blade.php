@section('styles')
    @parent
    <link href="{{ asset('css/style-kadet.css') }}" rel="stylesheet">
@endsection

    <div class="container" style="margin-top: 90px;">

        <div class="row">

        <div class="col-3">
            <img src="/kadet/logo.png" style="width: 150px; display: block; margin: 0 auto; margin-bottom: 20px">
            <h1 style="font-size: 30px; font-weight: bold; line-height: 1.4; margin: 0; text-align: center; color: {{ $settings->titlecolor }}; color: #fff;     height: 120px;">{{ $settings->title }}</h1>

            @if(isset($photoalbums))
            <a href="/front-photoalbums/" class="index-item index-item-6">
                <p>Фотогалерея</p>
                <!--
                @if(is_array($photoalbums->gallery))
                @foreach($photoalbums->gallery as $k=>$v)
                    <img src="{{$v}}" style="height: 80px">
                @endforeach
                @endif
                -->
            </a>
            @endif

            @if(isset($videoalbums))
            <a href="/front-videoalbums/" class="index-item index-item-7">
                <p>Видеогалерея</p>
                <!--
                @if(is_array($photoalbums->gallery))
                @foreach($photoalbums->gallery as $k=>$v)
                    <img src="{{$v}}" style="height: 80px">
                @endforeach
                @endif
                -->
            </a>
            @endif
        </div>

        <div class="col-9">
            <div class="row">

                @if(isset($page1))
                <div class="col-8">
                    <a href="/front-pages/{{ $page1->id }}" class="index-item index-item-1">
                    <p>{{ $page1->title }}</p>
                        <div class="index-item-pic" style="@if($page1->image) background: url({{ $page1->image }}); background-size: cover; background-position: 50% 50%; @endif"></div>
                        
                    </a>
                </div>
                @endif

                @if(isset($page2))
                <div class="col-4">
                    <a href="/front-pages/{{ $page2->id }}" class="index-item index-item-2">
                    <p>{{ $page2->title }}</p>
                        <div class="index-item-pic" style="@if($page2->image) background: url({{ $page2->image }}); background-size: cover; background-position: 50% 50%; @endif"></div>
                        
                    </a>
                </div>
                @endif

                @if(isset($page3))
                <div class="col">
                    <a href="/front-pages/{{ $page3->id }}" class="index-item index-item-3">
                    <p>{{ $page3->title }}</p>
                        <div class="index-item-pic" style="@if($page3->image) background: url({{ $page3->image }}); background-size: cover; background-position: 50% 50%; @endif"></div>
                        
                    </a>
                </div>
                @endif

                @if(isset($page4))
                <div class="col-4">
                    <a href="/front-pages/{{ $page4->id }}" class="index-item index-item-4">
                    <p>{{ $page4->title }}</p>
                        <div class="index-item-pic" style="@if($page4->image) background: url({{ $page4->image }}); background-size: cover; background-position: 50% 50%; @endif"></div>
                        
                    </a>
                </div>
                @endif

                @if(isset($page5))
                <div class="col-5">
                    <a href="/front-pages/{{ $page5->id }}" class="index-item index-item-5">
                    <p>{{ $page5->title }}</p>
                        <div class="index-item-pic" style="@if($page5->image) background: url({{ $page5->image }}); background-size: cover; background-position: 50% 50%; @endif"></div>
                        
                    </a>
                </div>
                @endif



            </div>
                
            <!--<div class="row">
                @if(isset($pages))
                @foreach($pages as $page)
                <div class="col-3">
                    <div class="index-item">
                        {{ $page->title }}
                    </div>
                </div>
                @endforeach
                @endif
            </div>-->
            </div>
        </div>
    </div>