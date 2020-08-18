<?php        
        $mysqli = new mysqli("localhost","root","1234","restaurante");
        if(mysqli_connect_errno()){
        echo "Conexion Fallida", mysqli_connect_error();
        $mysqli->set_charset("utf8");


        function consultarSQL($query){
     	$mysqli = new mysqli("localhost", "root", "1234", "restaurante");

     	if(mysqli_connect_errno()){
     		echo "Conexion Fallida....", mysqli_connect_errno();
     	}

     	$mysqli->set_charset("utf8");
     	$mysqli->autocommit(FALSE);
     	$mysqli->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
     	if($consulta = $mysqli->query($query)){
     		if($mysqli->commit()){			
     		}else{
     			echo "Error Datos No Guardados";
     		}
     	}else{
     		$mysqli->rollback();
     	}
     	return $consulta;
     }
}        
?>

<?php 
 $conexion = new PDO('mysql:host=localhost;dbname=restaurante','root','1234');
   date_default_timezone_set('America/Argentina/Buenos_Aires');
 $conexion->exec('SET CHARACTER SET utf8');

 ?>



 