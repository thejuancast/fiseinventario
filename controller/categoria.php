<?php

    /* TODO: LLAMANDO A CLASES RELACIONADAS */
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");

    /* TODO: INICIALIZANDO CLASE */
    $categoria = new Categoria();

    switch($_GET["op"]) {

        /* TODO: | GUARDAR Y EDITAR | SE GUARDA CUANDO EL ID ESTE VACIO, MIENTRAS QUE SE ACTUALIZA CUANDO SE ENVIE EL ID */
        case "guardaryeditar":  
            // IF DONDE DEPENDIENDO DE LO QUE SE RECIBA REALIZARA UNA ACCION    
            if(empty($_POST["cat_id"])) {
                // PARAMETROS A INGRESAR
                $categoria->insert_categoria(
                    $_POST["suc_id"],
                    $_POST["cat_nom"]);
            } else {
                // PARAMETROS A ACTUALIZAR
                $categoria->update_categoria(
                    $_POST["cat_id"],
                    $_POST["suc_id"],
                    $_POST["cat_nom"]);
            }

            break;

        /* TODO: LISTADO DE REGISTROS SEGUN SU SUCURSAL (FORMATO JSON PARA DATATABLE JS) */            
        case "listar":
            $datos=$categoria->get_categoria_x_suc_id($_POST["suc_id"]);
            $data=Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["CAT_NOM"];
                $sub_array[] = $row["FECH_CREA"];
                // BOTONES
                $sub_array[] = '<button type="button" onClick="editar('.$row["CAT_ID"].')" id="'.$row["CAT_ID"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["CAT_ID"].')" id="'.$row["CAT_ID"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';
                
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

            $datos=$categoria->get_categoria_x_cat_id($_POST("cat_id"));
            // EN CASO DE QUE LOS TENGA REGRESAMOS UN JSON
            if(is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row) {
                    $output["CAT_ID"]  = $row ["CAT_ID"];
                    $output["SUC_ID"]  = $row ["SUC_ID"];
                    $output["CAT_NOM"] = $row ["CAT_NOM"];
                }
                // IMPRIMIMOS EL JSON
                echo json_encode($output);
            }
            
            break;

        /* TODO: CAMBIAR EL ESTADO A 0 DEL REGISTRO (ELIMINAR) */        
        case "eliminar":

            $categoria->delete_categoria($_POST["cat_id"]);

            break;

        /* TODO: Listar Combo */
        case "combo";
            $datos=$categoria->get_categoria_x_suc_id($_POST["suc_id"]);
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["CAT_ID"]."'>".$row["CAT_NOM"]."</option>";
                }
                echo $html;
            }
            break;

    }

?>