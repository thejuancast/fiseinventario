<?php
    require_once("../../config/conexion.php");
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <title>Mantenimiento Unidad de Medida</title>
    <?php require_once("../html/head.php"); ?>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

    <?php require_once("../html/menu.php"); ?>
    <?php require_once("../html/header.php"); ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Unidad de Medida</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mantenimiento</a></li>
                                        <li class="breadcrumb-item active">Unidad de Medida</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once("../html/footer.php"); ?>
        </div>
    </div>
    <?php require_once("../html/js.php"); ?>
</body>
</html>