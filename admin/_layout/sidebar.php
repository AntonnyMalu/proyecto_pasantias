<ul class="navbar-nav sidebar sidebar-dark accordion <?php if($modulo == "dashboard"){ echo "toggled"; } ?>" id="accordionSidebar" style="
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

            

           

            <?php if($_SESSION['role'] == 1 || $_SESSION['role'] > 98 ) {  ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Recepción
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link <?php if($modulo != "usuarios"){ echo "collapsed active"; } ?>" href="#" data-toggle="collapse" data-target="#collapseAtencion"
                    aria-expanded="true" aria-controls="collapseAtencion">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Atención al Ciudadano</span>
                </a>
                <div id="collapseAtencion" class="collapse <?php if($modulo == "casos" || $modulo == "oficios" || $modulo == "personas" || $modulo == "instituciones" || $modulo == "miembros"){ echo "show"; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registros:</h6>

                        <a class="collapse-item <?php if($modulo == "casos") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "casos"; }else{ echo "../casos"; } ?>">
                            <i class="fas fa-user-friends"></i>
                            Casos Sociales
                        </a>
                
                        <a class="collapse-item <?php if($modulo == "oficios") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "oficios"; }else{ echo "../oficios"; } ?>">
                            <i class="fas fa-clipboard-list"></i>
                            Oficios
                        </a>

                        <a class="collapse-item <?php if($modulo == "personas") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "personas"; }else{ echo "../personas"; } ?>">
                            <i class="fas fa-user-alt"></i>
                            Personas
                        </a>

                        <a class="collapse-item <?php if($modulo == "instituciones") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "instituciones"; }else{ echo "../instituciones"; } ?>">
                            <i class="fas fa-university"></i>
                            Intituciones
                        </a>
                        
                    </div>
                </div>
            </li>

        
            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php } ?>

            <?php if($_SESSION['role'] > 98 ) {  ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                RRHH
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link <?php if($modulo != "nomina"){ echo "collapsed active"; } ?>" href="#" data-toggle="collapse" data-target="#collapserecursos"
                    aria-expanded="true" aria-controls="collapserecursos">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Recursos Humanos</span>
                </a>
                <div id="collapserecursos" class="collapse <?php if($modulo == "nomina"){ echo "show"; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Carnetización:</h6>
                        <a class="collapse-item <?php if($modulo == "nomina") { echo "active"; } ?>" href="<?php if($modulo == "dashboard") { echo "nomina"; }else{ echo "../nomina"; } ?>">
                            <i class="fas fa-clipboard-list"></i>
                            Nómina
                        </a>
                    </div>
                </div>
            </li>

        
            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php } ?>

            


            <?php if($_SESSION['role'] > 98 ) {  ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
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
                        <?php if($_SESSION['role'] == 100 ) {  ?>
                            <h6 class="collapse-header">Backup:</h6>
                            <a  class="collapse-item" target="blank" href="<?php if($modulo == "dashboard") { echo "../mysql/myphp-backup.php"; }else{ echo "../../mysql/myphp-backup.php"; } ?>">
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