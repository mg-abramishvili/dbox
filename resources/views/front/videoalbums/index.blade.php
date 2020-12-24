@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @include('front.videoalbums.index-default')
        @elseif($settings->theme == 'nast')
            @include('front.videoalbums.index-nast')
        @elseif($settings->theme == 'kadet')
            @include('front.videoalbums.index-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.videoalbums.index-detsad')
        @endif

</div>

@endsection