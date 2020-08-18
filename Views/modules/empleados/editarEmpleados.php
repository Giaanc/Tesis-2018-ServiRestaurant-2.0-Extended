<div class="container">
	
 <div class="row">
	<div class="col-lg-12">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Editar Empleado</li>
 </ol>
 </div>
</div>
<form method="post">
    <div class="row">
		<?php 
		 $editar = new empleadosController();
		 $editar->editarEmpleadoController();
		 $editar->actualizarEmpleadoController();
		 ?>
</div>
</form>
