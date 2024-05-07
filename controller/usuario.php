<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");

    /* TODO: INICIALIZANDO CLASE */
    $usuario = new Usuario();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["usu_id"])) {
                // PARAMETROS A INGRESAR 
                $usuario->insert_usuario(
                    $_POST["suc_id"],
                    $_POST["rol_id"],
                    $_POST["usu_correo"],
                    $_POST["usu_pass"],
                    $_POST["usu_nom"],
                    $_POST["usu_ape"],
                    $_POST["usu_puesto"],
                    $_POST["usu_area"],
                    $_POST["usu_dni"],
                    $_POST["usu_telf"]);
            } else {
                // PARAMETROS A ACTUALIZAR
                $usuario->update_usuario(
                    $_POST["usu_id"],
                    $_POST["suc_id"],
                    $_POST["rol_id"],
                    $_POST["usu_correo"],
                    $_POST["usu_pass"],
                    $_POST["usu_nom"],
                    $_POST["usu_ape"],
                    $_POST["usu_puesto"],
                    $_POST["usu_area"],
                    $_POST["usu_dni"],
                    $_POST["usu_telf"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$usuario->get_usuario_x_suc_id($_POST["suc_id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array = $row["usu_correo"];
                $sub_array = $row["usu_pass"];
                $sub_array = $row["usu_nom"];
                $sub_array = $row["usu_ape"];
                $sub_array = $row["usu_puesto"];
                $sub_array = $row["usu_area"];
                $sub_array = $row["usu_dni"];
                $sub_array = $row["usu_telf"];
                $sub_array = $row["fech_crea"];

                // BOTONES
                $sub_array = "Editar";
                $sub_array = "Eliminar";

                $data[] = $sub_array;
            }

            $results = array(
                // CONTAR CUANTA INFORMACION
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                // CONTAR LOS REGISTROS
                "iTotalDisplayRecords"=>count($data),
                // CONTAR CUANTOS REGISTROS
                "aaData"=>$data);

            // IMPRIMIR EN UN JSON
            echo json_encode($results);

            break;

        /* TODO: MOSTRAR INFORMACION DE REGISTROS SEGUN SU ID */ 
        case "mostrar":

            $datos=$usuario->get_usuario_x_usu_id($_POST["usu_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["usu_id"]     = $row ["usu_id"];
                    $output["suc_id"]     = $row ["suc_id"];
                    $output["rol_id"]     = $row ["rol_id"];
                    $output["usu_correo"] = $row ["usu_correo"];
                    $output["usu_pass"]   = $row ["usu_pass"];
                    $output["usu_nom"]    = $row ["usu_nom"];
                    $output["usu_ape"]    = $row ["usu_ape"];
                    $output["usu_puesto"] = $row ["usu_puesto"];
                    $output["usu_area"]   = $row ["usu_area"];
                    $output["usu_dni"]    = $row ["usu_dni"];
                    $output["usu_telf"]   = $row ["usu_telf"];
                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $usuario->delete_usuario($_POST["usu_id"]);

            break;

    }

?>