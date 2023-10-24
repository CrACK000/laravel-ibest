@php

    use Illuminate\Support\Facades\DB;

@endphp

<div class="mb-3">
    <div class="row g-md-2 g-1">

        @if($getCategory)

            @foreach($eachCategories as $category)

                @php($counter = DB::table('offers')->where('category_id', 'LIKE', '%"'.$category->id.'"%')->count())

                <div class="col-lg-3 col-6">
                    <a href="{{ route('searchResult', ['categories' => $category->id]) }}" class="link-body-emphasis text-decoration-none pill-categories">
                        <div class="bg-body p-2 rounded-3 d-flex align-items-center pill">
                            <img
                                src="https://admin.ibest.sk/assets/images/categories/{{ $category->img }}"
                                class="me-2 rounded"
                                style="width: 30px;height: 30px;"
                                alt="{{ $category->title }}">

                            <div class="lh-1 small">
                                {{ $category->title }}
                                <span class="fw-normal small">({{ $counter }})</span>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach

            @if($countCategories > 11)

                <div class="col-lg-3 col-6">
                    <a href="#" class="link-secondary text-decoration-none">
                        <div class="text-center d-flex justify-content-center align-items-center small h-100 py-2 bg-body-secondary bg-opacity-25 rounded">
                            <i class="fas fa-plus me-3"></i>
                            Zobraziť všetky
                        </div>
                    </a>
                </div>

            @endif
        @endif

        @if($countCategories < 10 or $getSearchMain)

            <!-- @todo dokončiť button "Potrebujete podradiť ?" -->

            <div class="col-lg-3 col-6">
                <a href="#" class="link-body-emphasis text-decoration-none pill-categories">
                    <div class="bg-body p-2 rounded-3 d-flex align-items-center pill d-flex align-items-center small">
                        <i class="fa-regular fa-circle-question fs-4 mx-2 my-1 opacity-75"></i>
                        <div class="ms-1">
                            Potrebujete poradiť ?
                        </div>
                    </div>
                </a>
            </div>

        @endif

    </div>
</div>
