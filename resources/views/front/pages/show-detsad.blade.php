@section('styles')
    @parent
    <link href="{{ asset('css/style-detsad.css') }}" rel="stylesheet">
@endsection

<div class="detsad">

    <div class="header">
        <div class="header-top">
            <div class="row align-items-center">
            <div class="col-2 header-date">
                    
                    </div>
                    <script>
                            $(function() {
                                startRefresh();
                            });
    
                            function startRefresh() {
                                setTimeout(startRefresh,1000);
                                $.get('/time.php', function(data) {
                                    $('.header-date').html(data);    
                                });
                            }
                        </script>
                <div class="col-8"><h1>{{ $settings->title }}</h1></div>
                <div class="col-2 header-map"><a href="/front-pages/7" style="color: #fff;">План <br>здания</a></div>
            </div>
        </div>
        <div class="header-bottom">{{ $page->title }}</div>
    </div>

    <div class="container" style="margin-top: 45px;">
        <div class="page-item">
        @if($page->page_type == '1')
            @include('front.pages.type-1')
        @elseif($page->page_type == '2')
            @include('front.pages.type-2')
        @elseif($page->page_type == '3')
            @include('front.pages.type-3')
        @elseif($page->page_type == '4')
            @include('front.pages.type-4')
        @elseif($page->page_type == '5')
            @include('front.pages.type-5')
        @elseif($page->page_type == '6')
            @include('front.pages.type-6')
        @elseif($page->page_type == '7')
            @include('front.pages.type-7')
        @endif
            
        </div>
    </div>



</div>
<div class="backbutton">
                <a href="/"><img src="/img/home.svg" alt=""></a>

                @if(!empty($page->parent_id))
                <a href="/front-pages/{{ $page->parent_id }}" style="margin-left: 50px; color: #fff; font-size: 20px; line-height: 72px;"><i style="display: inline-block; padding-right: 20px; padding-left: 30px; font-style: normal;">Назад</i></a>
                @endif
                <span>{{ $page->title }}</span>
            </div>
<div class="footer">
        Выберите интересующий Вас раздел и нажмите на него ...
    </div>


        

