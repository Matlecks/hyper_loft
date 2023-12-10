<ul>
    @foreach ($results as $result)
        <li><a href="{{ $result->url }}">{{ $result->search_key }}</a></li>
    @endforeach
</ul>
