<?php 

require_once 'Views/modules/ventas/conexion.php';


	date_default_timezone_set('America/Argentina/Buenos_Aires');
	if (isset($_POST['submit'])) {
		$buscar = $_POST['buscar'];
		$buscar= date("Y-m-d", strtotime($buscar));
       // echo "$buscar";
		$sql = $conexion->prepare("SELECT * FROM reserva WHERE fechaReservada LIKE :fechaReservada OR nombreCliente LIKE :nombrecliente");
		$resultado = $sql->execute(array(':fechaReservada'=> "%$buscar%",
			                              ':nombrecliente'=>"%$buscar%"));
		$resultado = $sql->fetchAll(PDO::FETCH_OBJ);
	if (empty($resultado)) {
		$titulo = 'No se encontraron Reservas El día  : '  .date("d-m-Y", strtotime($buscar));
		echo "<br><br><br><br>";
	} else {
		$titulo = 'La Reserva Buscada del Día : '  .date("d-m-Y", strtotime($buscar));
	}
	
}

 ?>

<div class="container">
<br>
<ol class="breadcrumb">
	<h1><li class="breadcrumb-item active"> <?php echo $titulo ;?></li></h1><a href="reservas"><i class="fa fa-undo" aria-hidden="true"> Volver Reservas</a></i>
</ol>	

<table class="table table-bordered">
<thead class="thead">
	<th>Nombre Cliente</th>
	<th>Cantidad de Personas</th>
	<th>Teléfono</th>
	<th>Dia Reserva</th>
	<th>Hora Arrivo</th>
	<th>Observaciones</th>
	<th>Editar O  Borrar</th>
</thead>
<?php foreach($resultado as $resultados): ?>
	
<tbody>
	<td  class=" alert-danger"><?php echo $resultados->nombreCliente; ?></td>
	<td  class=" alert-danger" align="center"><?php echo $resultados->cantidadPersonas; ?></td>
	<td  class=" alert-danger"><?php echo $resultados->telefono; ?></td>
	<td  class=" alert-danger"><?php echo date("d-m-Y", strtotime($resultados->fechaReservada)) ; ?></td>
	<td  class=" alert-danger" align="center"><?php echo $resultados->fechaIngresoReserva; ?></td>
	<td class=" alert-danger"><?php echo $resultados->Observaciones; ?></td>
   <td  class=" alert-danger">&nbsp; &nbsp;
   <a href="index.php?action=editarReservas&idreserva=<?php echo $resultados->idReserva;?>"><i class="fa fa-edit btn btn-primary btn-sm "></i></a>
		<a href="index.php?action=reservas&idBorrar=<?php echo $resultados->idReserva;?>"<i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
</tbody>
<?php endforeach; ?>
</table>
<br>
<br>
<br>
</div>

