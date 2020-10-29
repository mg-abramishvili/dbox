@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$page->title}}</h1>
                <p style="color: #999">Редактирование страницы</p>
            </div>
        </div>

        <form action="/pages/{{$page->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$page->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Тип страницы
                </dt>
                <dd class="col-sm-9">

                    <select name="page_type" id="page_type" class="form-control">
                        <option value="{{$page->page_type}}">{{$page->page_type}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>

                    <script>
                        var optionValues =[];
                        $('#page_type option').each(function(){
                        if($.inArray(this.value, optionValues) >-1){
                            $(this).remove()
                        }else{
                            optionValues.push(this.value);
                        }
                        });
                    </script>
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5 type-6">    
                <dt class="col-sm-3">
                    Заголовок
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="title" value="{{$page->title}}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5 ">
                <dt class="col-sm-3">
                    Текст
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text" name="text">{{$page->text}}</textarea>
                    @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5 type-6">
                <dt class="col-sm-3">
                    Картинка
                </dt>
                <dd class="col-sm-9">
                    <input class="image" type="file" name="image" x-ref="image">
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-1 type-2 type-3 type-4 type-5">    
                <dt class="col-sm-3">
                    Цвет значка
                </dt>
                <dd class="col-sm-9">
                    <input type="color" class="form-control" id="exampleFormControlInput1"  name="image_color" value="{{$page->image_color}}">
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-3 type-4">
                <dt class="col-sm-3">
                    Галерея
                </dt>
                <dd class="col-sm-9">
                    <input class="gallery" type="file" name="gallery[]" multiple>
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-5">
                <dt class="col-sm-3">
                    Видео
                </dt>
                <dd class="col-sm-9">
                    <input class="video" type="file" name="video" x-ref="video">
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Родительская страница
                </dt>
                <dd class="col-sm-9">

                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="{{$page->parent_id}}">{{$page->parent_id}}</option>
                        @foreach($parentlist as $parentlistitem)
                        <option value="{{$parentlistitem->id}}">{{$parentlistitem->title}}</option>
                        @endforeach
                    </select>

                    <script>
                        var optionValues =[];
                        $('#page_type option').each(function(){
                        if($.inArray(this.value, optionValues) >-1){
                            $(this).remove()
                        }else{
                            optionValues.push(this.value);
                        }
                        });
                    </script>
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

            files: [
                {
                    source: '{{ $page->image }}',
                    options: {
                        type: 'local',
                    }
                }
            ]

        });

        $('.video').filepond({
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
                    return  ajax_delete('deletevideo');
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

            files: [
                @if(isset($page->video))
                {
                    source: '{{ $page->video }}',
                    options: {
                        type: 'local',
                    }
                }
                @endif
            ]

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

            files: [
            @if(isset($page->gallery))
              @foreach($page->gallery as $image)
                {
                    source: '{{ $image }}',
                    options: {
                        type: 'local',
                    }
                },
            @endforeach
            @endif
            ]

        });


        function ajax_delete(methos){
            $.ajax({
               url:'/pages/file/'+methos,
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
	$("input[type='color']").form_color();
});
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

@endsection