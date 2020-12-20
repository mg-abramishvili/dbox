@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @include('front.photoalbums.index-default')
        @elseif($page->page_type == 'kadet')
            @include('front.photoalbums.index-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.photoalbums.index-detsad')
        @endif

</div>

@endsection