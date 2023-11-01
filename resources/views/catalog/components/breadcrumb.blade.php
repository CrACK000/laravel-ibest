<nav class="mt-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">

        <li class="breadcrumb-item">
            <a href="{{ url('/') }}" class="text-decoration-none">
                <i class="fa-solid fa-house"></i>
            </a>
        </li>

        @foreach($breadcrumb as $id => $title)

            <li class="breadcrumb-item">
                <a href="{{ route('searchResult', ['categories' => $id]) }}" class="text-decoration-none fw-medium">
                    {{ $title }}
                </a>
            </li>

        @endforeach

        @if($getSearchMain or $getSearchFilter)
            <li class="breadcrumb-item active text-decoration-none fw-medium">
                <span class="small">
                    Hľadá sa:
                </span>
                <strong>{!! $getSearchMain.$getSearchFilter !!}</strong>
            </li>
        @endif
    </ol>
</nav>
