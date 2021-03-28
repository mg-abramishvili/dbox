@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
    @if($settings->orientation == 'vertical')
        <link href="{{ asset('css/style-shkola-vert.css') }}" rel="stylesheet">
    @endif
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

        <div class="container" style="margin-top: 25vh; width: 90vw;">

            <div class="page-item">
                @forelse($page->types as $type)

                    @if($type->id == '1')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.shkola.type-1.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.shkola.type-1.vertical')
                        @endif

                    @elseif($type->id == '2')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.shkola.type-2.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.shkola.type-2.vertical')
                        @endif

                    @elseif($type->id == '3')
                        @include('front.pages.shkola.type-3.horizontal')

                    @elseif($type->id == '4')
                        @include('front.pages.shkola.type-4.horizontal')

                    @elseif($type->id == '5')
                        @include('front.pages.shkola.type-5.horizontal')

                    @elseif($type->id == '6')
                        @include('front.pages.shkola.type-6.horizontal')

                    @elseif($type->id == '7')
                        @include('front.pages.shkola.type-7.horizontal')

                    @elseif($type->id == '8')
                        @include('front.pages.shkola.type-8.horizontal')

                    @elseif($type->id == '9')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.shkola.type-9.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.shkola.type-9.vertical')
                        @endif
                    @endif
                @empty
                    <p>Не задан тип страницы</p>
                @endforelse
            </div>

        </div>

        <footer>
            <div class="container">
                <a href="/" class="shkola-home shkola-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </a>
                @if($page->parent_id)
                    @foreach ($pages as $parent_page)
                        @if($parent_page->id == $page->parent_id)
                        <a href="/front-pages/{{ $parent_page->id }}" class="shkola-footer-second"><span>{{ $parent_page->title }}</span></a>
                        <a class="shkola-footer-third"><span>{{ $page->title }}</span></a>
                        @endif
                    @endforeach
                @else
                    <a href="/front-pages/{{ $page->id }}" class="shkola-footer-second"><span>{{ $page->title }}</span></a>
                @endif
            </div>
        </footer>
    </div>