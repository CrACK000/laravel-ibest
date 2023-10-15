@php

    use App\Http\Controllers\ProductDetails;
    use App\Http\Controllers\ProductRating;

@endphp

<div class="row g-md-4 g-2 mb-4 align-items-end">

    @foreach($getProducts as $product)

        <div class="col-lg-3 col-6">
            <a href="{{ route('product', ['productId' => $product->id]) }}" class="text-decoration-none text-body">
                <div class="bg-white p-3 rounded-4 content-body item-box" style="margin-top: 75px">

                    @php($main_img = ProductDetails::main_img_product($product->id, '400x400'))

                    <div class="text-center">
                        <img src="{{ $main_img }}" class="mw-100 rounded-3" alt="{{ $product->title }}">
                    </div>

                    <div class="small mt-3 lh-sm">
                        {{ $product->title }}
                    </div>

                    <div class="d-flex mt-2 fw-semibold align-items-end">
                        <div class="text-primary small">
                            <i class="fas fa-star"></i> {{ ProductRating::percent_rate($product->id) }}%
                        </div>
                        @if($product->price > 0)
                            <div class="ms-auto">
                                {{ round($product->price) }} €
                            </div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

    @endforeach

</div>
