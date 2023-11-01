@php

    use App\Models\Catalog;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

@endphp

@section('main_categories')
    <div class="p-3 bg-body-secondary catalog_body rounded-4">

        <div class="pb-3">
            <div class="position-relative">
                <input type="search" class="bg-secondary form-control form-control-lg pe-5 rounded-3 border-0" style="--bs-bg-opacity: .125;" placeholder="Hľadať">
                <div class="position-absolute top-50 end-0 translate-middle-y me-3 lh-1">
                    <i class="fa-solid fa-magnifying-glass text-secondary opacity-50"></i>
                </div>
            </div>
        </div>

        <div style="height: 350px;">
            <div class="nav flex-column flex-nowrap overflow-y-auto mh-100 catalog_scroll pe-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                @foreach(Catalog::categories_list() as $category)

                    @php($counter = Str::replace(',', ' ', number_format(DB::table('offers')->where('category_id', 'LIKE', '%"'.$category->id.'"%')->count())))

                    <li @class([
                                            'nav-item w-100',
                                            'mb-2' => !$loop->last
                                        ])>

                        <button class="nav-link link-secondary bg-catalog-pill p-3 rounded-3 w-100" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <div class="d-flex align-items-center">

                                <img src="https://admin.ibest.sk/assets/images/categories/{{ $category->img }}" alt="{{ $category->title }}" class='me-2 remove-bg-img' style='max-height: 32px;'>

                                <span class="lh-sm">
                                                    {{ $category->title }}
                                                </span>

                                <span class="ms-auto fw-normal">
                                                    {{ $counter }}
                                                </span>

                            </div>
                        </button>

                    </li>

                @endforeach

            </div>
        </div>

    </div>
@endsection

<style>
    .btn-modal-close {
        transition: background-color 400ms;
    }
    .btn-modal-close:hover {
        background-color: rgba(var(--bs-secondary-color-rgb), .1);
    }
</style>

<div class="modal bg-body fade mw-100" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="d-flex align-items-center h-100">
                <div>
                    ads
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn-close btn-modal-close link-secondary p-3 rounded-4" data-bs-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div>
</div>
