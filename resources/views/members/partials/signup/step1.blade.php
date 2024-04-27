<!--begin::Step 1-->
<div class="flex-column current" data-kt-stepper-element="content">
    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="form-label">Email</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input wire:model='email' type="email" class="form-control form-control-solid" placeholder="Email"
          >
        @error('email')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <!--end::Input-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="form-label">Mobile</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input wire:model='mobile' type="text" class="form-control form-control-solid" placeholder="Mobile"
            value="" />
        @error('mobile')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <!--end::Input-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="form-label">Password</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input wire:model='password' type="password" class="form-control form-control-solid" placeholder="Password"
            value="" />
        @error('password')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <!--end::Input-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="form-label">Confirm Password</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input wire:model='password_confirmation' type="password" class="form-control form-control-solid"
            placeholder="Confirm Password" value="" name="password_confirmation"/>
        @error('password_confirmation')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <!--end::Input-->
    </div>
    <!--end::Input group-->
</div>
<!--begin::Step 1-->
