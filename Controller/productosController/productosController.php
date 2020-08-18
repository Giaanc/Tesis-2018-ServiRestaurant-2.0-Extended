<?php  
ob_start();

class ProductosController {

  public function plantilla(){
         include 'Views/template.php';
   }


	public function getProductosController(){
		 $respuesta = ProductosModel::getProductosModel('insumos');

       foreach ($respuesta as $row) {
         echo '<tr> 
              <td align="center"> '. $row['nombre'].'</td>
              <td align="center"> '. $row['stock'].'</td>
              <td align="center"> '. $row['costo'].'</td>  
              <td align="center"><a href="index.php?action=editarProductos&idInsumos='.$row['idInsumos'].'" <i class="fa fa-edit btn btn-primary btn-sm"></i> </a>
               <a class="fa fa-trash btn btn-danger  btn-sm" href="index.php?action=listadoProd&idBorrar='.$row['idInsumos'].'" &nbsp;  </a>
              </td>
              </tr>';
       }
	}


   public function agregarProductosController(){
   	 if (isset($_POST['agregarProductos'])) {
   	 	$datosController = array("nombre"=>$_POST['nombre'],
   	 		                     "stock"=>$_POST['stock'],
   	 		                     "costo"=>$_POST['costo'],);

   	 	$respuesta = ProductosModel::agregarProductosModel($datosController, 'insumos');


  	   if ($respuesta == 'success') {
  	   	 header('location:okProductos');
  	   }else{
             header('location:listadoProd');
 		   }
   	 }
   }

   public function deleteProductosController(){

        if (isset($_GET['idBorrar'])) {
           $datosController = $_GET['idBorrar'];

   #pedir la informacion al modelo.
      $respuesta = ProductosModel::deleteProductosModel($datosController,'insumos');
      if ($respuesta == 'success') {
         header('location:borrarProductos');
      }
     }
   }

   /*************************************************************************/

   public function editarProductosController(){
    $datosController= $_GET['idInsumos'];
    $respuesta =ProductosModel::editarProductosModel($datosController, 'insumos');

    echo ' <form method="post">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Insumo:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombre" value="'.$respuesta['nombre'].'">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Stock Insumo:</label>
                <input type="number" class="form-control" id="recipient-name" name="stock" value="'.$respuesta['stock'].'">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Costo Insumo:</label>
                <input type="number" class="form-control" id="recipient-name" name="costo" value="'.$respuesta['costo'].'">
              </div>
            </div>
          </div>

        <input type="hidden" name="idInsumos" value="'.$respuesta['idInsumos'].'">
          <button type="submit" class="btn btn-primary form-control" name="editarProductos">Actualizar Insumo</button>
          </form>';

   }

   /*************************************************************************/ 

   public function actualizarProductosController(){
         if (isset($_POST['editarProductos'])) {


          $datosController= array("nombre"=>$_POST['nombre'],
                             "stock"=>$_POST['stock'],
                             "costo"=>$_POST['costo'],
                             "idInsumos"=>$_POST['idInsumos'],);
          #pedir la informacion al modelo.

          $respuesta= ProductosModel::actualizarProductosModel($datosController,'insumos');
      
          if ($respuesta == 'success') {
                header('location:okEditar');
          }
        }
     }

}