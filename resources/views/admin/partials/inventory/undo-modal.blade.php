<div wire:ignore.self class="modal fade" tabindex="-1" id="undo-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Undo(Move to Collected)</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 my-4">
                    <!--begin::Icon-->
                    <i class="ki-outline ki-information fs-2tx text-warning me-4"></i> <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 ">
                        <!--begin::Content-->
                        <div class=" fw-semibold">
                            <h4 class="text-gray-900 fw-bold">Note</h4>
                            <div class="fs-6 text-gray-700 ">This blood bag will no longer be move after <a
                                    class="fw-bold" href="#">{{ $dueDate }}</a> .</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                @if ($isDeletable)
                    <p class="mb-0 fs-5 text-gray-600 mb-7">
                        Please be aware that this option has a time limit. Once the time has elapsed, you won't be able
                        to
                        reverse this action.
                    </p>
                    <p class="fs-6 text-gray-700 mb-7">
                        Are you sure you want to proceed?
                    </p>
                @else
                    <p class="mb-0 fs-5 text-gray-600 mb-7">
                        This action has expired.
                    </p>
                @endif

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-light-primary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="moveBacktoCollected"
                        {{ $isDeletable ? '' : 'disabled' }}>{{ $isDeletable ? 'Undo' : 'Time expired' }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
