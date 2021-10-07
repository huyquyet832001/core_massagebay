@extends("index")
@section('content')
    @if (isset($paginate) && !empty($paginate->getTotal()) > 0)
        @foreach ($paginate->getItems() as $k => $item)
            <p>
                {(item.name)}
            </p>
            <p>
                {(item.slug)}
            </p>
            <p>
                {(item.act)}
            </p>
        @endforeach
        {%PAGINATION%}
    @else

    @endif
@stop
