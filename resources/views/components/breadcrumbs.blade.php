<nav>
    <ul class="uk-breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        @foreach (request()->breadcrumbs()->segments() as $segment)
            @if ($loop->last)
                <li>
                    <span>{{ $segment->name() }}</span>
                </li>
                @else
                <li><a href="{{ $segment->url() }}">{{ $segment->name() }}</a></li>
            @endif



        @endforeach
    </ul>
</nav>
