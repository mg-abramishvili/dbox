<div class="type-4">
    <div class="row">
        <div class="col-12"><h1 style="text-align:center;">{{ $page->title }}</h1></div>
        <div class="col-12">
            <div class="text">{!! $page->text !!}</div>
        </div>
        <div class="col-12">
            <div id="gallery">
                @if(is_array($page->gallery))
                @foreach($page->gallery as $k=>$v)
                    <div class="gallery-item" style="height: 250px; margin-bottom: 30px; background: url({{$v}}); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;">
                        <a href="{{$v}}" style="display: block; width: 100%; height: 100px;"></a>
                    </div>
                @endforeach
                @endif
            </div>
            <script>
                $('#gallery').flickity({
                cellAlign: 'left',
                contain: true,
                pageDots: false,
                });            
            </script>
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