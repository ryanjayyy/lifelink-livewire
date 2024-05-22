<div class="card card-flush h-xl-100">
    <!--begin::Card header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-900">Dispense Form</span>
            <span class="text-gray-500 mt-1 fw-semibold fs-6">This form is for patient who receives blood</span>
        </h3>
        <!--end::Title-->

    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body">


        <!--begin::Search User-->

        <div class="card-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model="searchUserName" wire:input="searchInput"
                    placeholder="Search name">
                <button class="input-group-text btn btn-primary" wire:click="clearSearch">
                    <i class="bi bi-x fs-4"></i>
                </button>
            </div>
            <div class="list-group overflow-y-auto" style="height: 70px;">
                @if (!$userList)
                    <p class="text-muted text-center">No users found</p>
                @else
                    @foreach ($userList as $user)
                        <a wire:click="selectUser('{{ $user->user_id }}')"
                            class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $user->first_name }} {{ $user->middle_name }}
                                    {{ $user->last_name }}</h5>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>




        <div class="row g-3 mb-5">
            <!--begin::Column for first name-->
            <div class="col">
                <label class="form-label">First name</label>
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
                <label class="form-label">Middle name</label>
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
                <label class="form-label">Last name</label>
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

        <div class="row g-3 mb-5">
            <!--begin::Column for Date of Birth-->
            <div class="col">
                <label class="form-label">Date of Birth</label>
                <input wire:model="dob" type="date" class="form-control form-control-solid"
                    placeholder="Date of Birth" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('dob')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Date of Birth-->

            <!--begin::Column for Sex-->
            <div class="col">
                <label class="form-label">Gender</label>

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
                <label class="form-label">Blood Type</label>

                <select wire:model="blood_type" type="text" class="form-control form-control-solid"
                    placeholder="Blood Type">
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
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('blood_type')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Blood Type-->
        </div>

        <hr>

        <div class="row g-3 mb-5">
            <!--begin::Column for Diagnosis-->
            <div class="col">
                <label class="form-label">Diagnosis for Transfusion</label>
                <input type="text" wire:model="diagnosis" class="form-control form-control-solid"
                    placeholder="Diagnosis" />
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('diagnosis')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Diagnosis-->

            <!--begin::Column for Hospital-->
            <div class="col">
                <label class="form-label">Hospital</label>

                <select wire:model="hospital" type="text" class="form-control form-control-solid"
                    placeholder="Hospital">
                    <option value="">Select Hospital</option>
                    @foreach ($hospitalList as $hospital)
                        <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                    @endforeach
                </select>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    @error('hospital')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!--end::Column for Hospital-->

        </div>
    </div>
    <!--end::Card body-->
</div>
