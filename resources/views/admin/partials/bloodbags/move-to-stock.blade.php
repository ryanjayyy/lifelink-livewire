<div wire:ignore.self class="modal fade" tabindex="-1" id="blood-bag-move-to-stock-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Move to Stock</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <p class="mb-0 fs-5 text-gray-600">
                    The 'Move to Stock' option signifies that the blood bag, having
                    successfully completed the testing phase, is ready for storage. When
                    this action is done, the blood bag will be transferred to the
                    inventory module, specifically under the 'Stocks' tab.
                </p>
                <p class="fs-6 text-gray-700 mb-7">
                    Are you sure you want to move this blood bag to stock?
                </p>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-light-primary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="moveToStock">Move to stock</button>
                </div>
            </div>
        </div>
    </div>
</div>
