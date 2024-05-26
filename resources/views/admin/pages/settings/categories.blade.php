@section('title')
    {{ 'Settings Categories' }}
@endsection

<div class="app-container">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Settings</h1>
        </div>
    </div>

    <div class="row gx-5 gx-xl-10 py-10">
        @include('admin.partials.settings.main')
        @include('admin.partials.settings.donation')
        @include('admin.partials.settings.deferral')

    </div>
</div>
