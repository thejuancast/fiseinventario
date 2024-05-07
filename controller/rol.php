<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Rol.php");

    /* TODO: INICIALIZANDO CLASE */
    $rol = new Rol();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["rol_id"])) {
                // PARAMETROS A INGRESAR
                $rol->insert_rol(
                    $_POST["suc_id"],
                    $_POST["rol_nom"]);
            } else {
                // PARAMETROS A ACTUALIZAR
                $rol->update_rol(
                    $_POST["rol_id"],
                    $_POST["suc_id"],
                    $_POST["rol_nom"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$rol->get_rol_x_suc_id($_POST["suc_id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array = $row["rol_nom"];
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

            $datos=$rol->get_rol_x_rol_id($_POST["rol_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["rol_id"]  = $row ["rol_id"];
                    $output["suc_id"]  = $row ["suc_id"];
                    $output["rol_nom"] = $row ["rol_nom"];
                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $rol->delete_rol($_POST["rol_id"]);

            break;

    }

?>