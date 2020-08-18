<?php  

 require_once 'Model/conexion.php';

 class UsuariosModel{
         
          #-----------------------------------------------------------
       #obtener todas usuarios
         public function getUsuariosModel($tabla){
         	
		 	$sql = Conexion::conectar()->prepare("SELECT * FROM empleado");
		 	$sql->execute();
		 	return $sql->fetchAll();
		 	$sql->close();
		 }

      public function ingresarUsuariosModel($datosModel , $tabla){
      	$sql = Conexion::conectar()->prepare("INSERT INTO empleado (rut, nombre , pass, Perfil_idPerfil)VALUES(:rut,:nombre,:pass, :Perfil_idPerfil)");      //revisar ya que aca al ingresar usuario, ingresa, pero no guarda nombre ni contraseña!! observacion: en la numeracion tiene que ir un rut valido, y en el 3 siguiente es el nivel de usuario, se especifica en el formulario.
                                                                                                                                                            //Fixed = se debe modificar directamente tanto como usuarioModel & usuariosController. (ingresarUsuariosController & ingresarUsuariosModel)
        $sql->bindParam(':rut' , $datosModel['rut'] , PDO::PARAM_STR);
        $sql->bindParam(':pass' ,$datosModel['pass'], PDO::PARAM_STR);
      	$sql->bindParam(':nombre' , $datosModel['nombre'] , PDO::PARAM_STR);
      	$sql->bindParam(':Perfil_idPerfil' ,$datosModel['Perfil_idPerfil'], PDO::PARAM_STR);
      	
        if ($sql->execute()) {
      		return 'success';
      	}else{
      		return 'error';
      	}
      	$sql->close();
      }	


      	public function deleteUsuariosModel($datosModel,$tabla){
      $sql = Conexion::conectar()->prepare("DELETE FROM empleado WHERE rut = :rut");

      $sql->bindParam(':rut', $datosModel, PDO::PARAM_INT);

      if ($sql->execute()) {
         return 'success';
      }else{
        return 'Error';
      }

      $sql->close();
    }

   // Codigo Funcionando! (Ya edita)

  public function editarUsuariosModel($datosModel , $tabla){
     $sql = Conexion::conectar()->prepare("UPDATE empleado SET nombre = :nombre, pass = :pass WHERE rut = :rut");

     $sql->bindParam(':nombre',$datosModel['nombre'] ,PDO::PARAM_STR);
     $sql->bindParam(':pass',$datosModel['pass'],PDO::PARAM_STR);
     $sql->bindParam(':rut',$datosModel['rut'],PDO::PARAM_STR);

     if ($sql->execute()) {
       return 'success';
     }else{
      return 'error';
     }

     $sql->close();
  }




 }