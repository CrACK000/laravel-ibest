<div class="container-fluid col-md-8 mb-5 py-5">

    <div class="d-flex flex-md-row flex-column justify-content-center align-items-start mb-5 pt-5">

        <div class="col-md-5 me-0 me-md-5">
            <div class="d-flex flex-column text-center text-md-end mt-md-3">
                <div class="fs-3 lh-1 fw-semibold">Najviac navštevované kategórie</div>
                <div class="small text-muted mt-4">
                    Kategórie v ktorých ľudia najviac vyhľadávajú svoje obľúbené produkty.
                </div>
            </div>
        </div>

        <div class="col-md-7 mt-5 mt-md-0">
            <div class="row g-md-3 g-2 flex-wrap">

                @foreach ($most_cats as $category)

                    <div class="col-auto">
                        <a class="text-decoration-none bg-body-secondary d-flex align-items-center link-secondary shadow-hover px-3 py-2 rounded-4" href='{{ route('searchResult', ['categories' => $category->id]) }}'>
                            <img src='https://admin.ibest.sk/assets/images/categories/{{ $category->img }}' alt='{{ $category->title }}' class='me-2 remove-bg-img' style="max-height: 24px;">
                            {{ $category->title }}
                        </a>
                    </div>

                @endforeach

            </div>
        </div>

    </div>

</div>
