@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @include('front.photoalbums.show-default')
        @elseif($settings->theme == 'nast')
            @include('front.photoalbums.show-nast')
        @elseif($settings->theme == 'kadet')
            @include('front.photoalbums.show-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.photoalbums.show-detsad')
        @endif

</div>

@endsection