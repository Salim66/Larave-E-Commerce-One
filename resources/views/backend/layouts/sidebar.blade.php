@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('backend/assets/dist/') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ (Auth::user()->image) ? URL::to('/upload/user_images/'.Auth::user()->image) : URL::to('/upload/no-image-found.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @if(Auth::user()->role == 'admin')
          <li class="nav-item  {{ ($prefix == '/users')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/users')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.view') }}" class="nav-link {{ ($route == 'users.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item {{ ($prefix == '/profiles')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/profiles')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.view') }}" class="nav-link {{ ($route == 'profile.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profile.password.change') }}" class="nav-link {{ ($route == 'profile.password.change')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item  {{ ($prefix == '/logo')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link  {{ ($prefix == '/logo')  ? 'active' : ' ' }}">
              <i class="nav-icon fab fa-pied-piper"></i>
              <p>
                Manage Logo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('logo.view') }}" class="nav-link {{ ($route == 'logo.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Logo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/slider')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/slider')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('slider.view') }}" class="nav-link {{ ($route == 'slider.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/contacts')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/contacts')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Contacts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contacts.view') }}" class="nav-link  {{ ($route == 'contacts.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contacts.communicate') }}" class="nav-link  {{ ($route == 'contacts.communicate')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Communicate</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/abouts')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/abouts')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage About Us
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('abouts.view') }}" class="nav-link {{ ($route == 'abouts.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View About Us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/categories')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/categories')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.view') }}" class="nav-link {{ ($route == 'categories.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/brand')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/brand')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Brand
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('brand.view') }}" class="nav-link {{ ($route == 'brand.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brand</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/colors')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/colors')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Color
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('colors.view') }}" class="nav-link {{ ($route == 'colors.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Color</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/sizes')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/sizes')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Size
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sizes.view') }}" class="nav-link {{ ($route == 'sizes.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Size</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/products')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/products')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.view') }}" class="nav-link {{ ($route == 'products.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/customers')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/customers')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customers.view') }}" class="nav-link {{ ($route == 'customers.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customers.draft.view') }}" class="nav-link {{ ($route == 'customers.draft.view')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Draft Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix == '/orders')  ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ ($prefix == '/orders')  ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('orders.pending.list') }}" class="nav-link {{ ($route == 'orders.pending.list')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('orders.approved.list') }}" class="nav-link {{ ($route == 'orders.approved.list')  ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Order</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
