<?php  

 require_once 'Model/conexion.php';

 class ProductosModel{

 	 public function getProductosModel($tabla){
         
         $sql = Conexion::conectar()->prepare("SELECT * FROM insumos");
         $sql->execute();
         return $sql->fetchAll();

         $sql->close();

       }

       


 	public function agregarProductosModel($datosModel,$tabla){
 		$sql = Conexion::conectar()->prepare("INSERT INTO insumos(nombre,stock,costo)
 			VALUES(:nombre,:stock,:costo)");

 		$sql->bindParam(':nombre',$datosModel['nombre'], PDO::PARAM_STR);
 		$sql->bindParam(':stock',$datosModel['stock'],PDO::PARAM_STR);
 		$sql->bindParam(':costo',$datosModel['costo'],PDO::PARAM_STR);

 		if ($sql->execute())  {
 			return 'success';
 		}else{
 			return 'error';
 		}

 		  $sql->close();

 	}

 	
     function actualizarProductosModel($datosModel,$tabla){
        $sql= Conexion::conectar()->prepare("UPDATE insumos SET nombre = :nombre , stock = :stock, costo = :costo WHERE idInsumos = :idInsumos");

      $sql->bindParam(':nombre',$datosModel['nombre'], PDO::PARAM_STR);
      $sql->bindParam(':stock',$datosModel['stock'], PDO::PARAM_INT);
      $sql->bindParam(':costo',$datosModel['costo'], PDO::PARAM_INT);
      $sql->bindParam(':idInsumos',$datosModel['idInsumos'], PDO::PARAM_INT);
           
      if($sql->execute()){

             return "success";
      }else{
    
       return  "error";
      }

      $sql->close();
    }


 	 public function deleteProductosModel($datosModel,$tabla){
      $sql = Conexion::conectar()->prepare("DELETE FROM insumos WHERE idInsumos = :idInsumos");

      $sql->bindParam(':idInsumos', $datosModel, PDO::PARAM_INT);

      if ($sql->execute()) {
         return 'success';
      }else{
        return 'Error';
      }

      $sql->close();
    }

    public function editarProductosModel($datosModel,$tabla){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $sql=Conexion::conectar()->prepare("SELECT * FROM insumos WHERE idInsumos = :idInsumos");
        $sql->bindParam(':idInsumos',$datosModel, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch();
        $sql->close();
     } 

 }
         
