@section('title')
    {{ 'Activity Logs' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Activity Logs</h1>
        </div>
    </div>

    @include('livewire.table')

</div>


@section('page-scripts')
@endsection
