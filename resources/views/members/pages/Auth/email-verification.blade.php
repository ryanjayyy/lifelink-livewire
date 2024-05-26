@section('title')
    {{ 'Email Verification' }}
@endsection

<!--begin::Root-->
<div class="d-flex flex-column flex-root bg-gray-300" id="kt_app_root">
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center text-center p-10">
            <!--begin::Wrapper-->
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">

                    <!--begin::Logo-->
                    <div class="mb-14">
                        <a href="/metronic8/demo51/index.html" class="">
                            <img alt="Logo" src="{{ asset('assets/media/logos/Lifelink-logo.png') }}" class="h-40px">
                        </a>
                    </div>
                    <!--end::Logo-->

                    <!--begin::Title-->
                    <h1 class="fw-bolder text-gray-900 mb-5">
                        Verify your email
                    </h1>
                    <!--end::Title-->

                    <!--begin::Link-->
                    <div class="mb-11">
                        <button wire:click='resend' id="resendButton" class="resendButton btn btn-sm btn-primary">Resend Email Verification</button>
                        <span id="countdown" style="display: none;"></span>
                    </div>
                    <!--end::Link-->

                    <!--begin::Illustration-->
                    <div class="mb-0">
                        <img src="{{ asset('assets/media/auth/verify-email.png') }}"
                            class="mw-100 mh-300px theme-light-show" alt="">
                    </div>
                    <!--end::Illustration-->

                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>

</div>
<!--end::Root-->

@section('page-scripts')
    <script>
        let countdownElement = document.getElementById('countdown');
        let resendButton = document.getElementById('resendButton');
        let count = 30;
        let timer;

        function startCountdown() {
            resendButton.disabled = true;
            countdownElement.style.display = 'inline';
            timer = setInterval(function() {
                count--;
                if (count <= 0) {
                    clearInterval(timer);
                    resendButton.disabled = false;
                    resendButton.innerText = 'Resend Email Verification';
                    countdownElement.style.display = 'none';
                } else {
                    resendButton.innerText = 'Resend Email Verification in ' + count;
                }
            }, 1000);
        }

        resendButton.addEventListener('click', function() {
            count = 30;
            clearInterval(timer);
            startCountdown();
        });
        startCountdown();
    </script>
@endsection
