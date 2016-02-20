<ol class="breadcrumb">
	<li><a href="<?php echo site_url('adultos/index');?>">SKU'S ADULTOS</a></li>
	<li><a href="<?php echo site_url('adultos/detalles');?>/<?php echo $sku; ?>"><?php echo $sku; ?></a></li>
</ol>
<div class="panel panel-primary">
  	<div class="panel-heading text-center">

    </div>
  	<div class="panel-body">

  		
			   		 <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><H2>SKU: <STRONG><?php echo $sku; ?></STRONG></H2></a></li>
  </ul>


  <!-- Tab panes -->
  <div class="tab-content">
  	<br>
    <div role="tabpanel" class="tab-pane active" id="home">
    	<table class="table table-bordered">    
        <thead>       
          <tr>      
             <th>SKU</th>         
             <th>Producto</th>
             <th>Presentación (Kg)</th>
             <th>Peso (Kg)</th>
             <th>Porción (g)</th>
             <th>Operaciones</th> 
          </tr>   
        </thead>    
        <tbody> 
          <?php foreach ($cargar_detalles as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
            <tr>
              <td> <?php echo $fila->sku; ?></td>
              <td> <?php  echo $fila->producto; ?></td>
              <td> <?php  echo $fila->presentacion; ?></td>
              <td> <?php  echo number_format($fila->peso); ?></td>
              <td> <?php  echo $fila->porcion; ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Acciones</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <!-- link -->
                    <li><a data-toggle="modal" href="#miModalEdit<?php echo $fila->id; ?>">Editar</a></li>
                    <li><a href="" data-toggle="modal" data-target="#miModalDelete<?php echo $fila->id; ?>">Eliminar</a></li>
                  </ul>
                </div>
              </td>
            </tr>

                    <!-- Modal -->
                    <div id="miModalEdit<?php echo $fila->id; ?>" class="modal fade" role="dialog">
                        <div id="moduloseg" class="modal-dialog">
                        <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Editar Presentación</h4>
                              </div>
                              <div class="modal-body">
                                <form id="ModalEditarSku" class="form" role="form" method="post" action="<?php echo site_url('adultos/actualizar');?>">
                                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $fila->id; ?>">
                                  <div class="form-group">    
                                    <label for="sku">SKU: <?php echo $fila->sku; ?></label>       
                                    <input type="text" class="form-control" id="sku" name="sku" value="<?php echo $fila->sku; ?>">
                                  </div>
                                  <div class="form-group">    
                                    <label for="producto">PRODUCTO: <?php echo $fila->producto; ?></label>       
                                    <input type="text" class="form-control" id="producto" name="producto" value="<?php echo $fila->producto; ?>">
                                  </div>
                                  <div class="form-group">    
                                    <label for="presentacion">PRESENTACION: <?php echo $fila->presentacion; ?></label>       
                                    <input type="text" class="form-control" id="presentacion" name="presentacion" value="<?php echo $fila->presentacion; ?>">
                                  </div>
                                  <div class="form-group">    
                                    <label for="peso">PESO: <?php echo $fila->peso; ?></label>       
                                    <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $fila->peso; ?>">
                                  </div>
                                  <div class="form-group">    
                                    <label for="porcion">PORCION: <?php echo $fila->porcion; ?></label>       
                                    <input type="text" class="form-control" id="porcion" name="porcion" value="<?php echo $fila->porcion; ?>">
                                  </div>

                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                  </div>   
                                </form>
                              </div>
                          </div>
                        <!-- Modal content-->
                        </div>
                    </div>
                    <!-- Modal -->

                    <!-- Modal -->
                    <div id="miModalDelete<?php echo $fila->id; ?>" class="modal fade" role="dialog">
                        <div id="moduloseg" class="modal-dialog">
                        <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">¿Desea eliminar el registro de forma permanente?</h3>
                              </div>
                              <div class="modal-body">
                                <form id="ModalEliminarPresentacion" role="form" action="<?php echo site_url('adultos/eliminar');?>" method="post">
                                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $fila->id; ?>">
                                  <div class="form-group">    
                                    <label for="sku">SKU: <?php echo $fila->sku; ?></label>       
                                  </div>
                                  <div class="form-group">    
                                    <label for="producto">PRODUCTO: <?php echo $fila->producto; ?></label>       
                                  </div>
                                  <div class="form-group">    
                                    <label for="presentacion">PRESENTACION: <?php echo $fila->presentacion; ?></label>       
                                  </div>
                                  <div class="form-group">    
                                    <label for="peso">PESO: <?php echo $fila->peso; ?></label>       
                                  </div>
                                  <div class="form-group">    
                                    <label for="porcion">PORCION: <?php echo $fila->porcion; ?></label>       
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Sí, eliminar permanentemente</button>
                                  </div>   
                                </form>
                              </div>
                          </div>
                        <!-- Modal content-->
                        </div>
                    </div>
                    <!-- Modal -->


          <?php endforeach; ?>
        </tbody> 
      </table>  
    </div>
  </div>

</div>



  	</div>
</div>


