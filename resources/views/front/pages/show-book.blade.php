@section('styles')
    @parent
    <link href="{{ asset('css/style-book.css') }}" rel="stylesheet">
@endsection

    <div class="book">
        <div class="container">

            <div class="page-item">
                @foreach($page->types as $type)
                    @if($type->id == '1')
                        @include('front.pages.type-1')
                    @elseif($type->id == '2')
                        @include('front.pages.type-2')
                    @elseif($type->id == '3')
                        @include('front.pages.type-3')
                    @elseif($type->id == '4')
                        @include('front.pages.type-4')
                    @elseif($type->id == '5')
                        @include('front.pages.type-5')
                    @elseif($type->id == '6')
                        @include('front.pages.type-6')
                    @elseif($type->id == '7')
                        @include('front.pages.type-7')
                    @elseif($type->id == '8')
                        @include('front.pages.type-8')
                    @endif

                @endforeach
            </div>

        </div>
    </div>