<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/" class="brand-link">
        <span class="brand-text font-weight-light text-center d-block">Cua biển</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{request()->routeIs('dashboard*') ? 'menu-open' : ' '}}">
                    <a href="{{ route('dashboard') }}" class="nav-link {{request()->routeIs('dashboard*') ? 'active' : ' '}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(auth()->user()->role_id != 3)
                <li class="nav-item {{request()->routeIs('foods-drinks*') ? 'menu-open' : ''}}">
                    <a href="{{route('foods-drinks.index')}}" class="nav-link {{request()->routeIs('foods-drinks*') ? 'active' : ' '}} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Đồ ăn & Thức uống
                        </p>
                    </a>
                </li>

                <li class="nav-item {{request()->routeIs('menu*') ? 'menu-open' : ' '}}">
                    <a href="{{route('menu.index')}}" class="nav-link {{request()->routeIs('menu*') ? 'active' : ' '}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý menu
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('info*') || request()->routeIs('branches*') ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Quản lý nhà hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('info.index')}}" class="nav-link {{request()->routeIs('info*') ? 'active' : ' '}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thông tin nhà hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('branches.index')}}" class="nav-link {{request()->routeIs('branches*') ? 'active' : ' '}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thông tin chi nhánh</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{request()->routeIs(['bookings*', 'orders.*']) ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Đặt bàn & Đặt món
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bookings.index')}}" class="nav-link {{request()->routeIs('bookings*') ? 'active' : ' '}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đặt bàn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('orders.index')}}" class="nav-link {{request()->routeIs('orders*') ? 'active' : ' '}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đặt món</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản lý người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('news*') ? 'menu-open' : ''}}">
                    <a href="{{route('news.index')}}" class="nav-link {{request()->routeIs('news*') ? 'active' : ' '}} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tin Tức
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('categories*') ? 'menu-open' : ''}}">
                    <a href="{{route('categories.index')}}" class="nav-link {{request()->routeIs('categories*') ? 'active' : ' '}} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thể loại tin tức
                        </p>
                    </a>
                </li>
                @else
                    <li class="nav-item {{request()->routeIs(['staff.bookings*', 'staff.orders.*']) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Đặt bàn & Đặt món
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('staff.bookings.index')}}" class="nav-link {{request()->routeIs('staff.bookings*') ? 'active' : ' '}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Đặt bàn</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('staff.orders.index')}}" class="nav-link {{request()->routeIs('staff.orders*') ? 'active' : ' '}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Đặt món</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
