<div class="modal bg-body fade" id="open-search">
    <div class="modal-dialog modal-lg">

        <div class="modal-content bg-transparent border-0">
            <div class="mt-3">
                <div class="text-center text-muted mb-3 position-relative">
                    <label for="search_main">Vyhľadávanie</label>
                    <div class="position-absolute top-50 end-0 me-3 translate-middle-y">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                </div>
                <form class="position-relative mb-0" role="search" method="get" id="form-search" action="{{ route('filter') }}">

                    <input type="search" class="form-control form-control-lg bg-body-secondary border-0 rounded-4 py-3 ps-4 pe-5" name="search_main" id="search_main" placeholder="hľadať produkt" value="">

                    <div class="position-absolute top-50 end-0 translate-middle-y me-2">
                        <button type="submit" class="btn btn-link btn-lg link-secondary">
                            <i class="fa-solid fa-magnifying-glass fs-5"></i>
                        </button>
                    </div>

                </form>
            </div>

            <div id="ajaxSearchResults"></div>

        </div>

    </div>
</div>

<script type="module">
    $("#search_main").on("keyup", function() {

        const value = $(this).val();

        $.ajax({
            type : 'get',
            url : '{{ route('ajaxSearchProducts') }}',
            data:{
                'value': value
            },
            success:function(data){

                $('#ajaxSearchResults').html(data);

            }
        })
    })
</script>
