@section('title')
    {{ 'Email Verification' }}
@endsection

<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid bg-gray-200">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            check your email to verify.

            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <button id="resendButton" class="resendButton">resend</button>
                <span id="countdown" style="display: none;"></span>
            </div>
        </div>
    </div>
    <!--end::Authentication - Sign-in-->
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
                    resendButton.innerText = 'resend';
                    countdownElement.style.display = 'none';
                } else {
                    resendButton.innerText = 'resend email verification in ' + count;
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
