<!--begin::App Wrapper-->
<div class="app-wrapper"> <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body sticky-top"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
            </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
            <div id="admin-logout" class="dropdown">
                <div class="d-inline me-2">
                    <?php if (basename($_SERVER['PHP_SELF']) == "projects.php") { ?>
                        <a href="add-projects.php" class=" btn  btn-md btn-success add">Add</a>
                    <?php } ?>
                </div>
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= ucfirst($_SESSION['name']) ?>
                </button>
                <ul class="dropdown-menu text-center dropdown-menu-end">
                    <li><a class="dropdown-item " href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!--end::End Navbar Links-->
        </div> <!--end::Container-->
    </nav> <!--end::Header--> <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
        <div class="sidebar-brand"> <!--begin::Brand Link-->
            <span class="brand-text fw-light">
                <?= ucfirst($_SESSION['name']) ?>
            </span> <!--end::Brand Link-->
        </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <nav class="mt-2"> <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                    <li class="nav-item"> <a href="dashboard.php" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                            <p>
                                Dashboard

                            </p>
                        </a></li>
                    <li class="nav-item"> <a href="contacts.php" class="nav-link"> <i class="nav-icon bi bi-table"></i>
                            <p>
                                Contact list

                            </p>
                        </a></li>
                    <li class="nav-item"> <a href="projects.php" class="nav-link"> <i class="nav-icon bi bi-pencil-square"></i>
                            <p>
                                Projects

                            </p>
                        </a></li>
                </ul> <!--end::Sidebar Menu-->
            </nav>
        </div> <!--end::Sidebar Wrapper-->
    </aside> <!--end::Sidebar--> <!--begin::App Main-->