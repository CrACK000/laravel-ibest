@section('sales_button')

    @mobile
        <div class="button_flat_group me-1" role="presentation">
            <button type="button" id="vouchers-tab" data-bs-toggle="tab" data-bs-target="#vouchers-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat link-secondary w-100">
                <div class="text-center">
                    <i class="fa-solid fs-4 fa-percent"></i>
                </div>
                <span class="mini fw-medium opacity-75 lh-1 text-nowrap">Zľavové kódy</span>
            </button>
        </div>
    @elsemobile
        <div class="button_flat_group mb-1" role="presentation">
            <button type="button" id="vouchers-tab" data-bs-toggle="tab" data-bs-target="#vouchers-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat text-start link-secondary w-100">
                <div class="d-inline-block text-center" style="width: 28px;">
                    <i class="fa-solid fa-percent me-2"></i>
                </div>
                Zľavové kódy
            </button>
        </div>
    @endmobile

@endsection

@section('sales_table')
    zlavy
@endsection
