@php

    use App\Models\Catalog;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

@endphp

<div class="modal bg-body fade mw-100" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen p-5">
        <div class="modal-content">
            <div class="bg-body-secondary bg-opacity-50 h-100 p-5 rounded-5 position-relative">
                <div class="row g-5">

                    <div class="col-3">

                        <div class="d-block mb-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="me-3">
                                    <img src="{{ asset('icon_black.svg') }}" alt="iBest.sk" height="32">
                                </div>
                                <span class="fs-5 fw-semibold">Hlavné kategórie</span>
                            </div>
                        </div>

                        <div class="p-3 pe-2 bg-body-secondary catalog_body rounded-4">

                            <div class="pb-3">
                                <div class="position-relative">
                                    <input type="search" class="bg-secondary form-control form-control-lg pe-5 rounded-3 border-0" style="--bs-bg-opacity: .125;" placeholder="Hľadať">
                                    <div class="position-absolute top-50 end-0 translate-middle-y me-3 lh-1">
                                        <i class="fa-solid fa-magnifying-glass text-secondary opacity-50"></i>
                                    </div>
                                </div>
                            </div>

                            <div style="height: 550px;">
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

                    </div>

                    <div class="col-9">
                        <div class="d-flex mb-5">
                            <div class="fs-4 fw-medium">
                                Elektronika
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="position-relative">
                                    <input type="search" class="bg-body-secondary form-control form-control-lg rounded-4 py-3 ps-4 pe-5 border-0" placeholder="Hľadať">
                                    <div class="position-absolute top-50 end-0 translate-middle-y me-3 lh-1">
                                        <i class="fa-solid fa-magnifying-glass text-secondary fs-5 opacity-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="bg-body-secondary p-3 rounded-4 d-flex align-items-center">
                                    <img src="https://admin.ibest.sk/assets/images/categories/iNZt22syeNEt2Er.png" alt="title" class="me-3 remove-bg-img" style="max-height: 56px;">
                                    <a href="#" class="fs-5 fw-medium link-secondary text-decoration-none">
                                        Mobily
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="position-absolute top-0 end-0 m-3">
                    <button type="button" class="btn-close p-3 link-secondary" data-bs-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div>
</div>
