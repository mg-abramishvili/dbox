@section('styles')
    @parent
    <link href="{{ asset('css/style-kadet.css') }}" rel="stylesheet">
@endsection

<div class="container" style="margin-top: 0px;">
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
        @elseif($page->page_type == '8')
            @include('front.pages.type-8')
        @endif
    </div>
    <div class="backbutton">
        <a href="/"><img src="/img/home.svg"></a>
    </div>
