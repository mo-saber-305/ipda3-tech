<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav mr-auto-navbav">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img
                    src="{{ asset(auth()->user()->image) }}"
                    class="user-image img-circle elevation-2" alt="User Image">

                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header">
                    <img
                        src="{{ asset(auth()->user()->image) }}"
                        class="user-image img-circle elevation-2" alt="User Image">

                    <p>
                        {{ auth()->user()->name }}
                        <small>{{ auth()->user()->description }}</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                        <div class="col-6 text-center">
                            <a href="{{ route('dashboard.users.profile', auth()->user()->id) }}">الملف الشخصي</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->


