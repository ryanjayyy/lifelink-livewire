@section('title')
    {{ 'Security Pin' }}
@endsection
<div>
    @include('admin.includes.inventory.inventory-navigation')
    <div class="d-flex justify-content-center">
        <div class="card card-flush mt-8 w-50">
            <div class="card-header pt-7">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-900">Security Pin</span>
                    <span class="text-gray-500 mt-1 fw-semibold fs-6">Please enter security pin ro continue</span>
                </h3>
            </div>
            <div>
                @if (session()->has('error'))
                    <div class="alert alert-danger mx-6">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <form wire:submit.prevent='checkSecurityPin'>
                <div class="card-body pt-5">
                    <div class="d-flex justify-content-center">
                        <input wire:model='securityPin' type="password" placeholder="Password" name="password"
                            autocomplete="off" class="form-control bg-transparent">
                    </div>
                    @error('securityPin')
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end m-4">
                    <button type="submit" class="btn btn-primary mt-8">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('page-scripts')
@endsection
