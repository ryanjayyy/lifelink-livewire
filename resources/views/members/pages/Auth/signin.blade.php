@section('title')
    {{ 'Sign in' }}
@endsection

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid" style="background-image: url('assets/media/public/general_bg.png'); background-size: cover; background-position: center">
        <div class="position-absolute top-0 start-0 p-3">
            <a href="" class="btn btn-dark btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>    
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1" style="background: linear-gradient(180deg, rgba(0,0,0,0.1966911764705882) 43%, rgba(0,0,0,0.2) 93%);">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="card w-lg-400px p-10 shadow">
                    <!--begin::Form-->
                    <form wire:submit.prevent="login" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
                        novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/metronic8/demo51/index.html"
                        action="#">
                        <!--begin::Heading-->
                        <div class="text-start mb-11">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 fw-bolder mb-3">
                                Sign In
                            </h1>
                            <!--end::Title-->

                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">
                                Enter your Log In details.
                            </div>
                            <!--end::Subtitle--->
                        </div>
                        <!--begin::Heading-->

                        @error('login-status')
                        <div class="alert alert-danger border-0 d-flex align-items-center justify-content-center">
                            <div class="d-flex flex-column">
                                <span>{{ $message }}</span>
                            </div>
                        </div>
                        @enderror
                        <!--begin::Input group--->
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <!--begin::Email-->
                            <input wire:model='email' type="text" placeholder="Email" name="email"
                                autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                            @error('email')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!--end::Input group--->
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <!--begin::Password-->
                            <input wire:model='password' type="password" placeholder="Password" name="password"
                                autocomplete="off" class="form-control bg-transparent">
                            <!--end::Password-->
                            @error('password')
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group--->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>

                            <!--begin::Link-->
                            <a href="/metronic8/demo51/authentication/layouts/corporate/reset-password.html"
                                class="link-dark">
                                Forgot Password ?
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-dark">

                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    Sign In</span>
                                <!--end::Indicator label-->

                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress--> </button>
                        </div>
                        <!--end::Submit button-->

                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            Not Registered yet?

                            <a href="{{ route('members.signup-1') }}"
                                class="link-dark">
                                Sign up
                            </a>
                        </div>
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
