<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Empresa.php");

    /* TODO: INICIALIZANDO CLASE */
    $empresa = new Empresa();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["emp_id"])) {
                // PARAMETROS A INGRESAR
                $empresa->insert_empresa(
                    $_POST["com_id"],
                    $_POST["emp_nom"],
                    $_POST["emp_rz"]);
            } else {
                // PARAMETROS A ACTUALIZAR
                $empresa->update_empresa(
                    $_POST["emp_id"],
                    $_POST["com_id"],
                    $_POST["emp_nom"],
                    $_POST["emp_rz"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$empresa->get_empresa_x_com_id($_POST["com_id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array = $row["emp_nom"];
                $sub_array = $row["emp_rz"];
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

            $datos=$empresa->get_empresa_x_emp_id($_POST["emp_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["emp_id"]  = $row ["emp_id"];
                    $output["com_id"]  = $row ["com_id"];
                    $output["emp_nom"] = $row ["emp_nom"];
                    $output["emp_rz"]  = $row ["emp_rz"];

                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $empresa->delete_empresa($_POST["emp_id"]);

            break;

        /* TODO: LISTAR COMBOX */ 
        case "combo":

            $datos=$empresa->get_empresa_x_com_id($_POST["com_id"]);
            if(is_array($datos)==true and count($datos)>0) {
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row) {

                    $html.= "<option value='".$row["EMP_ID"]."'>".$row["EMP_NOM"]."</option>";

            }

            echo $html;

        }

        break;

    }

?>