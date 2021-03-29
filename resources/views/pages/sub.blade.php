<ul>
@foreach($children as $pg)
    <li class="mt-4">
        {{ $pg->title }}
        <a href="/pages/{{$pg->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
        <a href="/pages/delete/{{$pg->id}}" class="btn btn-sm btn-danger">Удалить</a>
        @if(count($pg->children))
            @include('pages.sub ',['children' => $pg->children])
        @endif
    </li>
@endforeach
</ul>