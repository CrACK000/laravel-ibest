@php

    use App\Http\Controllers\ProductDetails;
    use App\Http\Controllers\ProductRating;
    use Illuminate\Support\Str;

@endphp

<div class="row gy-1">

    @foreach($getProducts as $product)

        @php($main_img = ProductDetails::main_img_product($product->id, '400x400'))

        <div class="col-12">
            <div class="bg-white p-3 rounded-4 list-box">
                <div class="row gx-4">
                    <div class="col-2 text-center">
                        <a href="{{ route('product', ['productId' => $product->id]) }}">
                            <div class="ratio ratio-1x1">
                                <img src="{{ $main_img }}" class="rounded-3 object-fit-scale" alt="{{ $product->title }}">
                            </div>
                        </a>
                    </div>

                    <div class="col-8">
                        <div class="d-flex flex-column">

                            <div class="lh-sm mt-2">
                                <a href="{{ route('product', ['productId' => $product->id]) }}" class="link-body-emphasis link-underline-opacity-0 link-underline-opacity-25-hover">
                                    {{ $product->title }}
                                </a>
                            </div>

                            <div class="d-flex align-items-center small">
                                <div class="small text-primary fw-semibold">
                                    <i class="fas fa-star"></i> {{ ProductRating::percent_rate($product->id) }}%
                                </div>
                                <div class="vr mx-3 my-2"></div>
                                <div>
                                    <span class="text-muted small">Značka:</span> {{ $product->brand }}
                                </div>
                            </div>

                            <div class="small text-muted fw-normal">
                                {{ Str::limit($product->brief_description, 255) }}
                            </div>

                        </div>
                    </div>

                    <div class="col-2 d-flex flex-column">

                        <div class="mb-auto text-end">
                            <button type="button" class="btn btn-link btn-lg link-danger text-decoration-none">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>

                        @if($product->price > 0)

                            <div class='fs-4 mt-auto text-center'>
                                {{ round($product->price) }} €
                            </div>
                            <div class='small text-muted text-center'>
                                Dostupné v {{ $product->available_shops }} obchodoch
                            </div>
                            <a href='{{ route('product', ['productId' => $product->id]) }}' class='btn btn-primary rounded-3 px-3 w-100 mt-1'>
                                Kúpiť v obchode
                            </a>

                        @else

                            <a href='{{ route('product', ['productId' => $product->id]) }}' class='mt-auto btn btn-primary rounded-3 px-3 w-100 mt-1'>
                                Zobraziť viac
                            </a>

                        @endif

                    </div>
                </div>
            </div>
        </div>

    @endforeach

</div>
