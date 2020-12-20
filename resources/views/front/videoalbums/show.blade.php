@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @include('front.videoalbums.show-default')
        @elseif($settings->theme == 'kadet')
            @include('front.videoalbums.show-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.videoalbums.show-detsad')
        @endif

</div>

@endsection