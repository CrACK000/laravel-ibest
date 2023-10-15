
<a data-bs-toggle="collapse" href="#filter" class="btn btn-light bg-body-secondary link-secondary border-0 w-100 d-md-none d-block">
    Zobraziť filter
</a>

<div class="collapse d-md-block sticky-md-top filter-panel" id="filter">
    <div class="bg-body p-3 rounded-3 content-body mt-2 mt-md-0">
        <form method="get" id="filter_form_panel" class="mb-0" action="search/filter/">

            <ul class="list-unstyled mb-0">

                <li class="fw-medium mb-1">Vyhľadať</li>

                @if($getSearchFilter)

                    <li>
                        <a href="{{ route('filter', ['clear' => 'search_filter']) }}" class="fw-medium small text-decoration-none">
                            <i class="fas fa-chevron-left mini"></i>
                            vyčistiť
                        </a>
                    </li>

                @endif

                <li>
                    <div class="hstack position-relative w-100">
                        <div>
                            <label for="search_filter" class="d-none">Hľadať</label>
                            <input type="search"
                                   class="form-control pe-4"
                                   id="search_filter"
                                   name="search_filter"
                                   value="{{ $getSearchFilter }}"
                                   placeholder="Hľadať">
                        </div>
                        <div class="position-absolute top-50 end-0 translate-middle-y">
                            <button type="submit" class="btn btn-link px-2">
                                <i class="fas fa-chevron-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </li>

                <li class="border-bottom my-3"></li>
                <li class="fw-medium mb-1">Značka</li>

                @if($getBrands)

                    <li>
                        <a href="{{ route('filter', ['clear' => 'brand']) }}" class="fw-medium small text-decoration-none">
                            <i class="fas fa-chevron-left mini"></i>
                            vyčistiť
                        </a>
                    </li>

                @endif

                <div class="overflow-auto" style="max-height: 200px;">

                    @foreach($eachBrands as $data)

                        @php($checked_brand = in_array($data->brand, $getBrands) ? "checked" : "")

                        <li>
                            <div class='d-flex rounded px-1'>
                                <input  class='form-check-input me-1 checkedlist'
                                        type='checkbox'
                                        name='brand[]'
                                        value='{{ $data->brand }}'
                                        id='{{ $data->brand }}'
                                    {{ $checked_brand }}>

                                <label class='w-100 link-body-emphasis' for='{{ $data->brand }}' style='cursor: pointer;'>
                                    {{ $data->brand }}
                                </label>
                            </div>
                        </li>

                    @endforeach

                </div>

                <li class="border-bottom my-3"></li>
                <li class="fw-medium mb-1">Cena</li>

                @if($getPriceMin || $getPriceMax)
                    <li>
                        <a href="{{ route('filter', ['clear' => 'price']) }}" class="fw-medium small text-decoration-none">
                            <i class="fas fa-chevron-left mini"></i>
                            vyčistiť
                        </a>
                    </li>
                @endif

                <li>
                    <div class="hstack my-1 px-1">

                        <label for="priceMin" class="d-none"></label>
                        <input type="number" class="form-control form-control-sm" id="priceMin" name="price_min" value="{{ $getPriceMin }}" placeholder="Od">

                        <div class="vr mx-2 my-2"></div>

                        <label for="priceMax" class="d-none"></label>
                        <input type="number" class="form-control form-control-sm" id="priceMax" name="price_max" value="{{ $getPriceMax }}" placeholder="Do">

                        <button type="submit" class="btn btn-sm btn-link">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </li>

                <li class="border-bottom my-3"></li>
                <li class="fw-medium mb-1">Hodnotenie</li>

                @if($getStars)
                    <li>
                        <a href="{{ route('filter', ['clear' => 'stars']) }}" class="fw-medium small text-decoration-none">
                            <i class="fas fa-chevron-left mini"></i>
                            vyčistiť
                        </a>
                    </li>
                @endif

                <li>
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='4' id='star_4' hidden>
                        <label class='w-100 link-primary {{ ($getStars == 4) ? 'fw-bold' : '' }}' for='star_4' style='cursor: pointer;'>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> a viac
                        </label>
                    </div>
                </li>
                <li>
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='3' id='star_3' hidden>
                        <label class='w-100 link-primary {{ ($getStars == 3) ? 'fw-bold' : '' }}' for='star_3' style='cursor: pointer;'>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> a viac
                        </label>
                    </div>
                </li>
                <li>
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='2' id='star_2' hidden>
                        <label class='w-100 link-primary {{ ($getStars == 2) ? 'fw-bold' : '' }}' for='star_2' style='cursor: pointer;'>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i> a viac
                        </label>
                    </div>
                </li>
                <li>
                    <div class='d-flex rounded px-1'>
                        <input class='form-check-input me-1' type='radio' name='stars' value='1' id='star_1' hidden>
                        <label class='w-100 link-primary {{ ($getStars == 1) ? 'fw-bold' : '' }}' for='star_1' style='cursor: pointer;'>
                            <i class="fas fa-star"></i> a viac
                        </label>
                    </div>
                </li>

                <!-- @todo spraviť filter na parametre -->

                <li class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Filtrovať
                    </button>
                </li>

            </ul>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("form")
            .on('change', 'input:checkbox, input:radio, select', function() {
                this.form.submit()
            })

        $(".checkedlist:checked").attr("checked", function() {
            $(this).parent().addClass(function() {
                return this.checked ? "bg-body-tertiary" : "";
            })
            $(this).parent().parent().parent().parent().addClass(function() {
                return this.checked ? "show" : "";
            })
        })

    })
</script>
