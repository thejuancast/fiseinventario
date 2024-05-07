<?php

    class Usuario extends Conectar{

        /* TODO: LISTAR REGISTROS */
        public function get_usuario_x_suc_id($suc_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_USUARIO_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* TODO: LISTAR REGISTROS POR ID EN ESPECIFICO */
        public function get_usuario_x_usu_id($usu_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_USUARIO_02 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$usu_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        }

        /* TODO: ELIMINAR O CAMBIAR REGISTROS A ESTADO A ELIMINADO */

        public function delete_usuario($usu_id) {
            $conectar=parent::Conexion();
            $sql="SP_D_USUARIO_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$usu_id);
            $query->execute();            
        }

        /* TODO: INSERTAR REGISTROS DE DATOS */
        public function insert_usuario($suc_id,$rol_id,$usu_correo,$usu_pass,$usu_nom,$usu_ape,$usu_puesto,$usu_area,$usu_dni,$usu_telf) {
            $conectar=parent::Conexion();
            $sql="SP_I_USUARIO_01 ?,?,?,?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$suc_id);
            $query->bindValue(2,$rol_id);
            $query->bindValue(3,$usu_correo);
            $query->bindValue(4,$usu_pass);
            $query->bindValue(5,$usu_nom);
            $query->bindValue(6,$usu_ape);
            $query->bindValue(7,$usu_puesto);
            $query->bindValue(8,$usu_area);
            $query->bindValue(9,$usu_dni);
            $query->bindValue(10,$usu_telf);
            $query->execute();   
        }

        /* TODO: ACTUALIZAR REGISTROS DE DATOS */
        public function update_usuario($usu_id,$suc_id,$rol_id,$usu_correo,$usu_pass,$usu_nom,$usu_ape,$usu_puesto,$usu_area,$usu_dni,$usu_telf) {
            $conectar=parent::Conexion();
            $sql="SP_U_USUARIO_01 ?,?,?,?,?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$usu_id);
            $query->bindValue(2,$suc_id);
            $query->bindValue(3,$rol_id);
            $query->bindValue(4,$usu_correo);
            $query->bindValue(5,$usu_pass);
            $query->bindValue(6,$usu_nom);
            $query->bindValue(7,$usu_ape);
            $query->bindValue(8,$usu_puesto);
            $query->bindValue(9,$usu_area);
            $query->bindValue(10,$usu_dni);
            $query->bindValue(11,$usu_telf);
            $query->execute(); 
        }

        /* TODO: ACCESO AL SISTEMA */
        public function login(){
            $conectar=parent::Conexion();
            if(isset($_POST["enviar"])){
                $sucursal = $_POST["suc_id"];
                $correo   = $_POST["usu_correo"];
                $pass     = $_POST["usu_pass"];

                if(empty($sucursal) and empty($correo) and empty($pass)) {

                    exit();

                } else {
                    $conectar=parent::Conexion();
                    $sql="SP_L_USUARIO_04 ?,?,?";
                    $query=$conectar->prepare($sql);
                    $query->bindValue(1,$sucursal);
                    $query->bindValue(2,$correo);
                    $query->bindValue(3,$pass);
                    $query->execute(); 
                    $resultado = $query->fetch();
                    // EN CASO DE QUE SE TENGA UNA INFORMACION
                    if (is_array($resultado) and count($resultado)>0) {

                        $_SESSION["USU_ID"] = $resultado["USU_ID"];
                        $_SESSION["SUC_ID"] = $resultado["SUC_ID"];
                        $_SESSION["COM_ID"] = $resultado["COM_ID"];
                        $_SESSION["USU_NOM"] = $resultado["USU_NOM"];
                        $_SESSION["USU_APE"] = $resultado["USU_APE"];
                        $_SESSION["USU_CORREO"] = $resultado["USU_CORREO"];

                        header("Location:".Conectar::ruta()."view/home/");

                    } else {   

                        exit();

                    }
                }

            } else {

                exit();

            }
        }

    }

?>