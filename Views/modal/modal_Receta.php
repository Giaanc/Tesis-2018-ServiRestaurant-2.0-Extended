<?php  
 require_once "conexion.php";
?>
  <div class="modal fade bd-example-modal-lg" id="receta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <!--     <span aria-hidden="true">&times;</span> -->
          </button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Nueva Receta</li>
          </ol>
        </div>
        <div class="modal-body">

          


          <form method="POST">
          <div class="row">
            <div class="col-md-6">  
            <label>Agregar Insumo A La Receta</label>
            <br><br>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Medida:</label>
                <input type="number" class="form-control" id="recipient-name" name="medida" required="" placeholder="Ingresar En kilos">
              </div>
              
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Seleccione Plato:</label>
                <select name="Productos_idProductos">
                <?php
                $mysqli = new mysqli("localhost","root","1234","restaurante");
                if(mysqli_connect_errno()){
                echo "Conexion Fallida", mysqli_connect_error();
                }

                $mysqli->set_charset("utf8");
                $idProductos = $_GET['idProductos'];
                $resultado = mysqli_query($mysqli,"SELECT * FROM productos WHERE idProductos = '$idProductos'");
                while($row = $resultado->fetch_assoc()){
                ?>
                <option value="<?php echo $row['idProductos']?>"> <?php echo $row['idProductos']?>  <?php echo $row['nombre']?></option>
                <?php
                }
                ?>
                </select>
              </div>


              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Seleccione Insumo:</label>
                <select name="Insumos_idInsumos">
                <?php
                $mysqli = new mysqli("localhost","root","1234","restaurante");
                if(mysqli_connect_errno()){
                echo "Conexion Fallida", mysqli_connect_error();
                }

                $mysqli->set_charset("utf8");
                $resultado = mysqli_query($mysqli,"SELECT * FROM insumos");
                while($row = $resultado->fetch_assoc()){
                ?>
                <option value="<?php echo $row['idInsumos']?>"> <?php echo $row['idInsumos']?>  <?php echo $row['nombre']?></option>
                <?php
                }
                ?>
                </select>
              </div>

            </div>
          </div>

          
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="agregarReceta">Agregar Insumo</button>
          </form>
</div>

<?php  
$receta = new RecetaController();
$receta->agregarRecetaController();
?>