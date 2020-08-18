<div class="container">
  
<div class="card text-xs-center">
  <div class="card-header">
 <a href="insumos"><i class="fa fa-edit"> Volver</i></a>
  </div>
  <div class="card-block">
    <h4 class="card-title">Editar Insumos</h4>
    <p class="card-text">
    <?php 
      $editar = new ProductosController();
      $editar->editarProductosController();
      $editar->actualizarProductosController();
     ?>
    </p>
  </div>
</div>
</div>