@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @include('front.news.default.index')

    @elseif($settings->theme == 'nast')
        @include('front.news.nast.index')

    @elseif($settings->theme == 'detsad')
        @include('front.news.detsad.index')

    @elseif($settings->theme == 'kadet')
        @include('front.news.kadet.index')

    @endif

</div>

@endsection