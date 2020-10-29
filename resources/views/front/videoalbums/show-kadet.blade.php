@section('styles')
    @parent
    <link href="{{ asset('css/style-kadet.css') }}" rel="stylesheet">
@endsection

    <div class="container">
        <div class="gallery">
            <div class="row">
                <div class="col-12">

                    <h1 style="text-align: center; color: #fff;">{{ $videoalbum->title }}</h1>
                    
                    <video src="{{ $videoalbum->gallery }}" autoplay nocontrols id="myvid" onclick="myFunction()"></video>
                
                    <script>
                    function myFunction() {
                    var element = document.getElementById("myvid");
                    element.classList.toggle("vvideo");
                    }
                    </script>
                </div>
            </div>
            <div class="backbutton">
                <a href="/front-videoalbums">Назад</a>
            </div>
        </div>
    </div>