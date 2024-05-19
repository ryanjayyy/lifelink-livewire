<div wire:ignore.self class="modal fade" tabindex="-1" id="blood-bag-edit-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Blood Bag</h5>

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
                            <div class="fs-6 text-gray-700 ">This blood bag will no longer be editable after <a
                                    class="fw-bold" href="#">{{ $dueDate }}</a> .</div>
                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Wrapper-->
                </div>

                <form wire:submit.prevent='saveBloodBag' class="form">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="fv-row">
                                @error('serialNumber')
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="form-label">Blood Bag ID (XXXX-XXXXX-X)</label>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="fv-row">
                                            <input wire:model='serialOne' type="number"
                                                class="form-control form-control-solid" placeholder="XXXX"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="4"
                                                {{ !$isEditable ? 'disabled' : '' }}
                                                />
                                            @error('serialOne')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fv-row">
                                            <input wire:model='serialTwo' type="number"
                                                class="form-control form-control-solid" placeholder="XXXXXX"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="6"
                                                {{ !$isEditable ? 'disabled' : '' }}
                                                />
                                            @error('serialTwo')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="fv-row">
                                            <input wire:model='serialThree' type="number"
                                                class="form-control form-control-solid" placeholder="X"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="1"
                                                {{ !$isEditable ? 'disabled' : '' }}
                                                />
                                            @error('serialThree')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label class="form-label">Bled By</label>
                                    <select wire:model='bledBy' class="form-select form-select-solid"
                                        {{ !$isEditable ? 'disabled' : '' }}>
                                        <option value="">Bled By</option>
                                        @foreach ($bledByList as $bledby)
                                            <option value="{{ $bledby->id }}">{{ $bledby->first_name }}
                                                {{ $bledby->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('bledBy')
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label class="form-label">Venue</label>
                                    <select wire:model='venue' class="form-select form-select-solid"
                                        {{ !$isEditable ? 'disabled' : '' }}>
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
                                    <label class="form-label">Date Donated</label>
                                    <input wire:model='dateDonated' type="date" max="{{ date('Y-m-d') }}"
                                        class="form-control form-control-solid"
                                        {{ !$isEditable ? 'disabled' : '' }}
                                        />
                                    @error('dateDonated')
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="my-4">
                                    <label class="form-label">Donation Type</label>
                                    <select wire:model='donationType' class="form-select form-select-solid"
                                        {{ !$isEditable ? 'disabled' : '' }}>
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
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" {{ !$isEditable ? 'disabled' : '' }}>
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
