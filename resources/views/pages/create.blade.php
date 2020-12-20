@extends('layouts.app')
@section('content')

    <style>
        .radio {
            background: grey;
            margin-bottom: 20px;
        }

        input[type="radio"] {
            border: 2px solid red;
        }

        input[type="radio"]:checked+label {
            border: 4px solid #3171B8;
        } 

        .radio label {
            width: 100%;
            height: 70px;
            position: relative;
        }

        .radio img {
            width: auto;
            height: auto;
            max-width: 70%;
            max-height: 70%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Создание страницы</h1>
            </div>
        </div>

        <form action="/pages" method="post" enctype="multipart/form-data">@csrf
            
            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Тип страницы
                </dt>
                <dd class="col-sm-9">
                    <select name="page_type" id="page_type" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5 type-6 type-7 type-8">
                <dt class="col-sm-3">
                    Заголовок
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5 type-6 type-7 type-8">
                <dt class="col-sm-3">
                    Значок
                </dt>
                <dd class="col-sm-9">
                    <div class="row" style="height:250px; overflow-y:scroll;">
                        @foreach($icons as $icon)
                        <div class="col-2">
                            <div class="radio">
                                <input name="icons" id="{{ $icon->id }}" type="radio" value="{{ $icon->id }}">
                                <label for="{{ $icon->id }}">
                                    <img src="{{ $icon->icon }}" style="width:100%">
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5">
                <dt class="col-sm-3">
                    Текст
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" name="text">.</textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5 type-6 type-7 type-8">
                <dt class="col-sm-3">
                    Картинка
                </dt>
                <dd class="col-sm-9">
                    <input class="image" type="file" name="image" x-ref="image">
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-3 type-4 type-8">
                <dt class="col-sm-3">
                    Галерея
                </dt>
                <dd class="col-sm-9">
                    <input class="gallery" type="file" name="gallery[]" multiple>
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-7">
                <dt class="col-sm-3">
                    PDF
                </dt>
                <dd class="col-sm-9">
                    <input class="pdf" type="file" name="pdf" x-ref="pdf">
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Родительская страница
                </dt>
                <dd class="col-sm-9">

                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="" selected="selected">Выберите</option>
                        @foreach($parentlist as $parentlistitem)
                        <option value="{{$parentlistitem->id}}">{{$parentlistitem->title}}</option>
                        @endforeach
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2" style="display:none;">
                <dt class="col-sm-3">
                    Цвет значка
                </dt>
                <dd class="col-sm-9">
                    <input type="color" class="form-control" id="exampleFormControlInput1" name="image_color">
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>

        </form>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        $('.image').filepond({
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
                    return  ajax_delete('deleteimage');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/pages/file/upload');
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
        });
        $('.pdf').filepond({
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
                    return  ajax_delete('deletepdf');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/pages/file/upload');
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
        });
        $('.gallery').filepond({
            allowMultiple: true,
            allowReorder: true,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deleteimage');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/pages/file/upload');
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
        });

        function ajax_delete(methos){
            $.ajax({
                url:'/pages/file/'+methos,
                method:'POST'
            });
        }
    </script>

<script>
        $('#page_type').change(function () {
        var select=$(this).find(':selected').val();        
        $(".type").hide();
        $('.' + 'type-' + select).show();

        }).change();
    </script>

<script>
      $('#text').summernote({
        height: 300,
        toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['height', ['height']]
  ]
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
	$("input[type='color']").form_color();
});
    </script>

@endsection