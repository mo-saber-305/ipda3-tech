

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
        <h4 class="mb-0 text-center">{{ session()->get('error') }}</h4>
        <button type="button" class="close" style="opacity: 1;" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
        <h4 class="mb-0 text-center">{{ session()->get('success') }}</h4>
        <button type="button" class="close text-light" style="opacity: 1" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

