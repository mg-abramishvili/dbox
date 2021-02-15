@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @if($settings->orientation == 'horizontal')
                @include('front.videoalbums.default.index-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.videoalbums.default.index-vertical')
            @endif

        @elseif($settings->theme == 'nast')
            @include('front.videoalbums.index-nast')
        @elseif($settings->theme == 'kadet')
            @include('front.videoalbums.index-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.videoalbums.index-detsad')
        @endif

</div>

@endsection