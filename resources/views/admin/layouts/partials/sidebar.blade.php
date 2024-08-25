<div class="leftside-menu">
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span class="badge bg-success float-end">4</span>
                    <span> Dashboards </span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="dashboard-analytics.html">Analytics</a>
                        </li>
                        <li>
                            <a href="dashboard-crm.html">CRM</a>
                        </li>
                        <li>
                            <a href="index.html">Ecommerce</a>
                        </li>
                        <li>
                            <a href="dashboard-projects.html">Projects</a>
                        </li>
                    </ul>
                </div>
            </li>

            @can('siswa-only')
                <li class="side-nav-title side-nav-item">Formulir Pendaftaran</li>

                <li class="side-nav-item">
                    <a href="{{ route('data-pendaftaran.index') }}" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> Formulir Calon Siswa </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-ortu.index') }}" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span>Identitas Orang Tua</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-wali.index') }}" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span>Identitas Wali</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('data-berkas.index') }}" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span>Berkas</span>
                    </a>
                </li>
            @endcan

            @can('admin-only')
                <li class="side-nav-title side-nav-item">Data Master</li>

                <li class="side-nav-item">
                    <a href="apps-calendar.html" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span> Data User </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="apps-calendar.html" class="side-nav-link">
                        <i class="uil-clipboard-alt"></i>
                        <span>Pendaftar </span>
                        <span class="badge bg-success float-end">4</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="apps-chat.html" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> Hasil Pendaftaran </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                        aria-controls="sidebarEcommerce" class="side-nav-link">
                        <i class="uil-store"></i>
                        <span> Ecommerce </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="apps-ecommerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-products-details.html">Products Details</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-orders.html">Orders</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-orders-details.html">Order Details</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-customers.html">Customers</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-shopping-cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-sellers.html">Sellers</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            <!-- End Sidebar -->

            <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
