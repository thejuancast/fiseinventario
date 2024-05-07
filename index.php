<?php
    require_once("config/conexion.php");

    if(isset($_POST["enviar"]) and $_POST["enviar"]=="si") {
        require_once("models/Usuario.php");
        $usuario = new Usuario();
        $usuario->login();
    }
?>

<!DOCTYPE html>
<html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FISEInventario - Iniciar Sesión</title>

    <!-- ICONO DE LA APLICACION (LOGOTIPO) -->
    <link rel="shortcut icon" href="assets/images/logo-fisei.png">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- ESTILOS CSS -->

    <!-- LAYOUT CONFIG JS -->
    <script src="assets/js/layout.js"></script>
    <!-- APP CSS -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- ICONS CSS -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- CUSTOM CSS -->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- BOOTSTRAP CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

</head>

<body  >

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">

        <div class="bg-overlay"></div>

        <!-- CONTENIDO DE LA PAGINA DE AUTENTICACION -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0">
                            <div class="row justify-content-center g-0">

                                <!-- PANEL IZQUIERDO CON LOGOTIPO Y MENSAJES -->
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">

                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <!-- CAROUSEL DE MENSAJES -->
                                                <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <!-- MENSAJES DEL CARUCEL (PREGUNTAR SI QUIEREN MENSAJES ESPECIFICOS) -->
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" Evita la utilización de herramientas o equipos defectuosos. "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Mantén tus herramientas en buen estado y úsalas correctamente. "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" La seguridad no se logra por accidente. "</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- FIN DE CAROUSEL DE MENSAJES -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- PANEL DERECHO CON FORMULARIO DE INICIO DE SESION -->
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Bienvenido!</h5>
                                            <p class="text-muted">Ingresar a FISEInventario</p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="" method="post" id="login_form">
                                            <!-- CAMPOS DEL FORMULARIO -->

                                                <div class="mb-3">
                                                    <label for="emp_id" class="form-label">Empresa</label>
                                                    <select type="text" class="form-control form-select" name="emp_id" id="emp_id" aria-label="Seleccionar">
                                                        <option selected>Seleccionar</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="suc_id" class="form-label">Sucursal</label>
                                                    <select type="text" class="form-control form-select" name="suc_id" id="suc_id" aria-label="Seleccionar">
                                                        <option selected>Seleccionar</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="usu_correo" class="form-label">Correo Electrónico<span class="text-danger"> *</span></label>
                                                    <input type="email" class="form-control" name="usu_correo" id="usu_correo" placeholder="Ingrese Correo Electrónico" required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingresé su correo electrónico.
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="auth-pass-reset-cover.html" class="text-muted">¿Olvido la Contraseña?</a>
                                                    </div>

                                                    <label class="form-label" for="usu_pass">Contraseña<span class="text-danger"> *</span></label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" class="form-control pe-5" placeholder="Ingrese Contraseña" name="usu_pass" id="usu_pass">
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <div class="invalid-feedback">
                                                            Por favor, ingresé su contraseña.
                                                        </div>
                                                    </div>

                                                    <br>
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                        <label class="form-check-label" for="auth-remember-check">Recuerdame</label>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <input type="hidden" name="enviar" class="form-control" value="si">
                                                    <button class="btn btn-success w-100" type="submit">Iniciar Sesión</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- FIN DEL CONTENIDO DE LA PAGINA DE AUTENTICACION -->

        <!-- PIE DE PAGINA -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">
                                <a href="https://fiseidelnorte.com/inicio" target="_blank" style="color:white;">
                                    Copyright &copy; <script>document.write(new Date().getFullYear())</script> FISEI del Norte S.A. de C.V.
                                </a>
                                - Todos los derechos reservados.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FIN DEL PIE DE PAGINA -->
    </div>
    <!-- FIN DEL CONTENEDOR PRINCIPAL -->

    <!-- SCRIPTS JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <!-- <script src="assets/js/plugins.js"></script> -->

    <!-- INICIALIZACION DE LA VALIDACION DE FORMULARIOS -->
    <script src="assets/js/pages/password-addon.init.js"></script>
    <!-- INICIALIZACION DE LA CREACION DE CONTRASEÑAS -->
    <script src="assets/js/pages/passowrd-create.init.js"></script>
    
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- INICIALIZACION EL ARCHIVO JS DE INDEX (SIEMPRE DEBE DE IR AL ULTIMO) -->
    <script type="text/javascript" src="index.js"></script>
    
</body>

</html>