@extends("dashboard.layouts.dashboard")

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
                <div class="card-header">
                    <h3 class="card-title">تعديل كلمة المرور</h3>

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
                                    <form action="{{ route('dashboard.users.updatePassword', $user->id) }}"
                                          method="post">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label for="old_password">كلمة المرور القديمة</label>
                                            <input type="password" name="old_password" id="old_password"
                                                   class="form-control @error('old_password') is-invalid @enderror"
                                                   placeholder="كلمة المرور القديمه"
                                                   aria-describedby="helpId"
                                            >
                                            @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">كلمة المرور الجديده</label>
                                            <input type="password" name="password" id="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   placeholder="كلمة المرور الجديده"
                                                   aria-describedby="helpId"
                                            >
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">تأكيد كلمة المرور الجديده</label>
                                            <input type="password" name="password_confirmation"
                                                   id="password_confirmation"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   placeholder="تأكيد كلمة المرور الجديده" aria-describedby="helpId"
                                            >
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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
