<div class="type-3">
    <div class="row">
        <div class="col-12"><h1>{{ $page->title }}</h1></div>
        <div class="col-6">
            <div class="text">{!! $page->text !!}</div>
        </div>
        <div class="col-6">
            <div id="gallery" class="row">
                @if(is_array($page->gallery))
                @foreach($page->gallery as $k=>$v)
                    <div class="col-6">
                        <a href="{{$v}}" style="height: 300px; margin-bottom: 30px; display: block; border-radius: 25px; background: url({{$v}}); background-sizE: cover; background-position: 50% 50%;"></a>
                    </div>
                @endforeach
                @endif
            </div>
            <script>
                lightGallery(document.getElementById('gallery'), {
                    selector: 'a'
                });
            </script>
        </div>
    </div>
    <div class="backbutton">
        <a href="/">Назад</a>
    </div>
</div>