@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'kadet')
            @include('front.photoalbums.index-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.photoalbums.index-detsad')
        @endif

</div>

@endsection