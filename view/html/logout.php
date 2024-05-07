<?php
    require_once("../../config/conexion.php");
    // SE CONCATENA LA COMPAÑIA
    header("Location:".Conectar::ruta()."?c=".$_SESSION["COM_ID"]);
    /* TODO: DESTRUIR SESION */
    session_destroy();
    exit();
?>