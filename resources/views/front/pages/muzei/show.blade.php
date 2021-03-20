@section('styles')
    @parent
    <link href="{{ asset('css/style-muzei.css') }}" rel="stylesheet">
    @if($settings->orientation == 'vertical')
        <link href="{{ asset('css/style-muzei-vert.css') }}" rel="stylesheet">
    @endif
@endsection

    <div class="muzei">

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

            <div class="page-item">
                @forelse($page->types as $type)

                    @if($type->id == '1')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.muzei.type-1.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.muzei.type-1.vertical')
                        @endif

                    @elseif($type->id == '2')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.muzei.type-2.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.muzei.type-2.vertical')
                        @endif

                    @elseif($type->id == '3')
                        @include('front.pages.muzei.type-3.horizontal')

                    @elseif($type->id == '4')
                        @include('front.pages.muzei.type-4.horizontal')

                    @elseif($type->id == '5')
                        @include('front.pages.muzei.type-5.horizontal')

                    @elseif($type->id == '6')
                        @include('front.pages.muzei.type-6.horizontal')

                    @elseif($type->id == '7')
                        @include('front.pages.muzei.type-7.horizontal')

                    @elseif($type->id == '8')
                        @include('front.pages.muzei.type-8.horizontal')

                    @elseif($type->id == '9')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.muzei.type-9.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.muzei.type-9.vertical')
                        @endif
                    @endif
                @empty
                    <p>Не задан тип страницы</p>
                @endforelse
            </div>

        </div>

        <footer>
        <div class="container">
            <a href="/" class="med-home med-home-sub">
                <img src="/img/medhome.svg" alt="">
            </a>
            <a href="/front-pages/{{ $page->id }}" class="med-footer-second"><span>{{ $page->title }}</span></a>
        </div>
    </footer>
    </div>