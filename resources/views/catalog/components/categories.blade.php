@php

    use Illuminate\Support\Facades\DB;

@endphp

<div class="row g-md-3 g-2">

    @if($getCategory)

        @foreach($eachCategories as $category)

            @php($counter = DB::table('offers')->where('category_id', 'LIKE', '%"'.$category->id.'"%')->count())

            <div class="col-lg-3">
                <a href="{{ route('searchResult', ['categories' => $category->id]) }}" class="link-secondary text-decoration-none pill-categories">
                    <div class="bg-white p-2 p-md-3 rounded-4 d-flex align-items-center shadow-hover small">
                        <img
                            src="https://admin.ibest.sk/assets/images/categories/{{ $category->img }}"
                            class="me-2 rounded remove-bg-img"
                            style="width: 30px;height: 30px;"
                            alt="{{ $category->title }}">

                        <div @class([ 'lh-1', 'small' => MobileDetect::isMobile() ])>
                            {{ $category->title }}
                            <span class="fw-normal small">({{ $counter }})</span>
                        </div>
                    </div>
                </a>
            </div>

        @endforeach

        @if($countCategories > 11)

            <!-- @todo dokončiť button "Zobraziť viac" -->

            <div class="col-lg-3">
                <a href="#" class="link-secondary text-decoration-none small">
                    <div @class([ 'bg-white bg-opacity-75 p-2 p-md-3 rounded-4 d-flex align-items-center shadow-hover h-100', 'small' => MobileDetect::isMobile() ])>
                    <span class="fa-stack me-2 opacity-75" style="vertical-align: top;">
                        <i class="fa-regular fa-circle fa-stack-2x"></i>
                        <i class="fa-solid fa-plus fa-stack-1x"></i>
                    </span>
                        Zobraziť všetky
                    </div>
                </a>
            </div>

        @endif
    @endif

    @if($countCategories < 10 or $getSearchMain)

        <!-- @todo dokončiť button "Potrebujete podradiť ?" -->

        <div class="col-lg-3">
            <a href="#" class="link-secondary text-decoration-none small">
                <div @class([ 'bg-white bg-opacity-75 p-2 p-md-3 rounded-4 d-flex align-items-center shadow-hover h-100', 'small' => MobileDetect::isMobile() ])>
                    <i class="fa-regular fa-circle-question fs-4 me-2 opacity-75"></i>
                    Potrebujete poradiť ?
                </div>
            </a>
        </div>

    @endif

</div>
