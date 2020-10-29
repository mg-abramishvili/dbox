@extends('layouts.front')
@section('content')

<div class="wrapper" style="">
    <!--
    @if($settings->blur == 1)
        <div class="bg" style="background: url({{ $settings->background }}); background-size: cover; background-position: 50% 50%; position: absolute; left: -50px; right: -50px; top: -50px; bottom: -50px; width: calc(100% + 100px); height: calc(100% + 100px); filter: blur(8px);"></div>
    @else
        <div class="bg" style="background: url({{ $settings->background }}); background-size: cover; background-position: 50% 50%; position: absolute; left: -50px; right: -50px; top: -50px; bottom: -50px; width: calc(100% + 100px); height: calc(100% + 100px);"></div>
    @endif
    -->

    @if($settings->theme == 'detsad')
        @include('front.news.show-detsad')
    @elseif($settings->theme == 'kadet')
    @include('front.news.show-kadet')
    @endif

</div>

@endsection