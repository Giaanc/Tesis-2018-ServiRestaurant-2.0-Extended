<?php require 'Views/modal/modal_platos.php'; ?>

<div class="container" style="overflow: auto; width: 1131px; height: 500px;"><br>

 <?php 
 if (isset($_GET['action'])) {
 	if ($_GET['action']== 'okPlatos') {
 	     echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Plato Fue Agregado Satifactoriamente al sistema.
          </div>
        </center>';
 	}
 }

  if (isset($_GET['action'])) {
 	if ($_GET['action']== 'borrarPlatos') {
 	     echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Plato Fue Borrado Satifactoriamente Del Sistema.
          </div>
        </center>';
 	}
 }
if (isset($_GET['action'])) {
  if ($_GET['action']== 'okEditPlatos') {
       echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> Se Actualizo El Plato Satifactoriamente En El sistema.
          </div>
        </center>';
  }
 }
  ?>
 <div class="row">
	<div class="col-lg-8">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Lista De Platos</li>
 </ol>
	</div>
		<div class="col-lg-4">
		  <div class="alert alert-success" role="alert">
		  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productos" data-whatever="@mdo">
		<i class="fa fa-plus"> </i> Registrar Nuevos Platos
		  </button>
		</div>
   	  </div> 
   	<div class="col-md-8 text-center">
   	  	
	 <table class="table table-bordered table-hover dt-responsive" id="tablaProductos" >
	 	<thead class="bg-primary">
	 		<tr>
        <td class="td" align="center">ID Plato</td>
	 			<td class="td" align="center">Nombre</td>
        <td class="td" align="center">Costo</td>
        <td class="td" align="center">Descripcion</td>
        <td class="td" align="center">Categoria</td>
	 			<td class="td" align="center">Editar/Eliminar</td>
        <td class="td" align="center">Receta (Mostrar Receta/Agregar Insumo)</td>
	 		</tr>
	 	</thead>

    <?php 
     $platos = new PlatosController();
     $platos->getPlatosController();
     $platos->deletePlatosController();
    ?>
   </table>
   <br>
    </div>
    	

  </div>
</div>
		

