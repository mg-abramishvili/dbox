<div class="type-5">
    <div class="row">
    @if($settings->theme == 'kadet')
        <div class="col-12"><h1 style="text-align:center;">{{ $page->title }}</h1></div>
        @endif
        <div class="col-9">

            <video src="{{ $page->video }}" controls></video>
            
        </div>
        <div class="col-3">
            <div class="text">{!! $page->text !!}</div>
        </div>
    </div>
</div>