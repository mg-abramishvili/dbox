@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'kadet')
            @include('front.pages.show-kadet')
        @elseif($settings->theme == 'detsad')
            @include('front.pages.show-detsad')
        @endif

</div>
@endsection