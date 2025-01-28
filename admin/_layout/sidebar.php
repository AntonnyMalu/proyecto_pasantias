<ul class="navbar-nav sidebar sidebar-dark accordion <?php if ($modulo == "dashboard") {
                                                            echo "toggled";
                                                        } ?>" id="accordionSidebar" style="
background: linear-gradient(0deg, rgba(208,200,25,1) -20%, rgba(14,87,17,1) 24%);">

    <!-- Sidebar - Brand -->
    <?php
    if (isset($raiz)) {
        if ($modulo == "dashboard") {
            $url = "../";
        } else {
            $url = "../../";
        }
    } else {
        if ($modulo == "dashboard") {
            $url = "";
        } else {
            $url = "../";
        }
    }
    ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $url; ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laugh-wink"></i>

        </div>
        <div class="sidebar-brand-text mx-3">
            <h5 style="font-family: verdana;">ALGUARISA</h5>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($modulo == "dashboard") {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?php echo $url ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if ($_SESSION['role'] == 2 || $_SESSION['role'] > 98) {  ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            RRHH
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link <?php if ($modulo != "nomina" && $modulo != "cargos" && $modulo != "ubicaciones") {
                                    echo "collapsed active";
                                } ?>" href="#" data-toggle="collapse" data-target="#collapserecursos" aria-expanded="true" aria-controls="collapserecursos">
                <i class="fas fa-fw fa-users"></i>
                <span>Recursos Humanos</span>
            </a>
            <div id="collapserecursos" class="collapse <?php if ($modulo == "nomina" || $modulo == "cargos" || $modulo == "ubicaciones") {
                                                            echo "show";
                                                        } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Carnetización:</h6>
                    <a class="collapse-item <?php if ($modulo == "nomina") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "rrhh/nomina"; ?>">
                        <i class="fas fa-clipboard-list"></i>
                        Nómina
                    </a>

                    <a class="collapse-item <?php if ($modulo == "cargos") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "rrhh/cargos"; ?>">
                        <i class="fas fa-list"></i>
                        Cargos
                    </a>
                    <a class="collapse-item <?php if ($modulo == "ubicaciones") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "rrhh/ubicaciones"; ?>">
                        <i class="fas fa-map-marked-alt"></i>
                        Ubicaciones
                    </a>

                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php } ?>

    <?php if ($_SESSION['role'] == 3 || $_SESSION['role'] > 98) {  ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Transporte
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link <?php if ($modulo != "empresas" && $modulo != "guias") {
                                    echo "collapsed active";
                                } ?>" href="#" data-toggle="collapse" data-target="#collapseTransporte" aria-expanded="true" aria-controls="collapseTransporte">
                <i class="fas fa-truck-moving"></i>
                <span>Guias de Traslado</span>
            </a>
            <div id="collapseTransporte" class="collapse <?php if ($modulo == "empresas" || $modulo == "vehiculos" || $modulo == "choferes" || $modulo == "rutas" || $modulo == "guias") {
                                                                echo "show";
                                                            } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Registros:</h6>

                    <a class="collapse-item <?php if ($modulo == "guias") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "transporte/guias"; ?>">
                        <i class="far fa-file-alt"></i>
                        Guías
                    </a>
                    <a class="collapse-item <?php if ($modulo == "choferes") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "transporte/choferes"; ?>">
                        <i class="fas fa-address-card"></i>
                        Choferes
                    </a>
                    <a class="collapse-item <?php if ($modulo == "vehiculos") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "transporte/vehiculos"; ?>">
                        <i class="fas fa-truck"></i>
                        Vehiculos
                    </a>
                    <a class="collapse-item <?php if ($modulo == "empresas") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "transporte/empresas"; ?>">
                        <i class="fas fa-warehouse"></i>
                        Empresas
                    </a>
                    <a class="collapse-item <?php if ($modulo == "rutas") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "transporte/rutas"; ?>">
                        <i class="fas fa-road"></i>
                        Rutas
                    </a>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php } ?>

    <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] > 98) {  ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Recepción
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link <?php if ($modulo != "casos" && $modulo != "oficios" && $modulo != "personas" && $modulo != "instituciones") {
                                    echo "collapsed active";
                                } ?>" href="#" data-toggle="collapse" data-target="#collapseAtencion" aria-expanded="true" aria-controls="collapseAtencion">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>Atención al Ciudadano</span>
            </a>
            <div id="collapseAtencion" class="collapse <?php if ($modulo == "casos" || $modulo == "oficios" || $modulo == "personas" || $modulo == "instituciones" || $modulo == "miembros") {
                                                            echo "show";
                                                        } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Registros:</h6>

                    <a class="collapse-item <?php if ($modulo == "casos") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "atencion/casos"; ?>">
                        <i class="fas fa-user-friends"></i>
                        Casos Sociales
                    </a>

                    <a class="collapse-item <?php if ($modulo == "oficios") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "atencion/oficios"; ?>">
                        <i class="fas fa-clipboard-list"></i>
                        Oficios
                    </a>

                    <a class="collapse-item <?php if ($modulo == "personas") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "atencion/personas"; ?>">
                        <i class="fas fa-user-alt"></i>
                        Personas
                    </a>

                    <a class="collapse-item <?php if ($modulo == "instituciones") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "atencion/instituciones"; ?>">
                        <i class="fas fa-university"></i>
                        Intituciones
                    </a>

                    <a class="collapse-item <?php if ($modulo == "firmantes") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "atencion/firmantes";  ?>">
                        <i class="fas fa-pen-fancy"></i>
                        Firmantes
                    </a>

                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php } ?>

    <?php if ($_SESSION['role'] > 98) {  ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link <?php if ($modulo != "usuarios" && $modulo != "firmantes") {
                                    echo "collapsed active";
                                } ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Configuracion</span>
            </a>
            <div id="collapseTwo" class="collapse <?php if ($modulo == "usuarios" || $modulo == "firmantes" || $modulo == "sellos" || $modulo == "redactar" || $modulo == "miembros") {
                                                        echo "show";
                                                    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Configuraciones:</h6>
                    <a class="collapse-item <?php if ($modulo == "usuarios") {
                                                echo "active";
                                            } ?>" href="<?php echo $url . "usuarios"; ?>">
                        <i class="fas fa-user-friends"></i>
                        Usuarios
                    </a>

                
                    <?php if ($_SESSION['role'] == 100) {  ?>
                        <h6 class="collapse-header">Backup:</h6>
                        <a class="collapse-item" target="blank" href="<?php echo $url . "../mysql/myphp-backup.php"; ?>">
                            <i class="fas fa-database"></i>
                            Descargar SQL
                        </a>
                    <?php } ?>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php } ?>





    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>