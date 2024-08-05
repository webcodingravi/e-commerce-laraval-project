

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{asset('img/online shop.png')}}" alt="Logo" class="brand-image img-circle elevation-8" style="opacity: .8">
    <span class="brand-text font-weight-light">Online <span class="text-warning">Shop<span></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt text-warning"></i>
            <p>Dashboard</p>
          </a>																
        </li>
        <li class="nav-item">
          <a href="{{route('categories.index')}}" class="nav-link">
            <i class="nav-icon fas fa-file-alt text-danger"></i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('sub-categories.index')}}" class="nav-link">
            <i class="nav-icon fas fa-file-alt text-success"></i>
            <p>Sub Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('brand.index')}}" class="nav-link">
            <svg class="h-6 nav-icon w-6 shrink-0 text-info" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            <p>Brands</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('products.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tag text-warning"></i>
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('products.productRating')}}" class="nav-link">
            <i class="nav-icon fas fa-star text-danger"></i>
            <p>Ratings</p>
          </a>
        </li>
       
        
        <li class="nav-item">
          <a href="{{route('shipping.create')}}" class="nav-link">
            <!-- <i class="nav-icon fas fa-tag"></i> -->
            <i class="fas fa-truck nav-icon text-primary"></i>
            <p>Shipping</p>
          </a>
        </li>
        
   
        <li class="nav-item">
          <a href="{{route('orders.index')}}" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag text-info"></i>
            <p>Orders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('coupons.index')}}" class="nav-link">
            <i class="nav-icon  fa fa-percent text-warning" aria-hidden="true"></i>
            <p>Discount</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('users.index')}}" class="nav-link">
            <i class="nav-icon  fas fa-users text-success"></i>
            <p>Users</p>
          </a>
        </li>

   

        <li class="nav-item">
          <a href="{{route('pages.index')}}" class="nav-link">
            <i class="nav-icon  far fa-file-alt text-primary"></i>
            <p>Pages</p>
          </a>
        </li>							
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
     </aside>