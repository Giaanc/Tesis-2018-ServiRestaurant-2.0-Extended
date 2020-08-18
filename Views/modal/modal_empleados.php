<?php  
 require_once 'Views/modules/ventas/conexion.php';
?>
  <div class="modal fade bd-example-modal-lg" id="empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
          </button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Nuevo Empleado</li>
          </ol>
        </div>
        <div class="modal-body">

          <form method="POST">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Rut Empleado: </label>
                <input type="text" class="form-control" id="recipient-name" name="rut" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Contraseña:</label>
                <input type="password" class="form-control" id="recipient-name" name="pass" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Empleado:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombre" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="recipient-name" name="apellidoPaterno" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="recipient-name" name="apellidoMaterno" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Telefono:</label>
                <input type="number" class="form-control" id="recipient-name" name="telefono" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Sueldo:</label>
                <input type="number" class="form-control" id="recipient-name" name="sueldo" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Fecha Contrato:</label>
                <input type="date" class="form-control" id="recipient-name" name="fechaContrato" required="">
              </div>


            <div class="col-md-6"> 
            <div class="form-group">
              <label for="message-text" class="form-control-label">Seleccione Perfil</label>
               <SELECT NAME="Perfil_idPerfil" SIZE=1 onChange="javascript:alert('prueba');"> 
               <OPTION VALUE=" <?php 
        
               //conexion a base de datos para asignar value

                $mysqli = new mysqli("localhost","root","1234","restaurante");
                if(mysqli_connect_errno()){
                echo "Conexion Fallida", mysqli_connect_error();
                }
 
                $mysqli->set_charset("utf8");
                $resultado = mysqli_query($mysqli,"SELECT * FROM perfil");
                while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                echo $fila["idPerfil"];                 
                }
                
                 ?> " >
                 
                <?php 
                
                //conexion a base de datos para asignar combobox

                $mysqli = new mysqli("localhost","root","1234","restaurante");
                if(mysqli_connect_errno()){
                echo "Conexion Fallida", mysqli_connect_error();
                }
                
                $mysqli->set_charset("utf8");
                $resultado = mysqli_query($mysqli,"SELECT * FROM perfil");
                while($row = $resultado->fetch_assoc()){
                ?>
                <option value="<?php echo $row['idPerfil']?>"> <?php echo $row['idPerfil']?>  <?php echo $row['nombre']?></option>                  
 <?php
               }
                 ?>
               </OPTION>
               </SELECT> 
            </div>
            </div>


            </div>

            

          </div>

          
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="agregar">Agregar Empleado</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php  
$prod = new empleadosController();
$prod->agregarEmpleadoController();
?>