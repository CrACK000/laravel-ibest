@section('description_button')

    @mobile
        <div class="button_flat_group me-1" role="presentation">
            <button type="button" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" role="tab" class="btn btn-link p-3 px-4 rounded-3 button_flat link-secondary w-100">
                <div class="text-center">
                    <i class="fa-solid fs-4 fa-align-left"></i>
                </div>
                <span class="mini fw-medium opacity-75 lh-1">Popis</span>
            </button>
        </div>
    @elsemobile
        <div class="button_flat_group mb-1" role="presentation">
            <button type="button" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat text-start link-secondary w-100">
                <div class="d-inline-block text-center" style="width: 28px;">
                    <i class="fa-solid fa-align-left me-2"></i>
                </div>
                Popis
            </button>
        </div>
    @endmobile

@endsection

@section('description_table')
    {{ $productData->description }}
@endsection
