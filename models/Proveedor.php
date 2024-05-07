<?php

    class Proveedor extends Conectar{

        /* TODO: LISTAR REGISTROS */
        public function get_proveedor_x_emp_id($emp_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_PROVEEDOR_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* TODO: LISTAR REGISTROS POR ID EN ESPECIFICO */
        public function get_proveedor_x_prov_id($prov_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_PROVEEDOR_02 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$prov_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        }

        /* TODO: ELIMINAR O CAMBIAR REGISTROS A ESTADO A ELIMINADO */
        public function delete_proveedor($prov_id) {
            $conectar=parent::Conexion();
            $sql="SP_D_PROVEEDOR_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$prov_id);
            $query->execute();            
        }

        /* TODO: INSERTAR REGISTROS DE DATOS */
        public function insert_proveedor($emp_id,$prov_puesto,$prov_area,$prov_nombre,$prov_telf,$prov_direcc,$prov_correo,) {
            $conectar=parent::Conexion();
            $sql="SP_I_PROVEEDOR_01 ?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_id);
            $query->bindValue(2,$prov_puesto);
            $query->bindValue(3,$prov_area);
            $query->bindValue(4,$prov_nombre);
            $query->bindValue(5,$prov_telf);
            $query->bindValue(6,$prov_direcc);
            $query->bindValue(7,$prov_correo);
            $query->execute();   
        }

        /* TODO: ACTUALIZAR REGISTROS DE DATOS */
        public function update_proveedor($prov_id,$emp_id,$prov_puesto,$prov_area,$prov_nombre,$prov_telf,$prov_direcc,$prov_correo) {
            $conectar=parent::Conexion();
            $sql="SP_U_PROVEEDOR_01 ?,?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$prov_id);
            $query->bindValue(2,$emp_id);
            $query->bindValue(3,$prov_puesto);
            $query->bindValue(4,$prov_area);
            $query->bindValue(5,$prov_nombre);
            $query->bindValue(6,$prov_telf);
            $query->bindValue(7,$prov_direcc);
            $query->bindValue(8,$prov_correo);
            $query->execute(); 
        }

    }

?>