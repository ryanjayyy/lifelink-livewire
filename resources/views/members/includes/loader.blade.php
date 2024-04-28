    <!--begin::Page loading(append to body)-->
    <div wire:loading class="page-loader flex-column bg-dark bg-opacity-25">
        <div class="page-loader flex-column bg-dark bg-opacity-50"
            style="display: flex; justify-content: center; align-items: center; height: 100vh;">
            <div wire:loading class="text-center" style="position: relative;">
                <img src="{{ asset('assets/media/logos/NEW ESSENSA LOGO LANDSCAPE.svg') }}"
                    style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 200px;"
                    alt="Essensa Logo" />
                <div class="spinner-border fs-1 text-success" role="status"
                    style="position: relative; margin-top: 120px;">
                </div>
            </div>
        </div>
    </div>
    <!--end::Page loading-->
