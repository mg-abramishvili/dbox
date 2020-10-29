@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'kadet')
            @include('front.pages.show-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.pages.show-detsad')
        @endif

</div>
@endsection