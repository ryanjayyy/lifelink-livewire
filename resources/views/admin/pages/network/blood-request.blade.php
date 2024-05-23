@section('title')
    {{ 'Blood Bag List' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Blood Requests</h1>
        </div>
    </div>

    @include('admin.includes.network.network-navigation')

    <div class="d-flex justify-content-between w-100">
        @include('admin.partials.network.pending-request')
    </div>


</div>


@section('page-scripts')
@endsection
