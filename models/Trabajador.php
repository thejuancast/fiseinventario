<?php

    class Trabajador extends Conectar{

        /* TODO: LISTAR REGISTROS */
        public function get_trabajador_x_emp_id($emp_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_TRABAJADOR_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* TODO: LISTAR REGISTROS POR ID EN ESPECIFICO */
        public function get_trabajador_x_tra_id($tra_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_TRABAJADOR_02 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$tra_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        }

        /* TODO: ELIMINAR O CAMBIAR REGISTROS A ESTADO A ELIMINADO */
        public function delete_trabajador($tra_id) {
            $conectar=parent::Conexion();
            $sql="SP_D_TRABAJADOR_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$tra_id);
            $query->execute();            
        }

        /* TODO: INSERTAR REGISTROS DE DATOS */
        public function insert_trabajador($emp_id,$tra_nom,$tra_correo,$tra_puesto,$tra_area,$tra_telf,$tra_dni,$tra_direcc) {
            $conectar=parent::Conexion();
            $sql="SP_I_TRABAJADOR_01 ?,?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_id);
            $query->bindValue(2,$tra_nom);
            $query->bindValue(3,$tra_correo);
            $query->bindValue(4,$tra_puesto);
            $query->bindValue(5,$tra_area);
            $query->bindValue(6,$tra_telf);
            $query->bindValue(7,$tra_dni);
            $query->bindValue(8,$tra_direcc);
            $query->execute();   
        }

        /* TODO: ACTUALIZAR REGISTROS DE DATOS */
        public function update_trabajador($emp_id,$tra_id,$tra_nom,$tra_correo,$tra_puesto,$tra_area,$tra_telf,$tra_dni,$tra_direcc) {
            $conectar=parent::Conexion();
            $sql="SP_U_TRABAJADOR_01 ?,?,?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_id);
            $query->bindValue(2,$tra_id);
            $query->bindValue(3,$tra_nom);
            $query->bindValue(4,$tra_correo);
            $query->bindValue(5,$tra_puesto);
            $query->bindValue(6,$tra_area);
            $query->bindValue(7,$tra_telf);
            $query->bindValue(8,$tra_dni);
            $query->bindValue(9,$tra_direcc);
            $query->execute(); 
        }

    }

?>