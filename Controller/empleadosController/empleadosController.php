<?php
ob_start();

class empleadosController{

	public function platilla(){
		include 'Views/template.php';
	}

	public function getEmpleadosController(){
		$respuesta = EmpleadoModel::getEmpleadosModel('empleado');

		foreach ($respuesta as $row) {
			echo '<tr>
			          <td align="center"> '. $row['rut'].'</td>
			          <td align="center"> '. $row['nombre'].'</td>
			          <td align="center"> '. $row['apellidoPaterno'].'</td>
			          <td align="center"> '. $row['apellidoMaterno'].'</td>
			          <td align="center"> '. $row['telefono'].'</td>
			          <td align="center"> '. $row['sueldo'].'</td>
			          <td align="center"> '. $row['fechaContrato'].'</td>
			          <td align="center"> '. $row['Perfil_idPerfil'].'</td>
			          <td align="center"><a href="index.php?action=editarEmpleados&rut='.$row['rut'].'" <i class="fa fa-edit btn btn-primary btn-sm"></i> </a>
                      <a class="fa fa-trash btn btn-danger  btn-sm" href="index.php?action=borrarEmpleado&idBorrar='.$row['rut'].'" &nbsp;  </a>
              </td>
			     </tr>';
		}
	}

/****************************************************************************************************************************/

    public function agregarEmpleadoController(){
    	if(isset($_POST['agregar'])){
    		$datosController = array("rut"=>$_POST['rut'],
    			                     "pass"=>$_POST['pass'],
    			                     "nombre"=>$_POST['nombre'],
    		                         "apellidoPaterno"=>$_POST['apellidoPaterno'],
    		                         "apellidoMaterno"=>$_POST['apellidoMaterno'],
    		                         "telefono"=>$_POST['telefono'],
    		                         "sueldo"=>$_POST['sueldo'],
    		                         "fechaContrato"=>$_POST['fechaContrato'],
    		                         "Perfil_idPerfil"=>$_POST['Perfil_idPerfil']
    		                         );

    		$respuesta = EmpleadoModel::agregarEmpleadoModel($datosController, 'empleado');
    		if($respuesta == 'sucess'){
    			header('location:okEmpleado');
    		}else{
    			header('location:empleados');
    		}
    	}
    }

/****************************************************************************************************************************/

   public function deleteEmpleadoController(){
   	if(isset($_GET['idBorrar'])){
   		$datosController = $_GET['idBorrar'];

   		$respuesta = EmpleadoModel::deleteEmpleadoModel($datosController, 'empleado');
   		if($respuesta == 'success'){
   			header('location:borrarEmpleado');
   		}
   	}
   }

/****************************************************************************************************************************/

   public function editarEmpleadoController(){
   	$datosController= $_GET['rut'];
   	$respuesta = EmpleadoModel::editarEmpleadoModel($datosController, 'empleado');

   	echo '<form method="post">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Empleado:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombre" value="'.$respuesta['nombre'].'">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="recipient-name" name="apellidoPaterno" value="'.$respuesta['apellidoPaterno'].'">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="recipient-name" name="apellidoMaterno" value="'.$respuesta['apellidoMaterno'].'">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Telefono:</label>
                <input type="number" class="form-control" id="recipient-name" name="telefono" value="'.$respuesta['telefono'].'">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Sueldo:</label>
                <input type="number" class="form-control" id="recipient-name" name="sueldo" value="'.$respuesta['sueldo'].'">
              </div>
            </div>
          </div>

          <input type="hidden" name="rut" value="'.$respuesta['rut'].'">
          <button type="submit" class="btn btn-primary form-control" name="editar">Editar</button>
   	      </form>';
   }

/*******************************************************************************************************************************/

  public function actualizarEmpleadoController(){
  	if(isset($_POST['editar'])){
  		$datosController=array('nombre'=>$_POST['nombre'],
  			                   'apellidoPaterno'=>$_POST['apellidoPaterno'],
  			                   'apellidoMaterno'=>$_POST['apellidoMaterno'],
  			                   'telefono'=>$_POST['telefono'],
  			                   'sueldo'=>$_POST['sueldo'],
  			                   'rut'=>$_POST['rut']
  			                   );
  		$respuesta=EmpleadoModel::actualizarEmpleadoModel($datosController,'empleado');
  		if($respuesta == 'success'){
  			header('location:okEditEmpleado');
  		}
  	}
  }

/*******************************************************************************************************************************/
}



?>