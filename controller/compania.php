<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Compania.php");

    /* TODO: INICIALIZANDO CLASE */
    $compania = new Compania();

    switch($_GET["op"]){

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["com_id"])){
                // PARAMETROS A INGRESAR
                $compania->insert_compania(
                    $_POST["com_nom"]);
            }else{
                // PARAMETROS A ACTUALIZAR
                $compania->update_compania(
                    $_POST["com_id"],
                    $_POST["com_nom"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$compania->get_compania();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["com_nom"];
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

            $datos=$compania->get_compania_x_com_id($_POST["com_id"]);
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["com_id"]  = $row["com_id"];
                    $output["com_nom"] = $row["com_nom"];
                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */ 
        case "eliminar";

            $compania->delete_compania($_POST["com_id"]);

            break;

    }

?>