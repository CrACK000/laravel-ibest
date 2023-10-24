@php

    use App\Http\Controllers\ProductDetails;

@endphp

<div class="container-fluid col-md-10 mx-auto">
    <div class="row g-5 pb-5 mb-3">

        <div class="col-md-4">
            <div class="bg-body-secondary rounded-5 p-4 text-dark d-flex flex-column">

                <div class="fs-5 fw-medium mb-2">Šport</div>

                <div class="mb-3">
                    <img src="{{ url('/img/sport_banner.png') }}" alt="Šport" class="w-100 rounded-4">
                </div>

                <div class="position-relative">
                    <div class="row g-2 flex-wrap">

                        @foreach($first_box_categories as $category)

                            <div class="col-auto">
                                <a href="{{ route('searchResult', ['categories' => $category->id]) }}" class="d-flex align-items-center link-secondary text-decoration-none main_bg_mini_product rounded-3 px-2 py-1">
                                    <div class="me-2">
                                        <img src="https://admin.ibest.sk/assets/images/categories/{{ $category->img }}" class="remove-bg-img" style="max-height: 21px;" alt="{{ $category->title }}">
                                    </div>
                                    <div class="small">
                                        {{ $category->title }}
                                    </div>
                                </a>
                            </div>

                        @endforeach

                    </div>
                </div>

                <hr class="my-3 text-secondary">

                <div>
                    <div class="row gx-3">

                        @foreach($first_box_products as $product)

                            <div class="col-2">
                                <a href="{{ route('product', ['productId' => $product->id]) }}" class="d-flex main_bg_mini_product p-2 rounded-3">
                                    <div class="ratio ratio-1x1">
                                        <img src="{{ ProductDetails::main_img_product($product->id, '130x130') }}" class="object-fit-scale remove-bg-img" alt="{{ $product->title }}">
                                    </div>
                                </a>
                            </div>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
