@php

    use App\Http\Controllers\ProductDetails;
    use App\Http\Controllers\ProductRating;
    use Illuminate\Support\Str;

@endphp

<div class="row g-md-5 g-2 align-items-stretch mb-5">

    @forelse($getProducts as $product)

        <div class="col-lg-3 col-6">
            <a href="{{ route('product', ['productId' => $product->id]) }}" class="text-decoration-none text-body">
                <div class="bg-white p-3 rounded-4 item-box shadow-hover d-flex flex-column h-100 position-relative">

                    <div class="text-center py-2 mb-3">
                        <img src="{{ ProductDetails::main_img_product($product->id, '400x400') }}"
                             class="mw-100 rounded-3" alt="{{ $product->title }}">
                    </div>

                    <div class="small mb-2 lh-sm">
                        {{ $product->title }}
                    </div>

                    <div class="mini mb-3 lh-sm text-muted fw-normal">
                        {{ Str::limit($product->brief_description, 140) }}
                    </div>

                    <div class="d-flex mt-auto fw-semibold align-items-end">
                        <div class="text-primary small">
                            <i class="fas fa-star"></i> {{ ProductRating::percent_rate($product->id) }}%
                        </div>
                        @if($product->price > 0)
                            <div class="ms-auto fs-5">
                                {{ round($product->price) }} €
                            </div>
                        @endif
                    </div>

                    <div class="position-absolute top-0 end-0">
                        <button type="button" id="productFavoriteAdd"
                                class="btn btn-link p-3 lh-1 link-secondary text-decoration-none"
                                data-productId="{{ $product->id }}" data-bs-toggle="tooltip"
                                data-bs-title="Default tooltip">
                            <i class="favoriteIcon fa-regular fa-heart fs-4"></i>
                        </button>
                    </div>

                </div>
            </a>
        </div>

    @empty

        <div class="bg-body-secondary w-100 p-4 rounded-5">
            @include('catalog.components.empty_result')
        </div>

    @endforelse

</div>
