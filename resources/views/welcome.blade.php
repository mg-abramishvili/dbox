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
    @endif

</div>

@endsection