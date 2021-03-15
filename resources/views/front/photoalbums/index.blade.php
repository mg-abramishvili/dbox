@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        <!-- Тема Стандарт 1 -->
        @if($settings->theme == 'default')
            @if($settings->orientation == 'horizontal')
                @include('front.photoalbums.default.index-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.photoalbums.default.index-vertical')
            @endif

        <!-- Тема Стандарт 2 -->
        @elseif($settings->theme == 'nast')
            @if($settings->orientation == 'horizontal')
                @include('front.photoalbums.nast.index-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.photoalbums.nast.index-vertical')
            @endif

        <!-- Тема Медцентр -->
        @elseif($settings->theme == 'med')
            @if($settings->orientation == 'horizontal')
                @include('front.photoalbums.med.index-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.photoalbums.med.index-vertical')
            @endif
            
        @endif

</div>

@endsection