<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Producto.php");

    /* TODO: INICIALIZANDO CLASE */
    $producto = new Producto();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["prod_id"])) {
                // PARAMETROS A INGRESAR
                $producto->insert_producto(
                    $_POST["suc_id"],
                    $_POST["cat_id"],
                    $_POST["und_id"],
                    $_POST["mon_id"],
                    $_POST["prod_nom"],
                    $_POST["prod_descrip"],
                    $_POST["prod_precio"],
                    $_POST["prod_stock"],
                    $_POST["prod_fechaven"],
                    $_POST["prod_img"]);
            } else {
                // PARAMETROS A ACTUALIZAR
                $producto->update_producto(
                    $_POST["prod_id"],
                    $_POST["suc_id"],
                    $_POST["cat_id"],
                    $_POST["und_id"],
                    $_POST["mon_id"],
                    $_POST["prod_nom"],
                    $_POST["prod_descrip"],
                    $_POST["prod_precio"],
                    $_POST["prod_stock"],
                    $_POST["prod_fechaven"],
                    $_POST["prod_img"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$producto->get_producto_x_suc_id($_POST["suc _id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array = $row["prod_nom"];
                $sub_array = $row["prod_descrip"];
                $sub_array = $row["prod_precio"];
                $sub_array = $row["prod_stock"];
                $sub_array = $row["prod_fechaven"];
                $sub_array = $row["prod_img"];
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

            $datos=$producto->get_producto_x_prod_id($_POST["prod_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["prod_id"]       = $row ["prod_id"];
                    $output["suc_id"]        = $row ["suc_id"];
                    $output["cat_id"]        = $row ["cat_id"];
                    $output["und_id"]        = $row ["und_id"];
                    $output["mon_id"]        = $row ["mon_id"];
                    $output["prod_nom"]      = $row ["prod_nom"];
                    $output["prod_descrip"]  = $row ["prod_descrip"];
                    $output["prod_precio"]   = $row ["prod_precio"];
                    $output["prod_stock"]    = $row ["prod_stock"];
                    $output["prod_fechaven"] = $row ["prod_fechaven"];
                    $output["prod_img"]      = $row ["prod_img"];

                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $producto->delete_producto($_POST["prod_id"]);

            break;

    }

?>