@extends('layouts.app')
@section('content')

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

            <table class="table table-bordered table-hover">
                @forelse($pages as $page)
                    @if(isset($page->parent_id))

                    @else
                        <tr>
                            <td style="width: 100px; font-size: 13px;">
                                {{$page->created_at->format('d.m.Y')}}
                            </td>
                            <td style="width: 135px;">
                                <img src="{{$page->image}}" style="height: 60px; max-width: 130px;">
                            </td>
                            <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                                {{$page->title}}
                                <br>
                                    @foreach($page->children as $pg)
                                        <li>
                                            {{ $pg->title }}
                                        </li>
                                    @endforeach
                            </td>
                            <td style="width: 200px;">
                                <a href="/pages/{{$page->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                                <a href="/pages/delete/{{$page->id}}" class="btn btn-sm btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endif
                @empty
                <tr>
                    <td style="text-align: center;">
                        Пусто &#9785;
                    </td>
                </tr>
                @endforelse
            </table>





            <table class="table table-bordered table-hover" style="display:none;">
                @forelse($pages as $page)
                <tr>
                    <td style="width: 100px; font-size: 13px;">
                        {{$page->created_at->format('d.m.Y')}}
                    </td>
                    <td style="width: 135px;">
                        <img src="{{$page->image}}" style="height: 60px; max-width: 130px;">
                    </td>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$page->title}}
                    </td>
                    <!--<td>
                        {{$page->text}}
                    </td>
                    <td>
                        @if(is_array($page->gallery))
                            @foreach($page->gallery as $k=>$v)
                                <img src="{{$v}}" style="height: 80px">
                            @endforeach
                        @endif
                    </td>-->
                    <td style="width: 200px;">
                        <a href="/pages/{{$page->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/pages/delete/{{$page->id}}" class="btn btn-sm btn-danger">Удалить</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td style="text-align: center;">
                        Пусто &#9785;
                    </td>
                </tr>
                @endforelse
            </table>

        </div>
    </div>
@endsection