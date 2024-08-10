<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src={{ asset('/dist/img/AdminLTELogo.png') }} alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">
            {{ Auth::user()->roles[0]['name'] == 'super-admin' ? 'پنل مدیریت' : 'پنل' }}
         
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src={{ asset('/dist/img/user2-160x160.jpg') }} class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }}{{ Auth::user()->lastname }}</a>

                <span class="badge badge-pill badge-info">{{ Auth::user()->roles[0]['name'] }}</span>

            </div>

        </div>



        <!-- Sidebar Menu FOR SUPER-ADMIN -->
        @if (Auth::user()->hasAnyRole(['super-admin']))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>

                                کاربران
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href={{ route('users.show') }} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مشاهده کاربران</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                تصاویر
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href={{ route('users.images.show') }} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مشاهده تصاویر </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                سفارش ها
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href={{ route('users.images.show') }} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مشاهده سفارش ها </p>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                نقش و مجوز های کاربران
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href={{ route('permissions.index') }} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مشاهده مجوز ها </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href={{ route('roles.index') }} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مشاهده نقش ها </p>
                                </a>
                            </li>
                        </ul>
                    </li>



                </ul>
            </nav>
        @endif
        <!-- /.sidebar-menu -->



        <!-- Sidebar Menu FOR USER -->
        @if (Auth::user()->hasAnyRole(['user']))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                    <li class="nav-item">

                    <li class="nav-item">
                        <a href={{ route('user.images.show') }} class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>تصاویر من</p>
                        </a>
                    </li>


                    </li>
                    <li class="nav-item">

                    <li class="nav-item">
                        <a href={{ route('users.images.show') }} class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>سفارش های من</p>
                        </a>
                    </li>
                    </li>
                </ul>
            </nav>
        @endif
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
