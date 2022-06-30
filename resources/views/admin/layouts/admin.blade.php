<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page | @yield('title') </title>

    @include('admin.layouts.header-js')
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
@include('admin.layouts.top-nav')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content" style="margin-top: 20px">
            <div class="container-fluid">
                @yield('content')

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('admin.layouts.footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layouts.footer-js')

@stack('scripts')
<script type="text/javascript">
    @if (Session::get('success'))
    toastr.success('{{ Session::get('success') }}', 'Thành công', 2000);
    @endif
    @if (Session::get('error'))
    toastr.error('{{ Session::get('error') }}', 'Thất bại', 2000);
    @endif
</script>
</body>
</html>
