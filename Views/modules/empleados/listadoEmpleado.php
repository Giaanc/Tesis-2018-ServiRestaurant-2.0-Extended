<?php require 'Views/modal/modal_empleados.php'; ?>

<div class="container" style="overflow: auto; width: 1131px; height: 500px;"><br>

 <?php 
 if (isset($_GET['action'])) {
 	if ($_GET['action']== 'okEmpleado') {
 	     echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Empleado Fue Agregado Satifactoriamente al sistema.
          </div>
        </center>';
 	}
 }

  if (isset($_GET['action'])) {
 	if ($_GET['action']== 'borrarEmpleado') {
 	     echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Empleado Fue Borrado Satifactoriamente del sistema.
          </div>
        </center>';
 	}
 }
if (isset($_GET['action'])) {
  if ($_GET['action']== 'okEditEmpleado') {
       echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Empleado Fue Editado Satifactoriamente en el  sistema.
          </div>
        </center>';
  }
 }
  ?>
 <div class="row">
	<div class="col-lg-8">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Lista Empleados Restaurant</li>
 </ol>
	</div>
		<div class="col-lg-4">
		  <div class="alert alert-success" role="alert">
		  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#empleado" data-whatever="@mdo">
		<i class="fa fa-plus"> </i> Registrar Nuevos Empleados
		  </button>
		</div>
   	  </div> 
   	<div class="col-md-8 text-center">
   	  	
	 <table class="table table-bordered table-hover dt-responsive" id="tablaProductos" >
	 	<thead class="bg-primary">
	 		<tr>
	 			<td class="td" align="center">Rut</td>
	 			<td class="td" align="center">Nombre</td>
        <td class="td" align="center">Apellido Paterno</td>
        <td class="td" align="center">Apellido Materno</td>
        <td class="td" align="center">Telefono</td>
        <td class="td" align="center">Sueldo</td>
        <td class="td" align="center">Fecha Contrato</td>
        <td class="td" align="center">Perfil</td>
        <td class="td" align="center">EDITAR - ELIMINAR</td>
	 		</tr>
	 	</thead>
     <?php 

     $categorias = new empleadosController();
     $categorias->getEmpleadosController();
     $categorias->deleteEmpleadoController();
    ?>

	 </table>
   <br>
    </div>
    	

  </div>
</div>
