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
            @include('front.welcome.nast.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.nast.vertical')
        @endif

    @elseif($settings->theme == 'detsad')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.detsad.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.detsad.horizontal')
        @endif

    @elseif($settings->theme == 'book')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.book.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.book.horizontal')
        @endif

    @endif

</div>

@endsection