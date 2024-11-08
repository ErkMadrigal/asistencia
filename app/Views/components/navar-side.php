   
   <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
                <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li>
            </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
            <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                
                <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->
                <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
                <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="d-none d-md-inline"><?=session()->get()['firstname']?></span> </a>
                    <ul class="dropdown-menu dropdown-menu-end"> <!--begin::User Image-->
                        <li> 
                            <a href="#" class="dropdown-item">Profile</a> 
                        </li>
                        <li>
                            <a href="./logout/" class="dropdown-item">Sign out</a> 
                        </li> <!--end::Menu Footer-->
                    </ul>
                </li> <!--end::User Menu Dropdown-->
      
            </ul> <!--end::End Navbar Links-->
        </div> <!--end::Container-->
    </nav> <!--end::Header--> <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
        <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./dashboard/" class="brand-link"> <!--begin::Brand Image--> <img src="<?= base_url('assets/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <nav class="mt-2"> <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                    
                    <li class="nav-item"> <a href="./dashboard/" class="nav-link"> <i class="nav-icon bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a> </li>
                    <li class="nav-item"> <a href="./estudiantes/" class="nav-link"> <i class="bi bi-person-vcard"></i>
                        <p>Estudiantes</p>
                    </a> </li>
                   
                    <li class="nav-item"> <a href="./docentes/" class="nav-link"> <i class="bi bi-person-video3"></i>
                            <p>
                                Docentes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item"> <a href="./asistencias/" class="nav-link"> <i class="bi bi-calendar-check-fill"></i>
                            <p>
                                Asistencias
                            </p>
                        </a>
                    </li>
                </ul> <!--end::Sidebar Menu-->
            </nav>
        </div> <!--end::Sidebar Wrapper-->
    </aside> <!--end::Sidebar--> <!--begin::App Main-->