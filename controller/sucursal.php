<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Sucursal.php");

    /* TODO: INICIALIZANDO CLASE */
    $sucursal = new Sucursal();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["suc_id"])) {
                // PARAMETROS A INGRESAR
                $sucursal->insert_sucursal(
                    $_POST["emp_id"],
                    $_POST["suc_nom"]);
            } else {
                // PARAMETROS A ACTUALIZAR
                $sucursal->update_sucursal(
                    $_POST["suc_id"],
                    $_POST["emp_id"],
                    $_POST["suc_nom"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$sucursal->get_sucursal_x_emp_id($_POST["emp_id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array = $row["suc_nom"];
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

            $datos=$sucursal->get_sucursal_x_suc_id($_POST["suc_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["suc_id"]  = $row ["suc_id"];
                    $output["emp_id"]  = $row ["emp_id"];
                    $output["suc_nom"] = $row ["suc_nom"];
                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $sucursal->delete_sucursal($_POST["suc_id"]);

            break;

        /* TODO: LISTAR COMBOX */ 
        case "combo":

            $datos=$sucursal->get_sucursal_x_emp_id($_POST["emp_id"]);
            if(is_array($datos)==true and count($datos)>0) {
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row) {

                    $html.= "<option value='".$row["SUC_ID"]."'>".$row["SUC_NOM"]."</option>";

            }

            echo $html;

        }

        break;

    }

?>