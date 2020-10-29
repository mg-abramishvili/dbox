@section('styles')
    @parent
    <link href="{{ asset('css/style-kadet.css') }}" rel="stylesheet">
@endsection

    <div class="container">
        <div class="type-1">
            <div class="row">
                <div class="col-12">

                    <h1 style="text-align: center;">{{ $photoalbum->title }}</h1>

                    @if(is_array($photoalbum->gallery))
                    <div class="gallery">
                        @foreach($photoalbum->gallery as $k=>$v)
                            <div class="gallery-item">
                                <img src="{{ $v }}" />
                            </div>
                        @endforeach
                    </div>
                    @endif

                    <script>
                        $('.gallery').flickity({
                        cellAlign: 'left',
                        contain: true
                        });
                    </script>
                
                </div>
            </div>
            <div class="backbutton">
                <a href="/front-photoalbums">Назад</a>
            </div>
        </div>
    </div>