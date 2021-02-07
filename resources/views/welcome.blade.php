@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.default.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.default.vertical')
        @endif

    @elseif($settings->theme == 'nast')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.welcome-nast-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.welcome-nast-vertical')
        @endif

    @elseif($settings->theme == 'detsad')
        @include('welcome-detsad')

    @elseif($settings->theme == 'kadet')
        @include('welcome-kadet')

    @elseif($settings->theme == 'book')
        @include('welcome-book')

    @endif

</div>

@endsection