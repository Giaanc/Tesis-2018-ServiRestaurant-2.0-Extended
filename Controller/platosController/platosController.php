<?php

ob_start();

class PlatosController{

	public function platilla(){
		include 'Views/template.php';
	}

/*************************************************************************************************************/

    public function getPlatosController(){
    	$respuesta = PlatosModel::getPlatosModel('productos');

    	foreach ($respuesta as $row){
    		echo '<tr>
			          <td align="center"> '. $row['idProductos'].'</td>
			          <td align="center"> '. $row['nombre'].'</td>
			          <td align="center"> '. $row['costo'].'</td>
			          <td align="center"> '. $row['descripcion'].'</td>
			          <td align="center"> '. $row['Categoria_idCategoria'].'</td>
			          <td align="center"><a href="index.php?action=editarPlatos&idProductos='.$row['idProductos'].'" <i class="fa fa-edit btn btn-primary btn-sm"></i> </a><a class="fa fa-trash btn btn-danger  btn-sm" href="index.php?action=borrarPlatos&idBorrar='.$row['idProductos'].'" &nbsp;  </a>
                      </td>

                      <td align="center"><a href="index.php?action=mostrarReceta&idProductos='.$row['idProductos'].'" <i class="fa fa-edit btn btn-primary btn-sm"></i> </a><a class="fa fa-trash btn btn-danger  btn-sm" href="index.php?action=agregarReceta&idProductos='.$row['idProductos'].'" &nbsp;  </a>
                      </td>

                      
			     </tr>';
		}
    }

    public function getRecetaController(){
        
    }

/************************************************************************************************************/

    public function agregarPlatosController(){
    	if(isset($_POST['agregarPlatos'])){
    		$datosController = array("nombre"=>$_POST['nombre'],
    			                     "costo"=>$_POST['costo'],
    			                     "descripcion"=>$_POST['descripcion'],
    			                     "Categoria_idCategoria"=>$_POST['Categoria_idCategoria']
    			                     );

    		$respuesta = PlatosModel::agregarPlatosModel($datosController, 'productos');
    		if($respuesta == 'success'){
    			header('location:okPlatos');
    		}else{
    			header('location:platos');
    		}
    	}
    }

    public function agregarRecetaController(){
        if(isset($_POST['agregarReceta'])){
            $datosController = array("medida"=>$_POST['medida'],
                                     "Productos_idProductos"=>$_POST['Productos_idProductos'],
                                     "Insumos_idInsumos"=>$_POST['Insumos_idInsumos']
                                     );
            $respuesta = PlatosModel::agregarRecetaModel($datosController, 'receta');
            if($respuesta == 'success'){
                header('location:okReceta');
            }else{
                headers_list('location:receta');
            }
        }
    }

/*************************************************************************************************************/

    public function deletePlatosController(){
    	if(isset($_GET['idBorrar'])){
    		$datosController = $_GET['idBorrar'];

    		$respuesta = PlatosModel::deletePlatosModel($datosController, 'productos');
    		if($respuesta == 'success'){
    			header('location:borrarPlatos');
    		}
    	}
    }

/*************************************************************************************************************/

    public function editarPlatosController(){
    	$datosController = $_GET['idProductos'];
    	$respuesta = PlatosModel::editarPlatosModel($datosController, 'productos');

    	echo '<form method="POST">
    	        <div class="row">

           	 		<div class="col-md-6">  
            	  		<div class="form-group">
                			<label for="recipient-name" class="form-control-label">Nombre Plato:</label>
                			<input type="text" class="form-control" id="recipient-name" name="nombre" value="'.$respuesta['nombre'].'">
          	    		</div>
          	  		</div>
        	  	

        	  	
           	 		<div class="col-md-6">  
            	  		<div class="form-group">
                			<label for="recipient-name" class="form-control-label">Costo Plato:</label>
                			<input type="text" class="form-control" id="recipient-name" name="costo" value="'.$respuesta['costo'].'">
          	    		</div>
          	  		</div>
        	  	

        	  	
           	 		<div class="col-md-6">  
            	  		<div class="form-group">
                			<label for="recipient-name" class="form-control-label">Descripcion:</label>
                			<textarea type="text" class="form-control" id="recipient-name" name="descripcion" >'.$respuesta['descripcion'].'</textarea>
          	    		</div>
          	  		</div>
        	  	</div>

        	  	<input type="hidden" name="idProductos" value="'.$respuesta['idProductos'].'">
        		<button type="submit" class="btn btn-primary form-control" name="editar">Editar</button>
        		</form>';
        	}

/****************************************************************************************************************/

    public function actualizarPlatosController(){
    	if(isset($_POST['editar'])){
    		$datosController = array('nombre' => $_POST['nombre'],
    			                     'costo' => $_POST['costo'],
    			                     'descripcion' => $_POST['descripcion'],
    			                     'idProductos' => $_POST['idProductos']
    			                     );
    	$respuesta = PlatosModel::actualizarPlatosModel($datosController, 'productos');
    	if($respuesta == 'success'){
    		header('location:okEditPlatos');
    	}
      }
    }

/***************************************************************************************************************/
    }


?>