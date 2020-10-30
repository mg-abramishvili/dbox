@section('styles')
    @parent
    <link href="{{ asset('css/style-kadet.css') }}" rel="stylesheet">
@endsection

    <div class="container">
        <div class="gallery">
            <div class="row">
                <div class="col-12">
                <h1 style="color: #fff; text-align: center; margin: 50px 0; font-weight: 700; font-size: 50px; text-transform: uppercase;">Видеогалерея</h1>
                    <div class="gallery-list">
                    <div class="row">
                        @foreach($videoalbums as $videoalbum)
                        <div class="col-3">
                        <div class="gallery-list-item">
                            <a href="/front-videoalbums/{{ $videoalbum->id }}">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                    <span style="font-size: 15px; color: #fff; display: block; text-align: center;">{{$videoalbum->created_at->format('d.m.Y')}}</span>
                                        <div class="gallery-list-item-pic" style="background: url({{ $videoalbum->cover }}); background-size: cover; background-position: 50% 50%:"></div>
                                    </div>
                                    <div class="col-12">
                                        <h2>{{ $videoalbum->title }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
            <div class="backbutton">
            <a href="/"><img src="/img/home.svg"></a>
            </div>
        </div>
    </div>