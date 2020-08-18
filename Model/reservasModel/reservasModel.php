<?php 

require_once 'Model/conexion.php';

 class Datos{
       
       #-----------------------------------------------------------
       #obtener todas reservas
 	 	public function getReservasModel( $tabla){
 	 		$sql=Conexion::conectar()->prepare("SELECT *  FROM reserva  ORDER BY fechaReservada asc ");
 	 		$sql->execute();
 	 		return $sql->fetchAll();
 	 		$sql->close();
 	 	} 

 	 // agregar Reservas
 	 public function agregarReservasModel($datosModel,$tabla){
 	 	  $stmt = Conexion::conectar()->prepare("INSERT INTO reserva(nombreCliente,cantidadPersonas,telefono,fechaReservada,fechaIngresoReserva,Observaciones,Empleado_rut,Mesas_idMesas)
 	 	  	VALUES(:nombrecliente,:cantidadpersonas,:telefono,:fechareservada,:fechaingresoreserva,:observaciones,:rut_empleado,:idmesa)");

            $stmt->bindParam(':nombrecliente',$datosModel['nombrecliente'], PDO::PARAM_INT);
            $stmt->bindParam(':cantidadpersonas',$datosModel['cantidadpersonas'],PDO::PARAM_STR);
            $stmt->bindParam(':telefono',$datosModel['telefono'], PDO::PARAM_STR);
            $stmt->bindParam(':fechareservada',$datosModel['fechareservada'], PDO::PARAM_STR);
            $stmt->bindParam(':fechaingresoreserva',$datosModel['fechaingresoreserva'], PDO::PARAM_STR);
            $stmt->bindParam(':observaciones',$datosModel['observaciones'], PDO::PARAM_STR);
            $stmt->bindParam(':rut_empleado',$datosModel['rut_empleado'], PDO::PARAM_STR);
            $stmt->bindParam(':idmesa',$datosModel['idmesa'], PDO::PARAM_STR);
           
            if ($stmt->execute()) {
               return 'success';
            }else{
                return 'error';
            }

            $stmt->close();
 	 }	

 	 	public function deleteReservaModel($datosModel,$tabla){
      $stmt = Conexion::conectar()->prepare("DELETE FROM reserva WHERE idreserva = :idreserva");

      $stmt->bindParam(':idreserva', $datosModel, PDO::PARAM_INT);

      if ($stmt->execute()) {
         return 'success';
      }else{
        return 'Error';
      }

      $stmt->close();
    }
     
     public function totalReservasModel($tabla){
      date_default_timezone_set('America/Argentina/Buenos_Aires');
          $fecha = date('Y-m-d').'<br>';
         $sql=Conexion::conectar()->prepare("SELECT * , COUNT(*) as total FROM reserva WHERE fechaReservada >= '$fecha'");
         $sql->execute();
         return $sql->fetchAll();
         $sql->close();
      }

     public function editarReservasModel($datosModel,$tabla){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $sql=Conexion::conectar()->prepare("SELECT * FROM reserva WHERE idreserva = :idreserva");
        $sql->bindParam(':idreserva',$datosModel, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch();
        $sql->close();
     } 

         function actualizarReservasModel($datosModel,$tabla){
      $sql=Conexion::conectar()->prepare("UPDATE reserva SET nombrecliente = :nombrecliente,
       cantidadpersonas = :cantidadpersonas, telefono=:telefono,fechareservada=:fechareservada,fechaingresoreserva=:fechaingresoreserva,observaciones=:observaciones WHERE idreserva = :idreserva");

      $sql->bindParam(':nombrecliente',$datosModel['nombrecliente'], PDO::PARAM_STR);
      $sql->bindParam(':cantidadpersonas',$datosModel['cantidadpersonas'], PDO::PARAM_STR);
      $sql->bindParam(':telefono',$datosModel['telefono'], PDO::PARAM_STR);
      $sql->bindParam(':fechareservada',$datosModel['fechareservada'], PDO::PARAM_STR);
      $sql->bindParam(':fechaingresoreserva',$datosModel['fechaingresoreserva'], PDO::PARAM_STR);
      $sql->bindParam(':observaciones',$datosModel['observaciones'], PDO::PARAM_STR);
      $sql->bindParam(':idreserva',$datosModel['idreserva'], PDO::PARAM_STR);
           
      if($sql->execute()){

             return "success";
      }else{
    
       return  "error";
      }

      $sql->close();
    }

 }




