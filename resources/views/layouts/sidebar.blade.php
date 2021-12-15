<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="assets/images/logo/report.png" style="width: 100%; height: 45px;" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-title">Dashboard</li>
                <!-- Datawarehouse -->
                <li class="sidebar-item {{ setActive(['/']) }}">
                    <a href="{{ url('/') }}" class='sidebar-link'>
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Menu</li>
                <!-- Datawarehouse -->
                <!-- <li class="sidebar-item {{ setActive(['umkm*']) }}">
                    <a href="{{ url('/umkm') }}" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>UMKM</span>
                    </a>
                </li> -->

                <!-- Data Warehouse -->
                <li class="sidebar-item  {{ setActive(['datawarehouse*']) }}">
                    <a href="{{ url('/datawarehouse') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Data Warehouse</span>
                    </a>
                </li>

                <li class="sidebar-title">Pages</li>

                <!-- Visualisasi -->
                <li class="sidebar-item  {{ setActive(['visualisasi*']) }}">
                    <a href="{{ url('/visualisasi') }}" class='sidebar-link'>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Visualisasi</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>