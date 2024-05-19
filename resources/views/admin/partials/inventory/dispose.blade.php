<div wire:ignore.self class="modal fade" tabindex="-1" id="disposed-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dispose Blood Bag</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <p class="mb-0 fs-5 text-gray-600  mb-7">
                    The 'Dispose' option signifies that the blood bag is no longer
                    usable and should be disposed of. This action is irreversible.
                </p>

                <p class="fs-6 text-gray-700 mb-7">Are you sure you want to dispose this blood bag?</p>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-light-primary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="dispose">Dispose</button>
                </div>
            </div>
        </div>
    </div>
</div>
