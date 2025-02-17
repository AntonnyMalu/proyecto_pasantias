<?php 
// start a session
session_start();
require "../_layout/flash_message.php";
$modulo = "login";
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Login</title>
        <?php require "../_layout/cargar_css.php"; ?>

        <!--Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">


        <style>
            @media (min-width: 768px) {
                #scale {
                    transform: scale(0.8); /* Reduce el tamaño al 80% */
                }
            }
            *{
                font-family: "Poppins", sans-serif;
                font-weight: 400;
                font-style: normal;
            }

            .text_title{
                color: rgba(8,23,44,1);
                font-weight: bold;
            }


            .gradient-custom-2 {
                /* fallback for old browsers */
                background: rgb(18,58,108);

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-radial-gradient(circle, rgba(18,58,108,1) 0%, rgba(8,23,44,1) 100%);

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: radial-gradient(circle, rgba(18,58,108,1) 0%, rgba(8,23,44,1) 100%);
            }

            @media (min-width: 768px) {
                .gradient-form {
                    height: 100vh !important;
                }
            }
            @media (min-width: 769px) {
                .gradient-custom-2 {
                    border-top-right-radius: .3rem;
                    border-bottom-right-radius: .3rem;
                }
            }


            .gobernacion{
                display: block;
                position: absolute;
                height: 80px;
                width: 80px;
                right: 3%;
                top: 3%;
            }

            .gobernacion_start{
                display: block;
                position: absolute;
                height: 100px;
                width: 100px;
                left: 3%;
                top: 3%;
            }
        </style>

        <style>
            /* styles.css */
            #preloader {
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background: #fff no-repeat center center;
                z-index: 9999;
            }

            #preloader::before {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100px;
                height: 100px;
                /*background: url('https://tecnologia.alguarisa.com/laravel/public/img/logo_alguarisa.png') no-repeat center center;*/
                background: url('../../img/preloader_171x171.png') no-repeat center center;
                background-size: contain;
                transform: translate(-50%, -50%);
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% {
                    transform: translate(-50%, -50%) scale(1);
                }
                50% {
                    transform: translate(-50%, -50%) scale(1.2);
                }
                100% {
                    transform: translate(-50%, -50%) scale(1);
                }
            }

        </style>

        <script type="application/javascript">
            //Script para ejecurar el preloader
            window.addEventListener('load', function() {
                document.querySelector('#preloader').style.display = 'none';
                document.querySelector('.container').style.display = 'block';
            });
        </script>

    </head>
    <body>

    <div id="preloader"></div>

    <section class="bg-light p-3 p-md-4 p-xl-5 position-relative" style="min-height: 100vh;">
        <div class="container  position-absolute top-50 start-50 translate-middle">
            <div id="scale" class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">

                            <div class="col-12 col-md-6 d-none d-lg-flex gradient-custom-2">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-fill" loading="lazy"
                                     src="../../img/logo_tecnologia.png" alt="Logo tecnologia">
                            </div>


                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">

                                        <img class="gobernacion_start d-sm-none" src="../../img/logo-gobernacion.svg" alt="Logo Gobernacion">

                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <a href="">
                                                    <img class="img-fluid d-none d-lg-inline-flex w-50 mb-3" src="../../img/logo_gobernacion.svg" alt="Logo Gobernacion">
                                                    <img class="img-fluid d-lg-none mt-5 mb-5" src="../../img/logo_alguarisa.png" alt="Logo Alguarisa">
                                                </a>
                                            </div>
                                        </div>

                                        <form method="POST" class="user" action="login.php" novalidate>
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="form-floating mb-2 has-validation">
                                                        <input id="email" type="email" class="form-control" name="email"  placeholder="name@example.com" required>
                                                        <label for="email" class="form-label">Correo electrónico</label>
                                                        <div class="invalid-feedback" id="error_email">
                                                            Por favor ingrese su Correo electrónico.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-2 has-validation">
                                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                                        <label for="password" class="form-label">Contraseña</label>
                                                        <div class="invalid-feedback" id="error_password">
                                                            Por favor ingrese su Contraseña.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <input type="hidden" name="opcion" value="login">
                                                        <button class="btn btn-dark btn-lg gradient-custom-2" type="submit">
                                                            Iniciar sesión
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <?php
                                            display_flash_message();
                                            ?>
                                            <div class="position-absolute top-50 start-50 translate-middle d-none verCargando">
                                                <div class="spinner-border" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                    <a href="../forgot-password" class="link-secondary text-decoration-none">
                                                        ¿Olvidó su contraseña?
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-center mt-5">
                                                <small class="link-secondary text-decoration-none">
                                                    &copy; 2024 Dirección de Tecnología y Sistemas.
                                                </small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <?php /*require 'content.php'; */?>
        <?php /*require "../_layout/cargar_js.php"; */?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>