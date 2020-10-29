@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'kadet')
            @include('front.photoalbums.show-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.photoalbums.show-detsad')
        @endif

</div>

@endsection