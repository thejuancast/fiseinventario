<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Trabajador.php");

    /* TODO: INICIALIZANDO CLASE */
    $trabajador = new Trabajador();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["tra_id"])) {
                // PARAMETROS A INGRESAR 
                $trabajador->insert_trabajador(
                    $_POST["emp_id"],
                    $_POST["tra_nom"],
                    $_POST["tra_correo"],
                    $_POST["tra_puesto"],
                    $_POST["tra_area"],
                    $_POST["tra_telf"],
                    $_POST["tra_dni"],
                    $_POST["tra_direcc"]);
            } else {
                // PARAMETROS A ACTUALIZAR
                $trabajador->update_trabajador(
                    $_POST["emp_id"],
                    $_POST["tra_id"],
                    $_POST["tra_nom"],
                    $_POST["tra_correo"],
                    $_POST["tra_puesto"],
                    $_POST["tra_area"],
                    $_POST["tra_telf"],
                    $_POST["tra_dni"],
                    $_POST["tra_direcc"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$trabajador->get_trabajador_x_emp_id($_POST["emp_id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array = $row["tra_nom"];
                $sub_array = $row["tra_correo"];
                $sub_array = $row["tra_puesto"];
                $sub_array = $row["tra_area"];
                $sub_array = $row["tra_telf"];
                $sub_array = $row["tra_dni"];
                $sub_array = $row["tra_direcc"];
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

            $datos=$trabajador->get_trabajador_x_tra_id($_POST["tra_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["emp_id"]     = $row ["emp_id"];
                    $output["tra_id"]     = $row ["tra_id"];
                    $output["tra_nom"]    = $row ["tra_nom"];
                    $output["tra_correo"] = $row ["tra_correo"];
                    $output["tra_puesto"] = $row ["tra_puesto"];
                    $output["tra_area"]   = $row ["tra_area"];
                    $output["tra_telf"]   = $row ["tra_telf"];
                    $output["tra_dni"]    = $row ["tra_dni"];
                    $output["tra_direcc"] = $row ["tra_direcc"];

                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $trabajador->delete_trabajador($_POST["tra_id"]);

            break;

    }

?>