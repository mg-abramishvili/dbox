@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        <!-- Тема Стандарт 1 -->
        @if($settings->theme == 'default')
            @if($settings->orientation == 'horizontal')
                @include('front.photoalbums.default.show-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.photoalbums.default.show-vertical')
            @endif

        <!-- Тема Стандарт 2 -->
        @elseif($settings->theme == 'nast')
            @if($settings->orientation == 'horizontal')
                @include('front.photoalbums.nast.show-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.photoalbums.nast.show-vertical')
            @endif

        <!-- Тема Медцентр -->
        @elseif($settings->theme == 'med')
            @if($settings->orientation == 'horizontal')
                @include('front.photoalbums.med.show-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.photoalbums.med.show-vertical')
            @endif
            
        @endif

</div>

@endsection