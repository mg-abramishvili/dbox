@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'kadet')
            @include('front.videoalbums.index-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.videoalbums.index-detsad')
        @endif

</div>

@endsection