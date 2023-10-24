@php

    use App\Http\Controllers\ProductDetails;
    use App\Http\Controllers\ProductRating;

@endphp

<div class="container-fluid col-md-10 mb-5 pt-5">

    <div class="d-flex align-items-center mb-4">
        <i class="fa-regular fa-heart fs-2 text-danger"></i>
        <div class="ms-3">
            <span class="d-block fs-4 text-danger">Moje obľúbené</span>
            <span class="d-block small text-muted">Naposledy pridané produkty do obľúbených</span>
        </div>
    </div>
    <div class="row g-2 g-md-5 align-items-stretch mb-5 pb-5 pt-4">
        @foreach($user_favorite_products as $product)

            @php($main_img_src = ProductDetails::main_img_product($product->id, '130x130'))

            <div class="col-lg-3">
                <div class="bg-body-secondary shadow-hover rounded-4 p-3">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="{{ route('product', ['productId' => $product->id]) }}" class="text-decoration-none">
                                <div class="ratio ratio-1x1">
                                    <img src="{{ $main_img_src }}" class="mw-100 mh-100 remove-bg-img object-fit-scale" alt="{{ $product->title }}">
                                </div>
                            </a>
                        </div>
                        <div class="col-8 d-flex flex-column">
                            <div class="lh-sm">
                                <a href="{{ route('product', ['productId' => $product->id]) }}" class="link-secondary text-decoration-none">
                                    {{ $product->title }}
                                </a>
                            </div>
                            <div class="mt-auto text-end">
                                @if($product->price > 0)
                                    <div class="d-inline-flex align-items-center bg-success rounded-2 px-2 py-1 bg-opacity-25 fw-semibold text-success">
                                        <i class="fa-regular fa-credit-card small"></i>
                                        <div class="vr mx-1 text-success"></div>
                                        <span>{{ round($product->price) }} €</span>
                                    </div>
                                @endif
                                <div class="d-inline-flex align-items-center bg-primary rounded-2 px-2 py-1 bg-opacity-25 fw-semibold text-primary">
                                    <i class="fa-solid fa-star small"></i>
                                    <div class="vr mx-1 text-primary"></div>
                                    <span>{{ ProductRating::percent_rate($product->id) }}</span>
                                </div>
                                <a href="#" class="d-inline-flex align-items-center bg-secondary rounded-2 px-2 py-2 bg-opacity-25 fw-semibold text-secondary text-decoration-none">
                                    <i class="fa-solid fa-cog small"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
