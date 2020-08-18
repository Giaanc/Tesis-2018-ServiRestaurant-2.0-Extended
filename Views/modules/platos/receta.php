
<div class="container" style="overflow: auto; width: 1131px; height: 500px;"><br>

 <?php 
 if (isset($_GET['action'])) {
  if ($_GET['action']== 'okCategorias') {
       echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> La Categoria de un  Producto fue agragada Satifactoriamente al sistema.
          </div>
        </center>';
  }
 }

  if (isset($_GET['action'])) {
  if ($_GET['action']== 'borrarCategorias') {
       echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> La Categoria de un  Producto fue Borrada Satifactoriamente al sistema.
          </div>
        </center>';
  }
 }
if (isset($_GET['action'])) {
  if ($_GET['action']== 'okEdit') {
       echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> La Categoria de un  Producto fue Editada Satifactoriamente al sistema.
          </div>
        </center>';
  }
 }
  ?>
 <div class="row">
  <div class="col-lg-8">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Listado Insumos Para Receta</li>
 </ol>
  </div>
    <div class="col-lg-4">
      <div class="alert alert-success" role="alert">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#receta" data-whatever="@mdo">
    <i class="fa fa-plus"> </i> Registrar Nuevos Insumos
      </button>
    </div>
      </div> 
    <div class="col-md-8 text-center">
        
    <table class="table table-bordered table-hover dt-responsive" id="tablaProductos" >
    <thead class="bg-primary">
    <tr>
        <td class="td" align="center">IDReceta</td>
        <td class="td" align="center">Nombre Plato</td>
        <td class="td" align="center">Nombre Insumo</td>
        <td class="td" align="center">Medida (Kg)</td>
    </tr>
    </thead>

    <tbody>

      <?php
           include "conexion.php";
           $idProductos = $_GET['idProductos'];
           /*$query = "SELECT * FROM receta WHERE Productos_idProductos = '$idProductos'";*/
           $query = "SELECT i.nombre AS nombreInsumo, p.nombre AS nombreProducto, r.idReceta AS idReceta, r.medida AS medida  FROM receta r INNER JOIN productos p ON r.Productos_idProductos = p.idProductos INNER JOIN insumos i ON r.Insumos_idInsumos = i.idInsumos";
           $consulta1 = $mysqli->query($query);

           while($fila = $consulta1 ->fetch_array(MYSQLI_ASSOC)){
            echo "<tr>
                     <td>".$fila['idReceta']."</td>
                     <td>".$fila['nombreProducto']."</td>
                     <td>".$fila['nombreInsumo']."</td>
                     <td>".$fila['medida']."</td>
                  <tr>";
           }
      ?>
    </tbody>

</table>
   <br>
    </div>
      

  </div>
</div>
       <?php require 'Views/modal/modal_Receta.php'; ?>
       <?php 
     $receta = new RecetaCOntroller();
     $receta->agregarRecetaController();
    ?>