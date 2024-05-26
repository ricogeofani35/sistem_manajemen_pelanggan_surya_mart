<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <h4 class="text-light text-center fw-bold my-3 border-bottom border-secondary pb-4">Sistem Menajemen Pelanggan</h4>

    <!-- Sidebar -->
    <div class="sidebar mt-3">
      <!-- Sidebar Menu -->
      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open mt-4">
            <a href="/" class="nav-link rounded-pill {{ Request::is('/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(!auth()->user())
            <li class="nav-item menu-open mt-4 ">
              <a href="/check_products" class="nav-link rounded-pill {{ Request::is('check_products*') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-check-circle" aria-hidden="true"></i>
                <p>
                  Cek Barang
                </p>
              </a>
            </li>
            <li class="nav-item menu-open mt-4 ">
              <a href="/promotions" class="nav-link rounded-pill {{ Request::is('promotions*') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tag" aria-hidden="true"></i>
                <p>
                  Promosi
                </p>
              </a>
            </li>
          @endif

          @if(auth()->user())
            @if(auth()->user()->is_admin == 1)
            <li class="nav-item menu-open mt-4 ">
              <a href="/users" class="nav-link rounded-pill {{ Request::is('users*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                <p>
                  Data Users
                </p>
              </a>
            </li>
            <li class="nav-item menu-open mt-4 ">
              <a href="/data_products" class="nav-link rounded-pill {{ Request::is('data_products*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-archive" aria-hidden="true"></i>
                <p>
                  Data Products
                </p>
              </a>
            </li>
            <li class="nav-item menu-open mt-4 ">
              <a href="/data_promotions" class="nav-link rounded-pill {{ Request::is('data_promotions*') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tag" aria-hidden="true"></i>
                <p>
                  Data Promotions
                </p>
              </a>
            </li>
            <li class="nav-item menu-open mt-4 ">
              <a href="/data_customers" class="nav-link rounded-pill {{ Request::is('data_customers*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                <p>
                  Data Customers
                </p>
              </a>
            </li>
            <li class="nav-item menu-open mt-4 ">
              <a href="/data_orders" class="nav-link rounded-pill {{ Request::is('data_orders*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-cart-plus" aria-hidden="true"></i>
                <p>
                  Data Orders
                </p>
              </a>
            </li>
            @endif

            @if(auth()->user()->is_admin == 0)
              <li class="nav-item menu-open mt-4 ">
                <a href="/orders" class="nav-link rounded-pill {{ Request::is('orders*') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-book" aria-hidden="true"></i>
                  <p>
                    Order Barang
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open mt-4 ">
                <a href="/data_akuns" class="nav-link rounded-pill {{ Request::is('data_akuns*') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-address-book" aria-hidden="true"></i>
                  <p>
                    Data Akun
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open mt-4 ">
                <a href="/history_orders" class="nav-link rounded-pill {{ Request::is('history_orders*') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-cart-plus" aria-hidden="true"></i>
                  <p>
                    History Order
                  </p>
                </a>
              </li>
            @endif            
          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>