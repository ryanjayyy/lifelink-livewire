<div wire:ignore.self class="modal fade" tabindex="-1" id="blood-bag-laboratory-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mark as Refer to Laboratory</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <p class="mb-0 fs-5 text-gray-600">
                    The 'Refer to Laboratory' option indicates that this blood bag has been sent to the laboratory for the testing phase.
                    Please be aware that this action is irreversible.
                </p>
                <p class="fs-6 text-gray-700 mb-7">
                    Are you sure you want to mark this as referred blood bag to laboratory?
                </p>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-light-primary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="referToLaboratory">Refer to Laboratory</button>
                </div>
            </div>
        </div>
    </div>
</div>
