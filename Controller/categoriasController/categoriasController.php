<?php  
ob_start();

class CategoriasController {

  public function agregarCategoriasController(){
  	if (isset($_POST['agregarCategorias'])) {	   
  	   $datosController = array("nombreCategoria"=>$_POST['nombreCategoria']
  	   	                         );
  	   $respuesta = CategoriasModel::agregarCategoriasModel($datosController,'categorias');

  	   if ($respuesta == 'success') {
  	   	 header('location:okCategorias');
  	   }else{
             header('location:categoria');
 		      }
  	}
  }



    public function getCategoriasController(){
      $respuesta = CategoriasModel::getCategoriasModel('categoria');

       foreach ($respuesta as $row) {
         echo '<tr> 
              <td align="center"> '. $row['nombreCategoria'].'</td>
              <td align="center"><a href="index.php?action=editarcategoria&idCategoria='.$row['idCategoria'].'" <i class="fa fa-edit btn btn-primary btn-sm"></i> </a>
               <a class="fa fa-trash btn btn-danger  btn-sm" href="index.php?action=categorias&idBorrar='.$row['idCategoria'].'" &nbsp;  </a>
              </td>
              </tr>';
       }
    }

    public function editarCategoriasController(){
            $datosController= $_GET['idCategoria'];
      $respuesta = CategoriasModel::editarCategoriasModel($datosController,'categoria');

  echo'  <div class="col-md-8">  
              <div class="form-group">
              <label for="categoria-name" class="form-control-label">Nombre Categoria :</label>
                <input type="text" class="form-control" id="categoria-name" name="nombrecategoria" value="'.$respuesta['nombreCategoria'].' ">
              </div>       
        <input type="hidden" name="idCategoria" value="'.$respuesta['idCategoria'].'">
          <button type="submit" class="btn btn-primary" name="editarCategorias">Editar la  Categoria</button>
          </div>
   <div class="col-md-4">
     
   </div>';
    }

   public function actualizarCategoriaController(){
         if (isset($_POST['editarCategorias'])) {

          $datosController= array("nombreCategoria"=>$_POST['nombrecategoria'],
                                     'idCategoria'=>$_POST['idCategoria']);
          #pedir la informacion al modelo.

          $respuesta= CategoriasModel::actualizarCategoriaModel($datosController,'categoria');
      
          if ($respuesta == 'success') {
                header('location:okEdit');
          }
        }
     }


  public function deleteCategoriasController(){
     if (isset($_GET['idBorrar'])) {
      $datosController = $_GET['idBorrar'];

   #pedir la informacion al modelo.
      $respuesta = CategoriasModel::deleteCategoriasModel($datosController,'categoria');
      if ($respuesta == 'success') {
         header('location:borrarCategorias');
      }
     }
   }
     

}