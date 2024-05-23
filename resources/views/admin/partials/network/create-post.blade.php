<div wire:ignore.self class="modal fade" tabindex="-1" id="kt_modal_scrollable_2">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Post</h5>
                <!--begin::Close-->
                <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </button>
                <!--end::Close-->
            </div>

            <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                <!--begin::Search Input-->
                <div class="input-group my-3">
                    <input type="number" class="form-control" wire:model="searchRequestNumber"
                        wire:input="requestNoInput" placeholder="Search by request number">
                </div>
                <!--end::Search Input-->

                <!--begin::Request List-->
                <div class="list-group overflow-y-auto" style="height: 50px;">
                    @if ($requestNumberList->isEmpty())
                        <p class="text-muted text-center">No serial numbers found</p>
                    @else
                        @foreach ($requestNumberList as $requestNumber)
                            <a wire:click="findRequest('{{ $requestNumber->request_no }}')"
                                class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $requestNumber->request_no }}</h5>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
                <!--end::Request List-->
            </div>

            <form wire:submit.prevent='createPost'>
                @csrf
                <div class="px-5 pb-15">
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Blood Request Number</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <span class="form-control form-control-lg form-control-solid">
                                {{ $bloodRequestNumber }}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Venue</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <select wire:model='venue' class="form-select form-select-solid form-select-lg">
                                <option value="">Select Venue</option>
                                @foreach ($venueList as $venue)
                                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                @endforeach
                            </select>
                            @error('venue')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Donation Date and time</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="datetime-local" wire:model='schedule'
                                class="form-control form-control-lg form-control-solid">
                            @error('schedule')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Message</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <textarea wire:model='message' class="form-control form-control-lg form-control-solid"></textarea>
                            @error('message')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" {{ $bloodRequestNumber ? '' : 'disabled' }}>post</button>
                </div>
            </form>

        </div>

    </div>
</div>
