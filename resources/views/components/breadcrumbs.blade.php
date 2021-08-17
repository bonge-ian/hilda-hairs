<nav>
    <ul class="uk-breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        @foreach (request()->breadcrumbs()->segments() as $segment)
            <li><a href="{{ $segment->url() }}">{{ $segment->name() }}</a></li>
        @endforeach
    </ul>
</nav>
