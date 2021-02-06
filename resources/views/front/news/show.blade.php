@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @include('front.news.default.show')

    @elseif($settings->theme == 'nast')
        @include('front.news.nast.show')

    @elseif($settings->theme == 'detsad')
        @include('front.news.detsad.show')

    @elseif($settings->theme == 'kadet')
        @include('front.news.kadet.show')
        
    @endif

</div>

@endsection