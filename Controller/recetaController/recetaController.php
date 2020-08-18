<?php 
ob_start();

class RecetaController{
	public function platilla(){
		include 'Views/template.php';
	}



    public function getRecetaController(){
    $respuesta = RecetaModel::getRecetaModel('receta');

    foreach ($respuesta as $row){
     echo '<tr>
                <td align="center"> '. $row['idReceta'].'</td>
                <td align="center"> '. $row['medida'].'</td>
                <td align="center"> '. $row['Productos_idProductos'].'</td>
                <td align="center"> '. $row['Insumos_idInsumos'].'</td>
                <td align="center"><a href="index.php?action=editarReceta&idReceta='.$row['idReceta'].'" <i class="fa fa-edit btn btn-primary btn-sm"></i> </a><a class="fa fa-trash btn btn-danger  btn-sm" href="index.php?action=borrarReceta&idBorrar='.$row['idReceta'].'" &nbsp;  </a>
                </td>

                      
           </tr>';
        }
    }

/************************************************************************************************************/

   public function agregarRecetaController(){
        if(isset($_POST['agregarReceta'])){
            $datosController = array("medida"=>$_POST['medida'],
                                     "Productos_idProductos"=>$_POST['Productos_idProductos'],
                                     "Insumos_idInsumos"=>$_POST['Insumos_idInsumos']
                                     );
            $respuesta = RecetaModel::agregarRecetaModel($datosController, 'receta');
            if($respuesta == 'success'){
                header('location:okReceta');
            }else{
                headers_list('location:receta');
            }
        }
    }







}



?>