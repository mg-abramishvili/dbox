@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Настройки</h1>
            </div>
        </div>

        <form action="/settings/{{$settings->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$settings->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Тема
                </dt>
                <dd class="col-sm-9">
                    <select name="theme" id="theme" class="form-control">
                        <option value="{{$settings->theme}}">{{$settings->theme}}</option>
                        <option value="detsad">Детский сад</option>
                        <option value="kadet">Суворов</option>
                    </select>

                    <script>
                        var optionValues =[];
                        $('#theme option').each(function(){
                        if($.inArray(this.value, optionValues) >-1){
                            $(this).remove()
                        }else{
                            optionValues.push(this.value);
                        }
                        });
                    </script>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Ориентация экрана
                </dt>
                <dd class="col-sm-9">
                    <select class="form-control">
                        <option value="">Горизонтальная</option>
                        <option value="">Вертикальная</option>
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Логотип
                </dt>
                <dd class="col-sm-9">

                <input class="logo" type="file" name="logo" x-ref="logo">

                </dd>

            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Заголовок
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title" value="{{$settings->title}}">
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5">    
                <dt class="col-sm-3">
                    Цвет заголовка
                </dt>
                <dd class="col-sm-9">
                    <input type="color" class="form-control" name="titlecolor" value="{{$settings->titlecolor}}">
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Фон
                </dt>
                <dd class="col-sm-9">

                <input class="background" type="file" name="background" x-ref="background">

                </dd>

            </div>

            <div class="row align-items-center mb-4">    
                <dt class="col-sm-3">
                    Размытие фона
                </dt>
                <dd class="col-sm-9">

                @if ($settings->blur == 0)
                <div class="form-check">
                    <input type="hidden" name="blur" value="0">
                    <input type="checkbox" name="blur" value="1" id="status" class="form-check-input">
                </div>
                @else
                <div class="form-check">
                    <input type="hidden" name="blur" value="0">
                    <input type="checkbox" name="blur" value="1" id="status" class="form-check-input" checked>
                </div>
                @endif

                </dd>

            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5">    
                <dt class="col-sm-3">
                    Цвет кнопки "Галерея"
                </dt>
                <dd class="col-sm-9">
                    <input type="color" class="form-control" name="galcolor" value="{{$settings->galcolor}}">
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5">    
                <dt class="col-sm-3">
                    Цвет кнопки "Новости"
                </dt>
                <dd class="col-sm-9">
                    <input type="color" class="form-control" name="newscolor" value="{{$settings->newscolor}}">
                </dd>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
                </div>
            </div>
            
        </form>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        $('.background').filepond({
            allowMultiple: false,
            allowReorder: false,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deletebackground');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/settings/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },

            files: [
                {
                    source: '{{ $settings->background }}',
                    options: {
                        type: 'local',
                    }
                }
            ]

        });

        $('.logo').filepond({
            allowMultiple: false,
            allowReorder: false,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deletelogo');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/settings/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },

            files: [
                {
                    source: '{{ $settings->logo }}',
                    options: {
                        type: 'local',
                    }
                }
            ]

        });


        function ajax_delete(methos){
            $.ajax({
               url:'/settings/file/'+methos,
                method:'POST'
            });
        }
    </script>

<script>
        ;(function($){
	$.fn.form_color = function(options){
		this.each(function(){
			$(this).on("change", function(){
				this.title = this.value;
				this.dataset.value = this.value;
			}).trigger("change");
		});
		return this;
	};
})(jQuery);

$(function(){
	$("input[name='titlecolor']").form_color();
});
    </script>

<script>
        ;(function($){
	$.fn.form_color = function(options){
		this.each(function(){
			$(this).on("change", function(){
				this.title = this.value;
				this.dataset.value = this.value;
			}).trigger("change");
		});
		return this;
	};
})(jQuery);

$(function(){
	$("input[name='galcolor']").form_color();
});
    </script>

<script>
        ;(function($){
	$.fn.form_color = function(options){
		this.each(function(){
			$(this).on("change", function(){
				this.title = this.value;
				this.dataset.value = this.value;
			}).trigger("change");
		});
		return this;
	};
})(jQuery);

$(function(){
	$("input[name='newscolor']").form_color();
});
    </script>

@endsection