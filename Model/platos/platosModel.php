<?php

require_once 'Model/conexion.php';

class PlatosModel{

	public function agregarPlatosModel($datosModel, $tabla){
		$sql = Conexion::conectar()->prepare("INSERT INTO productos(nombre,costo,descripcion,Categoria_idCategoria,status)
			                                  VALUES(:nombre,:costo,:descripcion,:Categoria_idCategoria,'Activo')");

		$sql->bindParam(':nombre',$datosModel['nombre'], PDO::PARAM_STR);
		$sql->bindParam(':costo',$datosModel['costo'], PDO::PARAM_INT);
		$sql->bindParam(':descripcion',$datosModel['descripcion'], PDO::PARAM_STR);
		$sql->bindParam(':Categoria_idCategoria',$datosModel['Categoria_idCategoria'], PDO::PARAM_INT);

		if($sql->execute()){
			return 'success';
		}else{
			return 'error';
		}
		$sql->close();
	}

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

    public function getPlatosModel($tabla){
    	$sql = Conexion::conectar()->prepare("SELECT * FROM productos where status = 'Activo'");
    	$sql -> execute();
    	return $sql->fetchAll();

    	$sql->close();
    }



/***************************************************************************************************/

    public function editarPlatosModel($datosModel, $tabla){
    	date_default_timezone_set('America/Argentina/Buenos_Aires');
    	$sql = Conexion::conectar()->prepare("SELECT * FROM productos WHERE idProductos = :idProductos");

    	$sql->bindParam(':idProductos', $datosModel,PDO::PARAM_INT);
    	$sql->execute();
    	return $sql->fetch();
    	$sql->close();
    }

/***************************************************************************************************/

    public function actualizarPlatosModel($datosModel,$tabla){
    	$sql = Conexion::conectar()->prepare("UPDATE productos SET nombre = :nombre, costo = :costo, descripcion = :descripcion WHERE idProductos = :idProductos");

    	$sql->bindParam(':nombre',$datosModel['nombre'], PDO::PARAM_STR);
        $sql->bindParam(':costo',$datosModel['costo'], PDO::PARAM_INT);
        $sql->bindParam(':descripcion',$datosModel['descripcion'], PDO::PARAM_STR);
        $sql->bindParam(':idProductos',$datosModel['idProductos'], PDO::PARAM_INT);


		if($sql->execute()){
			return 'success';
		}else{
			return 'error';
		}
		$sql->close();

    }

/***************************************************************************************************/

    public function deletePlatosModel($datosModel,$tabla){
    	$stmt = Conexion::conectar()->prepare("UPDATE productos SET status = 'Inactivo' WHERE idProductos = :idProductos");

    	$stmt->bindParam(':idProductos',$datosModel,PDO::PARAM_INT);
    	if ($stmt->execute()) {
         	return 'success';
      	}else{
        	return 'Error';
      	}

      	$stmt->close();
    }

/***************************************************************************************************/

}






?>