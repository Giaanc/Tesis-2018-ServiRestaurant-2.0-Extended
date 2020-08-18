<?php  
 require_once 'Views/modules/ventas/conexion.php';

 $nombreInsumo = $_POST['nombreInsumo'];
 $stockInsumo = $_POST['stockInsumo'];
 $costoInsumo = $_POST['costoInsumo'];

 $mysqli->query("INSERT INTO insumos(nombre, stock, costo)
 	             VALUES('$nombreInsumo', '$stockInsumo', '$costoInsumo')");
 
echo '<script> window.location = "mostrarProducto.php"; </script>';

?>