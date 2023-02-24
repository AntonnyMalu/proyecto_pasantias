<ul class="navbar-nav sidebar sidebar-dark accordion <?php if($modulo != "usuarios" && $modulo != "firmantes"){ echo "toggled"; } ?>" id="accordionSidebar" style="background: rgba(14,87,17,25);
background: linear-gradient(0deg, rgba(208,200,25,1) -20%, rgba(14,87,17,1) 24%);">

            <!-- Sidebar - Brand -->
                <?php
                if($modulo == "dashboard") {
                    $url = "../";
                }else{
                    $url = "../";
                }
                ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $url; ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laugh-wink"></i>
                
                </div>
                <div class="sidebar-brand-text mx-3"><h5 style="font-family: verdana;">ALGUARISA</h5></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($modulo == "dashboard") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") {  }else{ echo "../"; } ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <!-- Nav Item - Agendas -->
             <li class="nav-item <?php if($modulo == "casos" || $modulo== "despacho") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") { echo "casos"; }else{ echo "../casos"; } ?>">
                    <i class="fas fa-users"></i>
                    <span>Casos Sociales</span></a>
            </li>

    

            <!-- Nav Item - Resoluciones -->
            <li class="nav-item <?php if($modulo == "oficios") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") { echo "oficios"; }else{ echo "../oficios"; } ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Oficios</span></a>
            </li>

            <!-- Nav Item - Resoluciones -->
            <li class="nav-item <?php if($modulo == "personas") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") { echo "personas"; }else{ echo "../personas"; } ?>">
                    <i class="fas fa-user-alt"></i>
                    <span>Personas</span></a>
            </li>

            <li class="nav-item <?php if($modulo == "instituciones") { echo "active"; } ?>">
                <a class="nav-link" href="<?php if($modulo == "dashboard") { echo "instituciones"; }else{ echo "../instituciones"; } ?>">
                    <i class="fas fa-university"></i>
                    <span>Intituciones</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">


            <?php if($_SESSION['role'] > 0) {  ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                ADMIN
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link <?php if($modulo != "usuarios"){ echo "collapsed active"; } ?>" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Configuracion</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if($modulo == "usuarios" || $modulo == "firmantes" || $modulo == "sellos" || $modulo == "redactar" || $modulo == "miembros"){ echo "show"; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Configuraciones:</h6>
                        <a class="collapse-item <?php if($modulo == "usuarios") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "usuarios"; }else{ echo "../usuarios"; } ?>">
                            <i class="fas fa-user-friends"></i>
                            Usuarios
                        </a>
                
                        <a class="collapse-item <?php if($modulo == "firmantes") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "firmantes"; }else{ echo "../firmantes"; } ?>">
                            <i class="fas fa-pen-fancy"></i>
                            Firmantes
                        </a>

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