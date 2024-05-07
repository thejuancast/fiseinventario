<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Proveedor.php");

    /* TODO: INICIALIZANDO CLASE */
    $proveedor = new Proveedor();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["prov_id"])) {
                // PARAMETROS A INGRESAR 
                $proveedor->insert_proveedor(
                    $_POST["emp_id"],
                    $_POST["prov_puesto"],
                    $_POST["prov_area"],
                    $_POST["prov_nombre"],
                    $_POST["prov_telf"],
                    $_POST["prov_direcc"],
                    $_POST["prov_correo"],);
            } else {
                // PARAMETROS A ACTUALIZAR
                $proveedor->update_proveedor(
                    $_POST["prov_id"],
                    $_POST["emp_id"],
                    $_POST["prov_puesto"],
                    $_POST["prov_area"],
                    $_POST["prov_nombre"],
                    $_POST["prov_telf"],
                    $_POST["prov_direcc"],
                    $_POST["prov_correo"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$proveedor->get_proveedor_x_emp_id($_POST["emp_id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array = $row["prov_puesto"];
                $sub_array = $row["prov_area"];
                $sub_array = $row["prov_nombre"];
                $sub_array = $row["prov_telf"];
                $sub_array = $row["prov_direcc"];
                $sub_array = $row["prov_correo"];
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

            $datos=$proveedor->get_proveedor_x_prov_id($_POST["prov_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["prov_id"]     = $row ["prov_id"];
                    $output["emp_id"]      = $row ["emp_id"];
                    $output["prov_puesto"] = $row ["prov_puesto"];
                    $output["prov_area"]   = $row ["prov_area"];
                    $output["prov_nombre"] = $row ["prov_nombre"];
                    $output["prov_telf"]   = $row ["prov_telf"];
                    $output["prov_direcc"] = $row ["prov_direcc"];
                    $output["prov_correo"] = $row ["prov_correo"];
                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $proveedor->delete_proveedor($_POST["prov_id"]);

            break;

    }

?>