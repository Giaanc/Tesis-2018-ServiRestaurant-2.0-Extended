<?php  
 require_once 'Views/modules/ventas/conexion.php';
?>
  <div class="modal fade bd-example-modal-lg" id="productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <!--     <span aria-hidden="true">&times;</span> -->
          </button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Nuevo Insumo</li>
          </ol>
        </div>
        <div class="modal-body">

          <form method="POST">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Insumo:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombre" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Stock:</label>
                <input type="number" class="form-control" id="recipient-name" name="stock" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Costo:</label>
                <input type="number" class="form-control" id="recipient-name" name="costo" required="">
              </div>
            </div>

            

          </div>

          
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="agregarProductos">Agregar Productos</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php  
$prod = new ProductosController();
$prod->agregarProductosController();
?>