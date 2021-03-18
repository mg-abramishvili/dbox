@extends('layouts.front')
@section('content')

@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
@endsection

<div class="wrapper" style="">

<header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="calendar">
                        <strong>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('D')}}
                        </strong>
                        <span>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('MMMM')}}
                            <small>{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('dddd')}}</small>
                        </span>
                    </div>
                </div>
                <div class="col-4 header-logo">
                    <a href="/"><img src="{{ $settings->logo }}"></a>
                </div>
                <div class="col-4 text-right">
                    <div class="header-time"></div>
                    <script>
                        $(function() {
                            startRefresh();
                        });

                        function startRefresh() {
                            setTimeout(startRefresh,60000);
                            $.get('/timeonly.php', function(data) {
                                $('.header-time').html(data);    
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="med-route-sidebar">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск ...">
                    @include('front.keyboard')
                    <ul id="myUL">
                    @foreach ($r01routes as $scheme => $route)
                        @foreach($route as $routeItem)
                            @if($loop->first)
                                @foreach($routeItem->schemes as $sch)
                                    <h4><strong>{{ $sch->title }}</strong></h4>
                                @endforeach
                            @endif
                        @endforeach
                        @foreach($route as $routeItem)
                            <li>
                                <a href="/front-r01routes/{{ $routeItem->id }}">{{ $routeItem->title }}</a>
                            </li>
                        @endforeach
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-7">
                <img src="{{ $schemes->image }}" style="width:auto; height: auto; max-width: 100%; max-height: 70vh; display:block; margin: 0 auto;">
            </div>
        </div>
    </div>    

    <footer>
        <div class="container">
            <a href="/" class="med-home med-home-sub">
                <img src="/img/medhome.svg" alt="">
            </a>
            <a href="/front-r01routes" class="med-footer-second"><span>План клиники</span></a>
        </div>
    </footer>

 </div>

@endsection
@section('scripts')
<script> // КЛАВИАТУРА
    $(document).ready(function(){
    $('#v1,#v2,#v3,#v4,#v5,#v6,#v7,#v8,#v9,#v10,#v11,#v12,#v13,#v14,#v15,#v16,#v17,#v18,#v19,#v20,#v21,#v22,#v23,#v24,#v25,#v26,#v27,#v28,#v29,#v30,#v31,#v32,#v33,#v34,#v35,#v36,#v37,#v38,#v39,#v40,#v41,#rv01,#rv02,#rv03,#rv04,#rv05,#rv06,#rv07,#rv08,#rv09,#rv10,#rv11,#rv12,#rv13,#rv14,#rv15,#rv16,#rv17,#rv18,#rv19,#rv20,#rv21,#rv22,#rv23,#rv24,#rv25,#rv26,#rv27,#rv28,#rv29,#rv30,#rv31,#rv32,#rv33,#rv34,#rv35,#rv36,#rv37,#rv38,#rv39,#rv40,#rv41').click(function(){
         var v = $(this).val();
        var total = $('#myInput').val($('#myInput').val() + v);

        e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);

     });
   $('#clear').click(function(){
       $('#myInput').val('');
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
     });
   $('#backspace').click(function(){
       $('#myInput').val($('#myInput').val().substring(0, $('#myInput').val().length - 1));
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
     });
 });
</script>

<script> // ПЕРЕКЛЮЧЕНИЕ КЛАВИАТУРЫ
$('.k-eng').hide();
$('.globebutton').on('click',
function()
{
    $('.k-rus, .k-eng').toggle()
}
);
</script>

<script> // ВВОД В ИНПУТ АВТО

function myFunction() {
// Declare variables
var input, filter, ul, li, a, i, txtValue;
input = document.getElementById('myInput');
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
li = ul.getElementsByTagName('li');

// Loop through all list items, and hide those who don't match the search query
for (i = 0; i < li.length; i++) {
a = li[i].getElementsByTagName("a")[0];
txtValue = a.textContent || a.innerText;
if (txtValue.toUpperCase().indexOf(filter) > -1) {
  li[i].style.display = "";
} else {
  li[i].style.display = "none";
}
}
}
            
          </script>
@endsection