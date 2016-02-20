<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1>LISTA DE SKU´s ADULTO</h1></div>
  <div class="panel-body">



  		<div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     		<!--link-->
						<a class="navbar-brand" data-toggle="modal" href="#myModalPermisosRol">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModalPermisosRol" class="modal fade" role="dialog">
						  <div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">INGRESAR NUEVO SKU</h4>
						      </div>
						      <div class="modal-body">

						         <form id="ModalNuevoSku" class="form" role="form" method="post" action="<?php echo site_url('adultos/crear');?>">
						         	<div class="form-group">       
									  	<label for="sku">SKU</label>       
										<input type="text" class="form-control" name="sku" id="sku" required>
									</div>
								  <div class="form-group">
									   	<label for="producto">NOMBRE DEL PRODUCTO</label>       
										<input type="text" class="form-control" name="producto" id="producto"> 
								  </div>
								  <div class="form-group">
								  		<label for="presentacion">PRESENTACION</label>       
										<input type="text" class="form-control" name="presentacion" id="presentacion">
								  </div>
								  <div class="form-group"> 
										<label for="peso">PESO</label>       
										<input type="text" class="form-control" name="peso" id="peso">
								  </div>
								  <div class="form-group"> 
										<label for="porcion">PORCIÓN</label>       
										<input type="text" class="form-control" name="porcion" id="porcion">
								  </div>
						  
								  
								  <div class="modal-footer">
						          		<button type="submit" class="btn btn-danger">Guardar</button>
						      	  </div>
								</form>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- Modal -->


			    </div>
			    <div>
			      <ul class="nav navbar-nav">

			      </ul>			      
			      <ul class="nav navbar-nav navbar-right">
			        <li></li>
			      </ul>
			    </div>
			  </div>
		    </nav>
		  </div>

		
	
			<table class="table table-bordered">    
				<thead>       
					<tr>         
						<th>SKU</th>          
						<th>PRODUCTO</th> 
						<th></th> 
					</tr>   
				</thead>    
				<tbody> 
				<?php foreach ($cargar_adultos as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					<tr>
						<td> <?php echo $fila->sku; ?></td>
						<td> <?php echo $fila->producto; ?></td>
						<td>
							<a href="<?php echo site_url('adultos/detalles');?>/<?php echo $fila->sku; ?>">Ver SKU completo</a>
							<br>
							<a href="" data-toggle="modal" data-target="#miModalDeleteSku<?php echo $fila->sku; ?>">Eliminar Sku</a>
						</td>
					</tr>

                    <!-- Modal -->
                    <div id="miModalDeleteSku<?php echo $fila->sku; ?>" class="modal fade" role="dialog">
                        <div id="moduloseg" class="modal-dialog">
                        <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">¿Desea eliminar el SKU de forma permanente?</h3>
                              </div>
                              <div class="modal-body">
                                <form id="ModalEliminarSku" role="form" action="<?php echo site_url('adultos/eliminarsku');?>/<?php echo $fila->sku; ?>" method="post">
                                  
                                  <div class="form-group">    
                                    <label for="sku">SKU: <?php echo $fila->sku; ?></label>       
                                  </div>
                                  <div class="form-group">    
                                    <label for="producto">PRODUCTO: <?php echo $fila->producto; ?></label>       
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