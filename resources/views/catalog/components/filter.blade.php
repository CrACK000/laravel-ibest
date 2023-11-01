<form method="get" id="filter_form_panel" class="mb-0 w-100" action="{{ route('filter') }}">

    <!-- @todo spraviť filter na parametre -->

    @if(!$getSearchMain)

        <div class="mb-4">
            <div class="mb-1">

                <span class="small text-muted">Vyhľadávanie</span>

                @if($getSearchFilter)
                    <a href="{{ route('filter', ['clear' => 'search_filter']) }}" class="fw-medium mini text-decoration-none">
                        <i class="mx-1 fas fa-chevron-left"></i>
                        vyčistiť
                    </a>
                @endif

            </div>
            <div class="position-relative">
                <div>
                    <label for="search_filter" class="d-none">Hľadať</label>
                    <input type="search"
                           class="bg-body-secondary border-0 rounded-4 form-control form-control-lg pe-5"
                           id="search_filter"
                           name="search_filter"
                           value="{{ $getSearchFilter }}"
                           placeholder="Hľadať">
                </div>
                <div class="position-absolute top-50 end-0 translate-middle-y">
                    <button type="submit" class="btn btn-link link-secondary px-3 opacity-50">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </div>

    @endif

    @if($eachBrands->count())
        <div class="mb-4">
            <div class="mb-1">

                <span class="small text-muted">Značky</span>

                @if($getBrands)
                    <a href="{{ route('filter', ['clear' => 'brand']) }}" class="fw-medium mini text-decoration-none">
                        <i class="mx-1 fas fa-chevron-left"></i>
                        vyčistiť
                    </a>
                @endif

            </div>
            <div class="bg-body-secondary px-3 rounded-4">
                <div class="overflow-auto shadow_scroll py-3" style="max-height: 210px;">
                    @foreach($eachBrands as $data)

                        @php($checked_brand = in_array($data->brand, $getBrands) ? "checked" : "")

                        <div @class([
                                'd-flex',
                                'mb-1' => !$loop->last
                            ])>
                            <input class='form-check-input me-2 checkedList' type='checkbox' name='brand[]' value='{{ $data->brand }}' id='{{ $data->brand }}' {{ $checked_brand }}>
                            <label class='w-100 link-secondary' for='{{ $data->brand }}' style='cursor: pointer;'>{{ $data->brand }}</label>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="mb-4">
        <div class="mb-1">

            <span class="small text-muted">Cena</span>

            @if($getPriceMin || $getPriceMax)
                <a href="{{ route('filter', ['clear' => 'price']) }}" class="fw-medium mini text-decoration-none">
                    <i class="mx-1 fas fa-chevron-left"></i>
                    vyčistiť
                </a>
            @endif

        </div>
        <div class="hstack">

            <label for="priceMin" class="d-none"></label>
            <input type="number" class="form-control bg-body-secondary border-0 rounded-3" id="priceMin" name="price_min" value="{{ $getPriceMin }}" placeholder="Od">

            <div class="vr mx-3 my-2 opacity-25"></div>

            <label for="priceMax" class="d-none"></label>
            <input type="number" class="form-control bg-body-secondary border-0 rounded-3" id="priceMax" name="price_max" value="{{ $getPriceMax }}" placeholder="Do">

        </div>
    </div>

    <div class="mb-4">
        <div class="mb-1">

            <span class="small text-muted">Hodnotenie</span>

            @if($getStars)
                <a href="{{ route('filter', ['clear' => 'stars']) }}" class="fw-medium mini text-decoration-none">
                    <i class="mx-1 fas fa-chevron-left"></i>
                    vyčistiť
                </a>
            @endif

        </div>
        <div>
            <ul class="list-unstyled mb-0">
                <li class="bg-body-secondary px-2 py-1 rounded-3 mb-1">
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='4' id='star_4' hidden>
                        <label class="{{ $getStars == 4 ? 'link-primary fw-semibold' : 'link-secondary' }} w-100" for='star_4' style='cursor: pointer;'>
                            @for($i = 1; $i <= 4; $i++)
                                <i class="fa-{{ $getStars == 4 ? 'solid' : 'regular' }} fa-star"></i>
                            @endfor
                            <span class="float-end small">
                                a viac
                            </span>
                        </label>
                    </div>
                </li>
                <li class="bg-body-secondary px-2 py-1 rounded-3 mb-1">
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='3' id='star_3' hidden>
                        <label class="{{ $getStars == 3 ? 'link-primary fw-semibold' : 'link-secondary' }} w-100" for='star_3' style='cursor: pointer;'>
                            @for($i = 1; $i <= 3; $i++)
                                <i class="fa-{{ $getStars == 3 ? 'solid' : 'regular' }} fa-star"></i>
                            @endfor
                            <span class="float-end small">
                                a viac
                            </span>
                        </label>
                    </div>
                </li>
                <li class="bg-body-secondary px-2 py-1 rounded-3 mb-1">
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='2' id='star_2' hidden>
                        <label class="{{ $getStars == 2 ? 'link-primary fw-semibold' : 'link-secondary' }} w-100" for='star_2' style='cursor: pointer;'>
                            @for($i = 1; $i <= 2; $i++)
                                <i class="fa-{{ $getStars == 2 ? 'solid' : 'regular' }} fa-star"></i>
                            @endfor
                            <span class="float-end small">
                                a viac
                            </span>
                        </label>
                    </div>
                </li>
                <li class="bg-body-secondary px-2 py-1 rounded-3 mb-1">
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='1' id='star_1' hidden>
                        <label class="{{ $getStars == 1 ? 'link-primary fw-semibold' : 'link-secondary' }} w-100" for='star_1' style='cursor: pointer;'>
                            @for($i = 1; $i <= 1; $i++)
                                <i class="fa-{{ $getStars == 1 ? 'solid' : 'regular' }} fa-star"></i>
                            @endfor
                            <span class="float-end small">
                                a viac
                            </span>
                        </label>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary w-100 rounded-pill fw-medium">
            Filtrovať
        </button>
    </div>
</form>
