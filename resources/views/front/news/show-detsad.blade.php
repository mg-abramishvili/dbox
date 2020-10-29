@section('styles')
    @parent
    <link href="{{ asset('css/style-detsad.css') }}" rel="stylesheet">
@endsection

<div class="detsad">

    <div class="header">
        <div class="header-top">
            <div class="row align-items-center">
                <div class="col-4 header-date">01.01.2020</div>
                <div class="col-4"><h1>{{ $settings->title }}</h1></div>
                <div class="col-4 header-map">План <br>здания</div>
            </div>
        </div>
        <div class="header-bottom">Новости и мероприятия</div>
    </div>

    <div class="container" style="margin-top: 45px;">
        <div class="news-item">
            <div class="row">
                <div class="col-4">
                    <div class="news-item-img" style="background-image: url({{ $news->image }});"></div>
                </div>
                <div class="col-8">
                    <div class="news-item-text">
                        <span>{{$news->created_at->format('d.m.Y')}}</span>
                        <h1>{{ $news->title }}</h1>
                        {{ $news->text }}
                        </div>
                    </div>
            </div>
            <div class="backbutton">
                
            </div>
        </div>
    </div>



</div>

<div class="footer">
        Выберите интересующий Вас раздел и нажмите на него ...
    </div>

