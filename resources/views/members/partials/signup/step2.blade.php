<!--begin::Step 2-->
<div class="flex-column">

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Row-->
        <div class="row g-3">
            <!--begin::Column for first name-->
            <div class="col">
                <input type="text" wire:model="first_name" class="form-control form-control-solid"
                    placeholder="First name" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('first_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for first name-->

            <!--begin::Column for middle name-->
            <div class="col">
                <input type="text" wire:model="middle_name" class="form-control form-control-solid"
                    placeholder="Middle name" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('middle_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for middle name-->

            <!--begin::Column for last name-->
            <div class="col">
                <input wire:model="last_name" type="text" class="form-control form-control-solid"
                    placeholder="Last name" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for last name-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Input group-->


    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Row-->
        <div class="row g-2">
            <!--begin::Column for Occupation-->
            <div class="col">
                <input wire:model="occupation" type="text" class="form-control form-control-solid"
                    placeholder="Occupation" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('occupation')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Occupation-->

            <!--begin::Column for Date of Birth-->
            <div class="col">
                <input wire:model="dob" type="date" class="form-control form-control-solid"
                    placeholder="Date of Birth" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('dob')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Date of Birth-->
        </div>
        <!--end::Row-->

    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Row-->
        <div class="row g-2">
            <!--begin::Column for Sex-->
            <div class="col">
                <select wire:model="sex" type="text" class="form-control form-control-solid" placeholder="Sex">
                    <option value="">Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('sex')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Sex-->

            <!--begin::Column for Blood Type-->
            <div class="col">
                <select wire:model="blood_type" type="text" class="form-control form-control-solid"
                    placeholder="Blood Type">
                    <option value="">Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                </select>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('blood_type')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Blood Type-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Row-->
        <div class="row g-2">
            <!--begin::Column for Region-->
            <div class="col">
                <select wire:model="region" wire:change="getProvinceList" type="text" class="form-control form-control-solid" placeholder="Region">
                    <option value="">Select Region</option>
                    @foreach ($regionList as $region)
                        <option value="{{ $region->regCode }}">{{ $region->regDesc }}</option>
                    @endforeach
                </select>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('region')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Region-->

            <!--begin::Column for Province-->
            <div class="col">
                <select wire:model="province" wire:change="getMunicipalityList" type="text" class="form-control form-control-solid"
                    placeholder="Province" >
                    <option value="">Select Province</option>
                    @foreach ($provinceList as $province)
                        <option value="{{ $province->provCode }}">{{ $province->provDesc }}</option>
                    @endforeach
                </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        @error('province')
                            {{ $message }}
                        @enderror
                    </div>
            </div>
            <!--end::Column for Province-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Row-->
        <div class="row g-2">
            <!--begin::Column for Municipality-->
            <div class="col">
                <select wire:model="municipality" wire:change="getBarangayList" type="text" class="form-control form-control-solid"
                    placeholder="Municipality">
                    <option value="">Select Municipality</option>
                    @foreach ($municipalityList as $municipality)
                        <option value="{{ $municipality->citymunCode }}">{{ $municipality->citymunDesc }}</option>
                    @endforeach
                </select>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('municipality')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Municipality-->

            <!--begin::Column for Barangay-->
            <div class="col">
                <select wire:model="barangay" type="text" class="form-control form-control-solid"
                    placeholder="Barangay">
                    <option value="">Select Barangay</option>
                    @foreach ($barangayList as $barangay)
                        <option value="{{ $barangay->brgyCode }}">{{ $barangay->brgyDesc }}</option>
                    @endforeach
                </select>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('barangay')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Barangay-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Row-->
        <div class="row g-2">
            <!--begin::Column for Street-->
            <div class="col">
                <input wire:model="street" type="text" class="form-control form-control-solid"
                    placeholder="Street" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('street')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Street-->

            <!--begin::Column for Zip code-->
            <div class="col">
                <input wire:model="zip_code" type="text" class="form-control form-control-solid"
                    placeholder="Zip code" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('zip_code')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Zip code-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Input group-->

</div>
<!--begin::Step 2-->
