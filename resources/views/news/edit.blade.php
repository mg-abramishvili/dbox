@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$news->title}}</h1>
                <p style="color: #999">Редактирование новости</p>
            </div>
        </div>

        <form action="/news/{{$news->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$news->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Заголовок
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="title" value="{{$news->title}}">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Текст
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" name="text">{{$news->text}}</textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Картинка
                </dt>
                <dd class="col-sm-9">
                    <input class="image" type="file" name="image" x-ref="image">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Галлерея
                </dt>
                <dd class="col-sm-9">
                    <input class="gallery" type="file" name="gallery[]" multiple>
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
                    request.open('POST', '/news/file/upload');
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
                    source: '{{ $news->image }}',
                    options: {
                        type: 'local',
                    }
                }
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
                    request.open('POST', '/news/file/upload');
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
              @if(isset($news->gallery))
              @foreach($news->gallery as $image)
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
               url:'/news/file/'+methos,
                method:'POST'
            });
        }
    </script>

@endsection