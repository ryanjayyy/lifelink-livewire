@section('title')
    {{ 'Create Post' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Blood Requests</h1>
        </div>
    </div>

    @include('admin.includes.network.network-navigation')
    <div class="d-flex justify-content-end w-100 my-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_2">Create Post</button>
    </div>



    @foreach ($adminPosts as $posts)
        @include('admin.partials.network.created-posts')
    @endforeach
    @include('admin.partials.network.create-post')
    @livewire('Admin\Network\EditPost')

</div>


@section('page-scripts')
@endsection
