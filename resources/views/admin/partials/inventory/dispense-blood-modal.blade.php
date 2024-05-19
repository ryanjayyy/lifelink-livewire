<div wire:ignore.self class="modal fade" tabindex="-1" id="dispense-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dispense Blood</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <form wire:submit='dispense'>
                    @csrf
                    <div class="row gy-5 g-xl-10">
                        <div class="col-xl-4">
                            @include('admin.partials.inventory.bag-details')
                        </div>
                        <div class="col-xl-8">
                            @include('admin.partials.inventory.dispense-form')
                        </div>
                    </div>

                    <div class="d-flex justify-content-end my-4">
                        <button type="button" class="btn btn-light-primary me-2"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Dispense</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
