
@include('dashboard.seller.layout.header')
<body id="page-top">
    <div id="wrapper">
        @include('dashboard.seller.layout.sidebar')
          <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('dashboard.seller.layout.navbar')
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
                     @yield('page-content')
                  </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('dashboard.seller.layout.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
@include('dashboard.seller.layout.footer_url')

</body>
</html>