<div class="type-2">
    <div class="row">
        <div class="col-5">
            <div class="image" style="background: url({{ $page->image }}); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;"></div>
        </div>
        <div class="col-7">
            <h1>{{ $page->title }}</h1>
            <div class="text">{!! $page->text !!}</div>
        </div>
    </div>
    <div class="backbutton">
        <a href="/">Назад</a>
    </div>
</div>