<div class='mb-3'>
    <div class='small text-muted'>
        Kategórie
    </div>
    <div class='d-flex flex-wrap mt-2'>

        @foreach ($categories as $category)

            <a href='{{ route('searchResult', ['categories' => $category->id]) }}' class='text-decoration-none bg-secondary bg-opacity-10 rounded d-flex align-items-center py-1 px-2 link-body-emphasis small me-2 mb-2'>
                <img src='https://admin.ibest.sk/assets/images/categories/{{ $category->img }}' alt='{{ $category->title }}' class='me-2 remove-bg-img' style='max-height: 24px;'>
                {{ $category->title }}
            </a>

        @endforeach

    </div>
</div>
