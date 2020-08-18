<?php        
       
                $mysqli = new mysqli("localhost","root","1234","restaurante");
                if(mysqli_connect_errno()){
                echo "Conexion Fallida", mysqli_connect_error();
                }
 
                $mysqli->set_charset("utf8");
        
?>