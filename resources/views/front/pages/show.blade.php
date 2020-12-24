@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @include('front.pages.show-default')
        @elseif($settings->theme == 'nast')
            @include('front.pages.show-nast')
        @elseif($settings->theme == 'kadet')
            @include('front.pages.show-kadet')
        @elseif($settings->theme == 'detsad')
            @include('front.pages.show-detsad')
        @elseif($settings->theme == 'book')
            @include('front.pages.show-book')
        @endif

</div>
@endsection