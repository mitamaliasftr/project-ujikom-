<!-- Brand Logo -->
<a href="dashboard" class="brand-link">
    <img src="img/logo-mini.png" alt="Nginep Logo"
        class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-bold">&nbsp;&nbsp; Nginep Hotel</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="img/me.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="/dashboard" class="d-block">Mita</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-hotel"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('absensi') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <i class="fas fa-bath"></i>
                    <i class="fas fa-soap"></i>
                    <i class="fas fa-plug"></i>
                    <i class="fas fa-spa"></i>
                    <i class="fas fa-wifi"></i>
                    <i class="fas fa-swimming-pool"></i>
                    <i class="fas fa-bed"></i>
                    <i class="fas fa-door-open"></i>
                    <i class="fas fa-door-closed"></i>
                    <i class="fas fa-swimmer"></i>
                    <i class="fas fa-concierge-bell"></i>
                    <i class="fas fa-tv"></i>
                    <i class="fas fa-hot-tub"></i>
                    <i class="fas fa-bell"></i>
                    <i class="fas fa-shower"></i>
                    <i class="fas fa-pump-soap"></i>
                    <i class="fas fa-key"></i>
                    <i class="fas fa-dumbbell"></i>
                    <i class="fas fa-utensils"></i>
                    <i class="fas fa-cocktail"></i>
                    
                    <p>
                        Absensi Karyawan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('simulasi-penjualan') }}" class="nav-link">
                    <i class="nav-icon fas fa-tshirt"></i>
                    <p>
                        Penjualan Baju Polos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('simulasi-transaksi-barang') }}" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>
                        Transaksi Barang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('simulasi-cucian') }}" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>
                        Transaksi Cucian
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('simulasi-gaji') }}" class="nav-link">
                    <i class="nav-icon fas fa-money-bill" style="color: #3faa3f;"></i>
                    <p>
                        Gaji Karyawan
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Tables
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Simple Tables</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../tables/data.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DataTables</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../tables/jsgrid.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>jsGrid</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->