<div class="type-1">
    <div class="row">
        <div class="col-12">

            <div class="header" style="background: url({{ $page->image }}); background-size: cover; background-position: 50% 50%;"></div>
            @if($settings->theme == 'kadet')
            <h1>{{ $page->title }}</h1>
@endif
            <div class="text">{!! $page->text !!}</div>
            
        </div>
    </div>
</div>