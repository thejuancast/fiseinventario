<?php

    class Producto extends Conectar{

        /* TODO: LISTAR REGISTROS */
        public function get_producto_x_suc_id($suc_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_PRODUCTO_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* TODO: LISTAR REGISTROS POR ID EN ESPECIFICO */
        public function get_producto_x_prod_id($prod_id) {
            $conectar=parent::Conexion();
            $sql="SP_L_PRODUCTO_02 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$prod_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        }

        /* TODO: ELIMINAR O CAMBIAR REGISTROS A ESTADO A ELIMINADO */
        public function delete_producto($prod_id) {
            $conectar=parent::Conexion();
            $sql="SP_D_PRODUCTO_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$prod_id);
            $query->execute();            
        }

        /* TODO: INSERTAR REGISTROS DE DATOS */
        public function insert_producto($suc_id,$cat_id,$und_id,$mon_id,$prod_nom,$prod_descrip,$prod_precio,$prod_stock,$prod_fechaven,$prod_img) {
            $conectar=parent::Conexion();
            $sql="SP_I_PRODUCTO_01 ?,?,?,?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$suc_id);
            $query->bindValue(2,$cat_id);
            $query->bindValue(3,$und_id);
            $query->bindValue(4,$mon_id);
            $query->bindValue(5,$prod_nom);
            $query->bindValue(6,$prod_descrip);
            $query->bindValue(7,$prod_precio);
            $query->bindValue(8,$prod_stock);
            $query->bindValue(9,$prod_fechaven);
            $query->bindValue(10,$prod_img);
            $query->execute();   
        }

        /* TODO: ACTUALIZAR REGISTROS DE DATOS */
        public function update_producto($prod_id,$suc_id,$cat_id,$und_id,$mon_id,$prod_nom,$prod_descrip,$prod_precio,$prod_stock,$prod_fechaven,$prod_img) {
            $conectar=parent::Conexion();
            $sql="SP_U_PRODUCTO_01 ?,?,?,?,?,?,?,?,?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$prod_id);
            $query->bindValue(2,$suc_id);
            $query->bindValue(3,$cat_id);
            $query->bindValue(4,$und_id);
            $query->bindValue(5,$mon_id);
            $query->bindValue(6,$prod_nom);
            $query->bindValue(7,$prod_descrip);
            $query->bindValue(8,$prod_precio);
            $query->bindValue(9,$prod_stock);
            $query->bindValue(10,$prod_fechaven);
            $query->bindValue(11,$prod_img);
            $query->execute(); 
        }

    }

?>