  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('seller.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Foodpipra </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('seller.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Seller Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products Info</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">All Products:</h6> --}}
                <a class="collapse-item" href="{{ route('seller.product.index') }}">All Products</a>
                <a class="collapse-item" href="{{ route('seller.product.create') }}">Add New Products</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder"
            aria-expanded="true" aria-controls="collapseOrder">
            <i class="fas fa-fw fa-cog"></i>
            <span>Orders Info</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">All Products:</h6> --}}
                <a class="collapse-item" href="{{ route('seller.all.order') }}">All Orders</a>
                <a class="collapse-item" href="{{ route('seller.all.new') }}">New Orders</a>
                <a class="collapse-item" href="{{ route('seller.all.delivered') }}">Delibered Orders</a>
                <a class="collapse-item" href="{{ route('seller.all.cancel') }}">Cancel Orders</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="true" aria-controls="collapseOrder">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category Info</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">All Products:</h6> --}}
                <a class="collapse-item" href="buttons.html">All Category</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->