@extends("dashboard.layouts.dashboard")

@section('style')
    <style>
        .card-header::after {
            content: unset;
        }
    </style>
@stop

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">الملف الشخصي</li>
    </ol>
@stop

@section('page_title', 'الملف الشخصي')

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Default box -->
            <div class="card main-content-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">تعديل الملف الشخصي</h3>

                    <a class="btn btn-outline-primary" href="{{ route('dashboard.users.changePassword', $user->id) }}"
                       role="button">تغيير
                        كلمة المرور</a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <form action="{{ route('dashboard.users.updateProfile', $user->id) }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label for="name">الاسم</label>
                                            <input type="text" name="name" id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="اكتب الاسم ..."
                                                   aria-describedby="helpId" value="{{ $user->name }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">الايميل</label>
                                            <input type="email" name="email" id="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="اكتب الايميل ..."
                                                   aria-describedby="helpId"
                                                   value="{{ $user->email }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="description">الوصف</label>
                                            <input type="text" name="description" id="description"
                                                   class="form-control" placeholder="اكتب الوصف ..."
                                                   aria-describedby="helpId" value="{{ $user->description }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="image">الصوره</label>
                                            <input type="file" class="form-control-file" name="image" id="image"
                                                   aria-describedby="fileHelpId">
                                        </div>

                                        <div class="form-group text-center mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary">
                                                تحديث الملف الشخصي
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
@endsection
