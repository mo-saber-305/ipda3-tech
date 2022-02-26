<div class="container">
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible message fade show my-4" role="alert">
            <h5 class="mb-0 text-center">{{ session()->get('error') }}</h5>
            <button type="button" class="close" style="opacity: 1;" data-dismiss="alert"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible message fade show my-4" role="alert">
            <h5 class="mb-0 text-center">{{ session()->get('success') }}</h5>
            <button type="button" class="close text-light" style="opacity: 1" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

