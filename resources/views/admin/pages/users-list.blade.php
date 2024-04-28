@section('title')
    {{ 'Users List' }}
@endsection

<div class="w-100">
    <h1 class="fw-bold text-gray-800">Users</h1>
    <!--begin::Products-->
    @include('livewire.table')
    <!--end::Products-->
</div>


@section('page-scripts')
@endsection
