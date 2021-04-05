@extends('layouts.app')
@section('content')

    <style>
        .pages-table {
            padding: 0;
            margin: 0;
            list-style-type: none;
            padding-left: 15px;
        }

        .pages-table .btn-sm {
            font-size: 0.600rem;
            padding: 0.15rem 0.4rem;
        }

        .pages-table li {
            font-weight: bold;
        }

        .pages-table-sub {
            padding: 0;
            margin: 0;
            list-style-type: none;
            padding-left: 15px;
        }

        .pages-table-sub li {
            font-weight: normal;
        }

        .pages-table-sub li:before {
            content: '↳';
        }
    </style>

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Страницы</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/pages/create" class="btn btn-primary">Создать страницу</a>
            </div>
        </div>

        <div class="page">
            <ul class="pages-table">
                @forelse($pages as $page)
                    @if(isset($page->parent_id))
                    
                    @else
                        <li class="mt-4">
                            {{$page->title}}
                            @if(!$page->children->count())
                                <a href="/pages/{{$page->id}}/edit" class="btn btn-sm btn-outline-primary">Правка</a>
                                <a href="/pages/delete/{{$page->id}}" class="btn btn-sm btn-outline-danger">Удалить</a>
                            @else
                                <a href="/pages/{{$page->id}}/edit" class="btn btn-sm btn-outline-primary">Правка</a>
                            @endif
                            <br>
                            @if(count($page->children))
                                @include('pages.sub ', ['children' => $page->children])
                            @endif
                        </li>
                    @endif
                @empty
                <li>
                    Пусто &#9785;
                </li>
                @endforelse
            </ul>

        </div>
    </div>
@endsection