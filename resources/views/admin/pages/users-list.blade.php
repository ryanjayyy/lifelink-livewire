@section('title')
    {{ 'Users List' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Users List</h1>
        </div>
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Total Users: 1234</h1>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-4">
        <button type="button" class="btn btn-primary mt-8">Add User</button>
        <button type="button" class="btn btn-primary mt-8">Export PDF</button>
    </div>
    <!--begin::Products-->
    @include('livewire.table')
    <!--end::Products-->
</div>


@section('page-scripts')
@endsection
