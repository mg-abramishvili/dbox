@section('styles')
    @parent
    <link href="{{ asset('css/style-default.css') }}" rel="stylesheet">
@endsection

    <div class="default">
        <div class="container">
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

            <div class="page-item">
                @foreach($page->types as $type)
                    @if($type->id == '1')
                        @include('front.pages.type-1')
                    @elseif($type->id == '2')
                        @include('front.pages.type-2')
                    @elseif($type->id == '3')
                        @include('front.pages.type-3')
                    @elseif($type->id == '4')
                        @include('front.pages.type-4')
                    @elseif($type->id == '5')
                        @include('front.pages.type-5')
                    @elseif($type->id == '6')
                        @include('front.pages.type-6')
                    @elseif($type->id == '7')
                        @include('front.pages.type-7')
                    @endif

                @endforeach
            </div>

            <div class="footer">
                <a href="/" class="home-button">
                    <img src="/img/icon-footer-home.svg">
                </a>
            </div>

        </div>
    </div>