@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    <!-- Тема Стандарт 1 -->
    @if($settings->theme == 'default')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.default.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.default.vertical')
        @endif

    <!-- Тема Стандарт 2 -->
    @elseif($settings->theme == 'nast')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.nast.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.nast.vertical')
        @endif

    <!-- Тема Медцентр -->
    @elseif($settings->theme == 'med')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.med.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.med.vertical')
        @endif

    <!-- Тема Детсад -->
    @elseif($settings->theme == 'detsad')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.detsad.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.detsad.horizontal')
        @endif

    <!-- Тема Книга -->
    @elseif($settings->theme == 'book')
        @if($settings->orientation == 'horizontal')
            @include('front.welcome.book.horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.welcome.book.horizontal')
        @endif

    @endif

</div>

@endsection