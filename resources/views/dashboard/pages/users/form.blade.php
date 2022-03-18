@extends("dashboard.layouts.dashboard")

@section('breadcrumb')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">المشرفين</a></li>
        <li class="breadcrumb-item active">
            {{ isset($user) ? 'تعديل المشرف' : 'انشاء مشرف جديد' }}
        </li>
    </ol>
@stop

@section('page_title')
    {{ isset($user) ? 'تعديل المشرف' : 'انشاء مشرف جديد' }}
@stop

@section('style')
    <style>
        .nav-tabs .nav-link.active {
            color: #ffffff;
            background-color: #243142;
            border-color: #243142;
        }

        .nav-tabs .nav-link {
            color: #343a40;
        }

    </style>
@stop

@section('dashboard-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Default box -->
            <div class="card main-content-card">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($user) ? 'تعديل المشرف' : 'انشاء مشرف جديد' }}</h3>

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
                                    <form
                                        action="{{ isset($user) ? route('dashboard.users.update', $user->id) : route('dashboard.users.store') }}"
                                        method="post"
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @isset($user)
                                            @method('put')
                                        @endisset
                                        <div class="form-group">
                                            <label for="name">الاسم</label>
                                            <input type="text" name="name" id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="اكتب الاسم ..."
                                                   aria-describedby="helpId"
                                                   value="{{ isset($user) ? $user->name : old('name') }}">
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
                                                   value="{{ isset($user) ? $user->email : old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @if (!isset($user))
                                            <div class="form-group">
                                                <label for="password">كلمة المرور</label>
                                                <input type="password" name="password" id="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       placeholder="اكتب كلمة المرور ..."
                                                       aria-describedby="helpId"
                                                >
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">تأكيد كلمة المرور</label>
                                                <input type="password" name="password_confirmation"
                                                       id="password_confirmation"
                                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                                       placeholder="تأكيد كلمة المرور ..."
                                                       aria-describedby="helpId"
                                                >
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="myTab">الصلاحيات</label>
                                            @php
                                                $models = ['clients', 'projects', 'articles', 'services', 'users'];
                                                $maps = ['create', 'read', 'update', 'delete'];
                                                $maps2 = ['read', 'update'];
                                            @endphp
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                @foreach ($models as $index=>$model)
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                           id="{{ $model }}-tab" data-toggle="tab" href="#{{ $model }}"
                                                           role="tab" aria-controls="home" aria-selected="true">
                                                            <strong>@lang('site.' . $model)</strong>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                       id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                                                       aria-controls="home" aria-selected="true">
                                                        <strong>@lang('site.' . 'settings')</strong>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                @foreach ($models as $index=>$model)
                                                    <div
                                                        class="tab-pane mt-4 fade show {{ $index == 0 ? 'active' : '' }}"
                                                        id="{{ $model }}" role="tabpanel"
                                                        aria-labelledby="{{ $model }}-tab">
                                                        <div class="row">
                                                            @foreach ($maps as $map)
                                                                <div class="col-3">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" name="permissions[]"
                                                                                   class="form-check-input"
                                                                                   value="{{ $map . '-' . $model }}" @isset($user)  {{ $user->hasPermission($map . '-' . $model) ? 'checked' : '' }} @endisset>
                                                                            <strong>@lang('site.' .$map)</strong>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="tab-pane mt-4 fade show {{ $index == 0 ? 'active' : '' }}"
                                                     id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                                    <div class="row">
                                                        @foreach ($maps2 as $map2)
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" name="permissions[]"
                                                                               class="form-check-input"
                                                                               value="{{ $map2 . '-' . 'settings' }}" @isset($user)  {{ $user->hasPermission($map2 . '-' . 'settings') ? 'checked' : '' }} @endisset>
                                                                        <strong>@lang('site.' .$map2)</strong>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center mt-4 mb-0">
                                            <button type="submit"
                                                    class="btn btn-primary @isset($user) btn-success @endisset">
                                                {{ isset($user) ? 'تعديل المشرف' : 'انشاء المشرف' }}
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

@section('script')
    <script>
        $(document).ready(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
            });
        });
    </script>
@stop
