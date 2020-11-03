<div class="type-8" style="height: 1080px;">
    <div class="row align-items-center" style="height: 1080px;">
        
<div class="col-12" style="top: -60px;">

<style>
    #flipbook {
        animation-name: fade;
        animation-duration: 2s;
    }

    @keyframes fade {
  0% {opacity: 0;}
  50% {opacity: 0;}
  100% {opacity: 1;}
}
</style>

        <div id="flipbook" style="margin: 0 auto;">
            @if(is_array($page->gallery))
                @foreach($page->gallery as $k=>$v)
                <div>
                    <img src="{{$v}}" style="width: 100%; height: auto;">
                </div>
                @endforeach
            @endif
        </div>



        </div>
    </div><button id="prevBtn"><</button>
<button id="nextBtn">></button>
</div>
<div class="col-12" style="opacity:0;">

        <div id="sizer" style="border: 1px solid black; display:block; margin: 0 auto; width: 1400px;">
            @if(is_array($page->gallery))
                @foreach($page->gallery as $k=>$v)
                <div style="width: 50%; float: left;">
                    <img src="{{$v}}" style="width: 100%; height: auto;">
                </div>
                @endforeach
            @endif
        </div>
</div>
<script>
setTimeout(function(){
$("#flipbook").turn({
	width: $('#sizer div:first').find('img').width() * 2,
	height: $('#sizer div:first').find('img').height(),
});
}, 1000);
$("#pageFld").val($("#flipbook").turn("page"));

$("#flipbook").bind("turned", function(event, page, view) {
		$("#pageFld").val(page);
});

$("#pageFld").change(function() {
		$("#flipbook").turn("page", $(this).val());
});

$("#prevBtn").click(function() {
		$("#flipbook").turn("previous");
});

$("#nextBtn").click(function() {
		$("#flipbook").turn("next");
});
</script>