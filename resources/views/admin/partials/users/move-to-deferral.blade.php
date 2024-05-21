<div wire:ignore.self class="modal fade" tabindex="-1" id="move-to-deferral">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Move to deferral {{ $fullName }}</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form wire:submit.prevent='addToDeferralList' class="form">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="fv-row">
                                <div class="my-4">
                                    <label class="form-label">Venue</label>
                                    <select wire:model='venue' class="form-select form-select-solid">
                                        <option value="">Venue</option>
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
                                <div class="my-4">
                                    <label class="form-label">Date</label>
                                    <input wire:model='dateDeferred' type="date" max="{{ date('Y-m-d') }}"
                                        class="form-control form-control-solid" />
                                    @error('dateDeferred')
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label class="form-label">Deferral Type</label>
                                    <select wire:model='deferralType' wire:change="getCategoryList" class="form-select form-select-solid">
                                        <option value="">Select Deferral Type</option>
                                        @foreach ($deferralTypeList as $deferralType)
                                            <option value="{{ $deferralType->id }}">{{ $deferralType->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('deferralType')
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label class="form-label">Category</label>
                                    <select wire:model='deferralCategory' wire:change='inputOtherReason' class="form-select form-select-solid">
                                        <option value="">Select Category</option>
                                        @foreach ($deferralCategoryList as $deferralCategory )
                                            <option value="{{ $deferralCategory->id }}">{{ $deferralCategory->category }}</option>
                                        @endforeach
                                    </select>
                                    @error('deferralCategory')
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                @if($isOtherReason)
                                    <div class="my-4">
                                        <label class="form-label">Reason</label>
                                        <input wire:model='otherReason' type="text" class="form-control form-control-solid" />
                                        @error('otherReason')
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endif

                                <div class="my-4">
                                    <label class="form-label">Donation Type</label>
                                    <select wire:model='donationType' class="form-select form-select-solid">
                                        <option value="">Donation Type</option>
                                        @foreach ($donationTypeList as $donationType)
                                            <option value="{{ $donationType->id }}">{{ $donationType->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('donationType')
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                @if ($isDuration)
                                    <div class="my-4">
                                        <label class="form-label">Duration Days</label>
                                        <div class="input-group">
                                            <button w class="btn btn-outline-secondary" type="button" id="button-addon1" wire:click="decrementDuration">
                                                <i class="bi bi-dash-circle"></i>
                                            </button>
                                            <input wire:model='duration' type="number" class="form-control" aria-label="Duration" aria-describedby="button-addon1" maxlength="3" max="999" oninput="this.value = this.value.slice(0, 3) || ''">
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" wire:click="incrementDuration">
                                                <i class="bi bi-plus-circle"></i>
                                            </button>
                                        </div>
                                        @error('duration')
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="move-to-deferral" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
