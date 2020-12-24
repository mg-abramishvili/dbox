@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @include('welcome-default')
    @elseif($settings->theme == 'nast')
        @include('welcome-nast')
    @elseif($settings->theme == 'detsad')
        @include('welcome-detsad')
    @elseif($settings->theme == 'kadet')
        @include('welcome-kadet')
    @elseif($settings->theme == 'book')
        @include('welcome-book')
    @endif

</div>

@endsection