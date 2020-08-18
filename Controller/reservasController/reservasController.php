<?php  
ob_start();

class MvcController {

   public function plantilla(){
   	     include 'Views/template.php';
   }

  	#INTERACCIÓN DEL USUARIO
	#----------------------------------------------
	public function enlacesPaginasController(){

		if(isset($_GET["action"])){

		  $enlacesController = $_GET["action"];

		}else{

		   $enlacesController = "index";
			
		}
      // le pide al modelo y que conecte con :: al método y asi heredo la clase y sus metodos y atributos..
		 $respuesta = Paginas::enlacesPaginasModel($enlacesController);
		 require $respuesta;

	}
	//=============================================================================
	//RESERVAS
	//============================================================================
// funcion para devolver todas las reservas.
	 	public function getReservasController(){

	 		date_default_timezone_set('America/Argentina/Buenos_Aires');
	 		$hoy = date('Y-m-d');
 		$respuesta = Datos::getReservasModel('reserva');
 			# code...
 		foreach ($respuesta as $row) {
 			if ($hoy == $row['fechaReservada']) {
	 			echo '<tr>			
					<td align="center"> '.$row["nombreCliente"].'</a></td>
					<td align="center"> '.$row["cantidadPersonas"].'</td>
					<td align="center">'.$row["telefono"].'</td> 
				  <td align="center">'.date("d-m-Y", strtotime($row["fechaReservada"])).'</td>
					<td align="center">'.$row["fechaIngresoReserva"].'</td>
					<td align="center">'.$row["Observaciones"].'</td>		
					<td align="center"><a href="index.php?action=editarReservas&idreserva='.$row["idReserva"].'"<i class="fa fa-edit btn btn-primary btn-sm"></i></a>&nbsp;&nbsp;&nbsp;
					    <a href="index.php?action=reservas&idBorrar='.$row["idReserva"].'"<i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
					</td>
				    </tr>';
 			}
 		}
 		}
 	//insertar reservas
 	public function agregarReservaController(){
         	if(isset($_POST['agregar'])) {
 			$datosController = array("nombrecliente"=>$_POST['nombrecliente'],
 				                     "cantidadpersonas"=>$_POST['cantidadpersonas'],
 				                      "telefono"=>$_POST['telefono'],
 				                      "fechareservada"=>$_POST['fechareservada'],	              
 				                      "fechaingresoreserva"=>$_POST['fechaingresoreserva'],	              
 				                      "observaciones"=>$_POST['observaciones'],
                              "rut_empleado"=>$_POST['rut_empleado'],
                              "idmesa"=>$_POST['idmesa']
 				                                  
 				                     );
 			#pedir la informacion al modelo.
 		
 		$respuesta= Datos::agregarReservasModel($datosController,'reserva');
 			if ($respuesta == 'success') {
 				header('location:okReservas');
 			}else{
                header('location:reservas');
 			}
 		}
 	}

 	//borrar Reservas
   public function deleteReservasController(){
   	 if (isset($_GET['idBorrar'])) {
   	 	$datosController = $_GET['idBorrar'];

   	 	$respuesta = Datos::deleteReservaModel($datosController,'reserva');
   	 	if ($respuesta == 'success') {
         header('location:borrarReservas');
          
   	 	}
   	 }
   }
//cantidad de reservas
   public function totalReservasController(){
   	  $respuesta = Datos::totalReservasModel('reserva');
   	 	foreach ($respuesta as $key ) {
 			 echo $key['total'];
 		}
   	  	
   	  
   }

     public function editarReservasController(){
      	$datosController= $_GET['idreserva'];
	    $respuesta =Datos::editarReservasModel($datosController, 'reserva');

	    echo ' <form method="post">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Cliente:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombrecliente" value="'.$respuesta['nombreCliente'].'">
              </div>
            </div>
               <div class="col-md-6">  
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Cantidad de Personas:</label>
              <input type="text" class="form-control" id="recipient-name" name="cantidadpersonas" value="'.$respuesta['cantidadPersonas'].'">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Telefono de Contacto:</label>
              <input type="text" class="form-control" id="recipient-name" name="telefono"  value="'.$respuesta['telefono'].'">
            </div>
            </div>
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Fecha Reserva (1/10/2017):</label>
              <input type="text" id="datepicker" class="form-control" id="recipient-name" name="fechareservada" value="'.$respuesta['fechaReservada'].'">
            </div>
            </div>
            </div>
             <div class="row">
                <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Hora de Reserva (22:00):</label>
              <input type="text" class="form-control" id="recipient-name" name="fechaingresoreserva" value="'.$respuesta['fechaIngresoReserva'].'">
            </div>
            </div>
              <div class="col-md-6"> 
              <div class="form-group">
              <label for="message-text" class="form-control-label">Observaciones:</label>
              <textarea class="form-control" id="message-text" name="observaciones" required="">'.$respuesta['Observaciones'].'</textarea>
            </div>
            </div>
        </div>
        </div>
        <input type="hidden" name="idreserva" value="'.$respuesta['idReserva'].'">
          <button type="submit" class="btn btn-primary form-control" name="editar">Agregar Reserva</button>
          </form>';
     
    }

    public function actualizarReservasController(){
    	if (isset($_POST['editar'])) {
    		$datosController=array('nombrecliente'=>$_POST['nombrecliente'],
    			                   'cantidadpersonas'=>$_POST['cantidadpersonas'],
    			                   'telefono'=>$_POST['telefono'],
    			                   'fechareservada'=>date("Y-m-d", strtotime($_POST['fechareservada'])),
    			                   'fechaingresoreserva'=>$_POST['fechaingresoreserva'],
    			                   'observaciones'=>$_POST['observaciones'],
    			                   'idreserva'=>$_POST['idreserva']
    			);
    	$respuesta=Datos::actualizarReservasModel($datosController,'reserva');	
    	  	if ($respuesta == 'success') {
      				  header('location:cambioReservas');
      		}
    	}
    }
   //=============================================================================
	//FIN DE RESERVAS
	//============================================================================

}
