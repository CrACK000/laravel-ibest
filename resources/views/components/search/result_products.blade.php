@php

    use App\Http\Controllers\ProductDetails;

@endphp

<div class='small text-muted'>
    Produkty
    <div class='float-end'>{{ $countProducts }} výsledkov</div>
</div>

@foreach ($products as $product)

    <div class='bg-secondary bg-opacity-10 mt-2 py-2 px-3 rounded-4'>
        <a href='{{ route('product', ['productId' => $product->id]) }}' class='text-decoration-none text-body my-auto'>
            <div class='row g-3 align-items-center'>
                <div class='col-md-1 col-2 text-center'>
                    <div class="ratio ratio-1x1">
                        <img src='{{ ProductDetails::main_img_product($product->id, '130x130') }}' alt='{{ $product->title }}' class="object-fit-scale remove-bg-img">
                    </div>
                    </div>
                <div class='col'>
                    <div @class([
                                'text-wrap',
                                'lh-1',
                                'small' => MobileDetect::isMobile()
                            ])>
                        {{ $product->title }}
                    </div>
                </div>
                <div class='col-3 text-end'>

                    @if($product->price > 0)
                        <span class="fs-5">
                            {{ round($product->price) }} €
                        </span>
                    @endif

                    <div class='mini fw-normal text-end d-none d-md-block text-muted'>
                        dostupne v <span class='fw-semibold'>{{ $product->available_shops }}</span> obchodoch
                    </div>

                </div>
            </div>
        </a>
    </div>

@endforeach
