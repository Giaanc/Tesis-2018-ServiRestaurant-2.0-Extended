<?php  

 require_once 'Model/conexion.php';

 class CategoriasModel{
         

/***************************************************************************************************/

       #INGRESAR NUEVAS CATEGORIAS
        public function agregarCategoriasModel($datosModel ,$tabla){
      $sql = Conexion::conectar()->prepare("INSERT INTO  categoria (nombreCategoria) VALUES (:nombrecategoria)");

       $sql->bindParam(':nombrecategoria',$datosModel['nombreCategoria'], PDO::PARAM_STR);

       if ($sql->execute()) {
               return 'success';
            }else{
                return 'error';
            }

      $sql->close();
     }

/***************************************************************************************************/

       #OBTENER TODAS LAS CATEGORIAS
       public function getCategoriasModel($tabla){
         
         $sql = Conexion::conectar()->prepare("SELECT * FROM categoria");
         $sql->execute();
         return $sql->fetchAll();

         $sql->close();

       }

/***************************************************************************************************/

       public function editarCategoriasModel($datosModel,$tabla){
        $sql = Conexion::conectar()->prepare("SELECT * FROM  categoria WHERE idCategoria = :idcategoria");

        $sql->bindParam(':idcategoria',$datosModel,PDO::PARAM_INT);

        $sql->execute();
        return $sql->fetch();

        $sql->close();
       }

/***************************************************************************************************/

      public function actualizarCategoriaModel($datosModel,$tabla){
        $sql= Conexion::conectar()->prepare("UPDATE categoria SET nombreCategoria = :nombreCategoria WHERE idcategoria = :idcategoria");

      $sql->bindParam(':nombreCategoria',$datosModel['nombreCategoria'], PDO::PARAM_STR);
      $sql->bindParam(':idcategoria',$datosModel['idCategoria'], PDO::PARAM_INT);
           
      if($sql->execute()){

             return "success";
      }else{
    
       return  "error";
      }

      $sql->close();
    }

/***************************************************************************************************/

     public function deleteCategoriasModel($datosModel,$tabla){
      $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idcategoria = :idcategoria");

      $sql->bindParam(':idcategoria', $datosModel, PDO::PARAM_INT);

      if ($sql->execute()) {
         return 'success';
      }else{
        return 'Error';
      }

      $sql->close();
    }


 }
?>