<div class="type-6">
    <div class="row">
        <div class="col-12"><h1 style="text-align:center;">{{ $page->title }}</h1></div>

        
            @foreach($childs->children as $child)
            <div class="col-4">
                <a href="/front-pages/{{ $child->id }}" class="item">
                    <div class="image" style="background-image: url({{ $child->image }});"></div>
                    <span>{{ $child->title }}</span>
                </a>
            </div>
            @endforeach

            <script>
                    $('.item span').each(function() {
        var word = $(this).html();
        var index = word.indexOf(' ');
        if(index == -1) {
            index = word.length;
        }
        $(this).html('<strong style="font-weight: 400; text-transform: uppercase;">' + word.substring(0, index) + '</strong><br/>' + word.substring(index, word.length));
    });
            </script>
        

    </div>
    <div class="backbutton">
        <a href="/"><img src="/img/home.svg"></a>
    </div>
</div>