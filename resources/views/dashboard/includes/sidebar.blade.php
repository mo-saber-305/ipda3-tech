<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('front.home') }}" class="brand-link py-3">
        <img src="{{ asset($setting->site_icon) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ابداع تك</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            كل القوائم
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (auth()->user()->hasPermission('read-clients'))
                            <li class="nav-item">
                                <a href="{{ route('dashboard.clients.index') }}" class="nav-link">
                                    <i class="fas fa-users-cog nav-icon"></i>
                                    <p>العملاء</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('read-projects'))
                            <li class="nav-item">
                                <a href="{{ route('dashboard.projects.index') }}" class="nav-link">
                                    <i class="fas fa-laptop nav-icon"></i>
                                    <p>المشاريع</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('read-articles'))
                            <li class="nav-item">
                                <a href="{{ route('dashboard.articles.index') }}" class="nav-link">
                                    <i class="far fa-newspaper nav-icon"></i>
                                    <p>المقالات</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('read-services'))
                            <li class="nav-item">
                                <a href="{{ route('dashboard.services.index') }}" class="nav-link">
                                    <i class="fas fa-praying-hands nav-icon"></i>
                                    <p>الخدمات</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasPermission('read-pages'))
                            <li class="nav-item">
                                <a href="{{ route('dashboard.pages.index') }}" class="nav-link">
                                    <i class="fas fa-pager nav-icon"></i>
                                    <p>الصفحات</p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->hasPermission('read-users'))
                            <li class="nav-item">
                                <a href="{{ route('dashboard.users.index') }}" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>المشرفين</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if (auth()->user()->hasPermission('read-settings'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.settings.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>الاعدادات</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
