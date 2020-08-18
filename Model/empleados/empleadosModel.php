<?php
     
     require_once 'Model/conexion.php';

    class EmpleadoModel{

     	public function getEmpleadosModel($tabla){
     		$sql = Conexion::conectar()->prepare("SELECT * FROM empleado WHERE status = 'Activo'");
     		$sql->execute();
     		return $sql->fetchAll();

     		$sql->close();
     	}

/***************************************************************************************************/

        public function agregarEmpleadoModel($datosModel, $tabla){
        	$sql = Conexion::conectar()->prepare("INSERT INTO empleado(rut,pass,nombre,apellidoPaterno,apellidoMaterno,telefono,sueldo,fechaContrato,Perfil_idPerfil,status)
        		                                  VALUES(:rut,:pass,:nombre,:apellidoPaterno,:apellidoMaterno,:telefono,:sueldo,:fechaContrato,:Perfil_idPerfil,'Activo')");

        	$sql->bindParam(':rut',$datosModel['rut'], PDO::PARAM_STR);
        	$sql->bindParam(':pass',$datosModel['pass'], PDO::PARAM_STR);
        	$sql->bindParam(':nombre',$datosModel['nombre'], PDO::PARAM_STR);
        	$sql->bindParam(':apellidoPaterno',$datosModel['apellidoPaterno'], PDO::PARAM_STR);
        	$sql->bindParam(':apellidoMaterno',$datosModel['apellidoMaterno'], PDO::PARAM_STR);
        	$sql->bindParam(':telefono',$datosModel['telefono'], PDO::PARAM_INT);
        	$sql->bindParam(':sueldo',$datosModel['sueldo'], PDO::PARAM_INT);
        	$sql->bindParam(':fechaContrato',$datosModel['fechaContrato'], PDO::PARAM_STR);
        	$sql->bindParam(':Perfil_idPerfil',$datosModel['Perfil_idPerfil'], PDO::PARAM_INT);

        	if ($sql->execute()) {
               return 'success';
            }else{
                return 'error';
            }

            $sql->close();
        }

/****************************************************************************************************/

        public function deleteEmpleadoModel($datosModel,$tabla){
        	$stmt = Conexion::conectar()->prepare("UPDATE empleado SET status = 'Inactivo' WHERE rut = :rut");

        	$stmt->bindParam(':rut',$datosModel,PDO::PARAM_INT);

        	if ($stmt->execute()) {
         		return 'success';
      		}else{
        		return 'Error';
      		}

      		$stmt->close();
        }

/******************************************************************************************************/

		public function actualizarEmpleadoModel($datosModel,$tabla){
			$sql=Conexion::conectar()->prepare("UPDATE empleado SET nombre=:nombre, apellidoPaterno=:apellidoPaterno, apellidoMaterno=:apellidoMaterno, telefono=:telefono, sueldo=:sueldo WHERE rut=:rut");

        	$sql->bindParam(':nombre',$datosModel['nombre'], PDO::PARAM_STR);
        	$sql->bindParam(':apellidoPaterno',$datosModel['apellidoPaterno'], PDO::PARAM_STR);
        	$sql->bindParam(':apellidoMaterno',$datosModel['apellidoMaterno'], PDO::PARAM_STR);
        	$sql->bindParam(':telefono',$datosModel['telefono'], PDO::PARAM_INT);
        	$sql->bindParam(':sueldo',$datosModel['sueldo'], PDO::PARAM_INT);
        	$sql->bindParam(':rut',$datosModel['rut'], PDO::PARAM_STR);
        /*	$sql->bindParam(':fechaContrato',$datosModel['fechaContrato'], PDO::PARAM_STR);
        	$sql->bindParam(':status',$datosModel['status'], PDO::PARAM_STR);
        	$sql->bindParam(':Perfil_idPerfil',$datosModel['Perfil_idPerfil'], PDO::PARAM_INT);*/

        	if($sql->execute()){
				 return "success";
			}else{
				return  "error";
			}
			$sql->close();
        }

/******************************************************************************************************/

		public function editarEmpleadoModel($datosModel,$tabla){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$sql=Conexion::conectar()->prepare("SELECT * FROM empleado WHERE rut = :rut");
			$sql->bindParam(':rut',$datosModel, PDO::PARAM_INT);
   		    $sql->execute();
            return $sql->fetch();
            $sql->close();
		}





	}

?>