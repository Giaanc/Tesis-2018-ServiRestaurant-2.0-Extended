<?php

require_once "conexion.php";

class RecetaModel{

	public function agregarRecetaModel($datosmodel, $tabla){
        $sql = Conexion::conectar()->prepare("INSERT INTO receta(medida,Productos_idProductos,Insumos_idInsumos)
                                              VALUES(:medida,:Productos_idProductos,:Insumos_idInsumos)");

        $sql->bindParam(':medida',$datosModel['medida'], PDO::PARAM_INT);
        $sql->bindParam(':Productos_idProductos',$datosModel['Productos_idProductos'], PDO::PARAM_INT);
        $sql->bindParam(':Insumos_idInsumos',$datosModel['Insumos_idInsumos'], PDO::PARAM_INT);

        if($sql->execute()){
            return 'success';
        }else{
            return 'error';
        }
        $sql->close();
    }

/***************************************************************************************************/

    public function getRecetaModel($tabla){
        $sql = Conexion::conectar()->prepare("SELECT * FROM receta");
        $sql -> execute();
        return $sql->fetchAll();

        $sql->close();
    }

}
?>