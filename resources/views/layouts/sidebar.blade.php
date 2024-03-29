
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">JOPOS<sup>1.2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{route('home')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      BUYER & Supplier
    </div>

    <li class="nav-item">
      <a class="nav-link" href="{{route('customer')}}">
        <i class="fas fa-fw fa-user-tag"></i>
        <span>Buyer</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('supplier')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Supplier</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Pengadaan Barang
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBarang" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Barang</span>
          </a>
          <div id="collapseBarang" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{route('barang')}}">Laporan Stock</a>

            </div>
          </div>
        </li>
    <!-- batas -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pembelian Barang</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="{{route('pembelian')}}">Pembelian Barang</a>
              <a class="collapse-item" href="{{route('detailpembelian')}}">Rekap Pembelian Barang</a>

            </div>
          </div>
        </li>


        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
          Point of Sales
        </div>

        <li class="nav-item">
          <a class="nav-link" href="{{route('penjualan')}}">
            <i class="fas fa-fw fa-cart-plus"></i>
            <span>Kasir</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('detailpenjualan')}}">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Rekap Penjualan</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          </ul>
          <!-- End of Sidebar -->
