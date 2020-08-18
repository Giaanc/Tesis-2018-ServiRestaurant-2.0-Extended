<?php session_start();
	try {
		$error = '';
		$enviar='';
		$enviado='';

		$conexion = new PDO('mysql:host=localhost;dbname=restaurante', 'root','1234');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nombreusuario = $_POST['nombre'];
			$password = $_POST['pass'];
     $sql = $conexion->prepare('SELECT * FROM empleado WHERE nombre = :nombre AND 
     	                        pass = :pass');
     $sql->execute(array(':nombre'=>$nombreusuario,
     	                  ':pass'=>$password));

     $resultado = $sql->fetch();
        if ($resultado != false) {
	      $_SESSION['nombre'] = $nombreusuario;
	      $_SESSION['rut'] = $resultado['rut'];
	      $enviar .=  '<center> Bienvenido <br>'. ucwords($resultado['nombre']). '</center> <br>';
	      $enviar .= '<meta http-equiv="refresh" content="0;url=../../index">';
	      $enviado .= '<center><i class="fa fa-cog fa-spin fa-3x fa-fw"></i><br>
	                  <span class="">Accediendo Al Sistema...</span></center><br>';
	   
   } else {
   $error .= '<li class="alert alert-danger"> Los Datos ingresados son Incorrecto </li>';
   
}

		}
	} catch (Exception $e) {
		echo "Error  de conexion ala base de datos.";
		echo $e;
	}

	






	require 'login.view.php';
 ?>