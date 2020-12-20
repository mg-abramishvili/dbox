@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @include('front.news.show-default')
    @elseif($settings->theme == 'detsad')
        @include('front.news.show-detsad')
    @elseif($settings->theme == 'kadet')
        @include('front.news.show-kadet')
    @endif

</div>

@endsection