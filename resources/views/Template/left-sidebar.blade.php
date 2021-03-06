
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Halaman Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('visimisi.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Visi dan Misi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pimpinan.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Pimpinan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('bupati.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Bupati</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('wakilbupati.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Wakil Bupati</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('sekda.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Sekretariat Daerah</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('puskesmas.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Informasi Puskesmas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('sejarah.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Sejarah</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('download.index') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>Download</p>
                    </a>
                </li>

                @if (auth()->user()->level == "admin")
                <li class="nav-item">
                    <a href="{{ route('registrasi') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>
                            Daftarkan Operator Website
                        </p>
                    </a>
                </li>
                @endif
                
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fas fa-circle-notch"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
