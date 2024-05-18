@section('title')
    {{ 'Users List' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Users List</h1>
        </div>
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Total Users: {{ $userCount }}</h1>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-4">
        <button type="button" class="btn btn-primary mt-8" data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_1">Add User</button>
            @livewire('Admin\UsersList\AddUser')
        <button type="button" class="btn btn-primary mt-8">Export PDF</button>
    </div>
    <!--begin::Products-->
    @include('livewire.table')
    @livewire('Admin\UsersList\EditUser')
    @livewire('Admin\UsersList\ViewUser')
    @livewire('Admin\UsersList\AddBloodBag')
    @livewire('Admin\UsersList\MoveToDeferral')
    <!--end::Products-->
</div>


@section('page-scripts')
@endsection
