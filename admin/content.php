<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: optima;"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
</div>



<!-- Content Atencion al Ciudadano -->
<?php if($_SESSION['role'] == 1/* || $_SESSION['role'] > 98*/){ ?>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="atencion/casos/">
            <div class="card shadow h-100 py-2 bg-gradient-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-family: optima;">
                                Casos Sociales</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                <?php echo $countCasos; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="atencion/oficios/" class="text-decoration-none">
            <div class="card bg-gradient-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-family: optima;">
                                Oficios</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                <?php echo $countOficios; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="atencion/personas/" class="text-decoration-none">
            <div class="card bg-gradient-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-family: optima;">Personas
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-white">
                                        <?php echo $countPersonas; ?>
                                    </div>
                                </div>
                                <!--<div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
            <!-- Heading -->
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="atencion/instituciones/" class="text-decoration-none">
            <div class="card bg-gradient-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-family: optima;">
                                Intituciones</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                <?php echo $countInstituciones; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
   


</div>
<?php } ?>





<!-- Content Transporte -->
<?php if($_SESSION['role'] == 3 || $_SESSION['role'] > 98){ ?>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="transporte/guias/">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-family: optima;">
                                Guías</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $countGuias; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="transporte/choferes/" class="text-decoration-none">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-family: optima;">
                                Choferes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $countChoferes; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="transporte/vehiculos/" class="text-decoration-none">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-family: optima;">
                            Vehículos
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php echo $countVehiculos; ?>
                                    </div>
                                </div>
                                <!--<div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
            <!-- Heading -->
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="transporte/empresas/" class="text-decoration-none">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-family: optima;">
                                Empresas
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $countEmpresas; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
   


</div>
<?php } ?>