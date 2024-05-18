<div wire:ignore.self class="modal fade" tabindex="-1" id="view-edit-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                {{-- account-info --}}

                <!--begin::Input group-->
                <div class="row g-3 mb-5">
                    <!--begin::Column for email-->
                    <div class="col-6">
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="form-label">Email</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input wire:model='email' type="email" class="form-control form-control-solid"
                                placeholder="Email" disabled>
                            @error('email')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Column for email-->

                    <!--begin::Column for mobile-->
                    <div class="col-6">
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="form-label">Mobile</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input wire:model='mobile' type="text" class="form-control form-control-solid"
                                placeholder="Mobile" value="" disabled />
                            @error('mobile')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Column for mobile-->
                </div>

                {{-- personal details --}}
                <div class="row g-3 mb-5">
                    <!--begin::Column for first name-->
                    <div class="col">
                        <label class="form-label">First name</label>
                        <input type="text" wire:model="first_name" class="form-control form-control-solid"
                            placeholder="First name" disabled />
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!--end::Column for first name-->

                    <!--begin::Column for middle name-->
                    <div class="col">
                        <label class="form-label">Middle name</label>
                        <input type="text" wire:model="middle_name" class="form-control form-control-solid"
                            placeholder="Middle name" disabled />
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            @error('middle_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!--end::Column for middle name-->

                    <!--begin::Column for last name-->
                    <div class="col">
                        <label class="form-label">Last name</label>
                        <input wire:model="last_name" type="text" class="form-control form-control-solid"
                            placeholder="Last name" disabled />
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!--end::Column for last name-->
                </div>

                <div class="row g-3 mb-5">
                    <!--begin::Column for Occupation-->
                    <div class="col">
                        <label class="form-label">Occupation</label>
                        <input wire:model="occupation" type="text" class="form-control form-control-solid"
                            placeholder="Occupation" disabled />
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            @error('occupation')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!--end::Column for Occupation-->

                    <!--begin::Column for Date of Birth-->
                    <div class="col">
                        <label class="form-label">Date of Birth</label>
                        <input wire:model="dob" type="date" class="form-control form-control-solid"
                            placeholder="Date of Birth" disabled />
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            @error('dob')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!--end::Column for Date of Birth-->
                </div>

                <div class="fv-row mb-5">
                    <!--begin::Row-->
                    <div class="row g-2">
                        <!--begin::Column for Sex-->
                        <div class="col">
                            <label class="form-label">Gender</label>

                            <select wire:model="sex" type="text" class="form-control form-control-solid"
                                placeholder="Sex" disabled>
                                <option value="">Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('sex')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column for Sex-->

                        <!--begin::Column for Blood Type-->
                        <div class="col">
                            <label class="form-label">Blood Type</label>

                            <select wire:model="blood_type" type="text" class="form-control form-control-solid"
                                placeholder="Blood Type" disabled>
                                <option value="">Blood Type</option>
                                <option value="1">A+</option>
                                <option value="2">B+</option>
                                <option value="3">AB+</option>
                                <option value="4">O+</option>
                                <option value="5">A-</option>
                                <option value="6">B-</option>
                                <option value="7">AB-</option>
                                <option value="8">O-</option>
                            </select>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('blood_type')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column for Blood Type-->
                    </div>
                    <!--end::Row-->
                </div>

                <div class="fv-row mb-5">
                    <!--begin::Row-->
                    <div class="row g-2">
                        <!--begin::Column for Region-->
                        <div class="col">
                            <label class="form-label">Region</label>
                            <select wire:model="region" wire:change="getProvinceList" type="text"
                                class="form-control form-control-solid" placeholder="Region" disabled>
                                <option value="">Select Region</option>
                                @foreach ($regionList as $region)
                                    <option value="{{ $region->regCode }}">{{ $region->regDesc }}</option>
                                @endforeach
                            </select>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('region')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column for Region-->

                        <!--begin::Column for Province-->
                        <div class="col">
                            <label class="form-label">province</label>
                            <select wire:model="province" wire:change="getMunicipalityList" type="text"
                                class="form-control form-control-solid" placeholder="Province" disabled>
                                <option value="">Select Province</option>
                                @foreach ($provinceList as $prov)
                                    <option value="{{ $prov->provCode }}" {{ $prov->provCode == $province ? 'selected' : '' }}>{{ $prov->provDesc }}</option>
                                @endforeach
                            </select>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('province')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column for Province-->
                    </div>
                    <!--end::Row-->
                </div>

                <div class="fv-row mb-5">
                    <!--begin::Row-->
                    <div class="row g-2">
                        <!--begin::Column for Municipality-->
                        <div class="col">
                            <label class="form-label">Municipality</label>
                            <select wire:model="municipality" wire:change="getBarangayList" type="text"
                                class="form-control form-control-solid" placeholder="Municipality" disabled>
                                <option value="">Select Municipality</option>
                                @foreach ($municipalityList as $munc)
                                        <option value="{{ $munc->citymunCode }}" {{ $munc->citymunCode == $municipality ? 'selected' : '' }}>
                                            {{ $munc->citymunDesc }}</option>
                                    @endforeach
                            </select>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('municipality')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column for Municipality-->

                        <!--begin::Column for Barangay-->
                        <div class="col">
                            <label class="form-label">Barangay</label>
                            <select wire:model="barangay" type="text" class="form-control form-control-solid"
                                placeholder="Barangay" disabled>
                                <option value="">Select Barangay</option>
                                @foreach ($barangayList as $brgy)
                                <option value="{{ $brgy->brgyCode }}" {{ $brgy->brgyCode == $barangay ? 'selected' : '' }}>{{ $brgy->brgyDesc }}</option>
                            @endforeach
                            </select>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('barangay')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column -->
                        <!--end::Column for Barangay-->
                    </div>
                    <!--end::Row-->
                </div>

                <div class="fv-row mb-5">
                    <!--begin::Row-->
                    <div class="row g-2">
                        <!--begin::Column for Street-->
                        <div class="col">
                            <label class="form-label">Street</label>
                            <input wire:model="street" type="text" class="form-control form-control-solid"
                            disabled />
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('street')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column for Street-->

                        <!--begin::Column for Zip code-->
                        <div class="col">
                            <label class="form-label">Zip code</label>
                            <input wire:model="zip_code" type="text" class="form-control form-control-solid"
                                disabled />
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('zip_code')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--end::Column for Zip code-->
                    </div>
                    <!--end::Row-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
