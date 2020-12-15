@section('styles')
    @parent
    <link href="{{ asset('css/style-default.css') }}" rel="stylesheet">
@endsection

<div class="default">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="header">
                    <div class="row align-items-center">
                        <div class="col-4">
                            logo
                        </div>
                        <div class="col-8">
                            text
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div class="row">
                    <div class="col-5">
                        <div class="photogalleries">
                            
                        </div>
                        <div class="videogalleries">
                            
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="news">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="user-pages">
                    <div class="user-pages-item-item">
                        Страница один
                    </div>
                    <div class="user-pages-item-item">
                        Страница два
                    </div>
                    <div class="user-pages-item-item">
                        Страница три
                    </div>
                    <div class="user-pages-item-item">
                        Страница четыре
                    </div>
                    <div class="user-pages-item-item">
                        Страница пять
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        var divs = $(".user-pages .user-pages-item-item");
            for(var i = 0; i < divs.length; i+=2) {
            divs.slice(i, i+2).wrapAll("<div class='user-pages-item'></div>");
        }
    </script>

    <script>
        $('.user-pages').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        });
    </script>
@endsection