  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('logo/Logo.png') }}" alt="FoodPipra Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FoodPipra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category info</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Location
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.location.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Location info</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.slider.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider info</p>
                </a>
              </li>           
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Brand
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.brand.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Info</p>
                </a>
              </li>           
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.order.new') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Order</p>
                </a>
              </li>    

              <li class="nav-item">
                <a href="{{ route('admin.order.delivered') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Delivered Order</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="{{ route('admin.order.cancel') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Cancel Order</p>
                </a>
              </li>   

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Seller Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.seller.info') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All seller</p>
                </a>
              </li>           
            </ul>
          </li>


        </ul>

        <hr>
        <ul>
          <li><a class="font-bold"
              onclick="event.preventDefault();
                            document.getElementById('adminLogout').submit();">
               {{ __('Logout') }}
           </a>

           <form id="adminLogout" action="{{ route('admin.logout') }}" method="POST" class="d-none">
               @csrf
           </form></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>