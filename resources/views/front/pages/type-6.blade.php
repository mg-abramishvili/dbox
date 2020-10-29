<div class="type-6">
    <div class="row">
        <div class="col-12"><h1 style="text-align:center;">{{ $page->title }}</h1></div>
        <div class="col-12">


        @foreach($childs->children as $child)
            <a href="/front-pages/{{ $child->id }}">{{ $child->title }}</a>
        @endforeach
            
        </div>
    </div>
    <div class="backbutton">
        <a href="/">Назад</a>
    </div>
</div>