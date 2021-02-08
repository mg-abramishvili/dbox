@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @include('front.photoalbums.default.show-horizontal')
        @elseif($settings->theme == 'nast')
            @include('front.photoalbums.nast.show-horizontal')
        @elseif($settings->theme == 'kadet')
            @include('front.photoalbums.show-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.photoalbums.show-detsad')
        @endif

</div>

@endsection