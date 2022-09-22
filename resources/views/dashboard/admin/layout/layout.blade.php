
@include('dashboard.admin.layout.header')
<div class="wrapper">
    @include('dashboard.admin.layout.navbar')
    @include('dashboard.admin.layout.sidebar')

<div class="content-wrapper">
        @yield('content')
</div>
 <!-- /.content-wrapper -->

 @include('dashboard.admin.layout.footer')
</div>
<!-- ./wrapper -->
@include('dashboard.admin.layout.footer_url')

