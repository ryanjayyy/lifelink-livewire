<div wire:ignore.self class="modal fade" tabindex="-1" id="blood-bag-mark-unsafe-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mark as unsafe</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <h3>Select Reason</h3>

                <form wire:submit.prevent='markUnsafe' class="form">
                    <div class="my-4">
                        <label class="form-label">Reason</label>
                        <select wire:model='reason' class="form-select form-select-solid">
                            <option value="">Reason</option>
                            @foreach ($unsafeReasons as $unsafeReason)
                                <option value="{{ $unsafeReason->id }}">{{ $unsafeReason->reason }}</option>
                            @endforeach
                        </select>
                        @error('reason')
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-4">
                        <label class="form-label">Remarks(optional)</label>
                        <input wire:model='remarks' class="form-control form-control-solid">
                        @error('remarks')
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light-primary me-2"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Mark as unsafe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
