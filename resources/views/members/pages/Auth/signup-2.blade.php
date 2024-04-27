@section('title')
    {{ 'Sign up' }}
@endsection

<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid bg-gray-200">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-1500px p-10">
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 fw-bolder mb-3">
                            Sign Up
                        </h1>
                        <!--end::Title-->

                        <!--begin::Subtitle-->
                        <div class="text-gray-500 fw-semibold fs-6">
                            LifeLink
                        </div>
                        <!--end::Subtitle--->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills">

                        @include('members.includes.signup.stepper-nav')

                        <!--begin::Form-->
                        <form wire:submit.prevent="registerStepTwo">
                            <!--begin::Group-->
                            <div class="mb-5">
                                @include('members.partials.signup.step2')
                            </div>
                            <!--end::Group-->

                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="me-2">
                                    <a href="{{ route('members.signup-1')  }}" class="btn btn-light btn-active-light-primary">
                                        Back
                                    </a>
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Wrapper-->
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Continue
                                    </button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Body-->
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
            style="background-image: url({{ asset('assets/media/misc/auth-bg-1.jpg') }})">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <!--begin::Logo-->
                <a href="../../demo36/dist/index.html" class="mb-0 mb-lg-12">
                    <img alt="Logo" src="{{ asset('assets/media/logos/Lifelink-logo.png') }}"
                        class="h-60px h-lg-75px" />
                </a>
                <!--end::Logo-->
                <!--begin::Image-->
                <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                    src="{{ asset('assets/media/misc/auth-screens.png') }}" alt="" />
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Donate Blood, Save Lives
                </h1>
                <!--end::Title-->
                <!--begin::Text-->
                <!--begin::Text-->
                <div class="d-none d-lg-block text-white fs-base text-center">Blood donation is a voluntary act of
                    donating blood or plasma to someone in need. It is a common need
                    <br />for many medical treatments and emergencies.
                </div>
                <!--end::Text-->

                <!--end::Text-->

            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->

@section('page-scripts')
@endsection
