<div class="type-5">
    <div class="row">
        <div class="col-12"><h1 style="text-align:center;">{{ $page->title }}</h1></div>
        <div class="col-9">

            <video src="{{ $page->video }}" controls></video>
            
        </div>
        <div class="col-3">
            <div class="text">{!! $page->text !!}</div>
        </div>
    </div>
    <div class="backbutton">
        <a href="/">Назад</a>
    </div>
</div>