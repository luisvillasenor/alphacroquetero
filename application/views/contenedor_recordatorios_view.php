<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1>LISTA DE RECORDATORIOS</h1></div>
  <div class="panel-body">
  		<div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     		<!--link-->
			    </div>
			    <div>
			      <ul class="nav navbar-nav">
			      	<li>
			        	<a class="btn btn-md" href="<?php echo base_url('recordatorios/show');?>">Ver Todos</a>
			        </li>
			        <li>
			        	<a class="btn btn-md" href="<?php echo base_url('recordatorios/show');?>/1">Ver "Enviados"</a>
			        </li>
			        <li>
			        	<a class="btn btn-md" href="<?php echo base_url('recordatorios/show');?>/0">Ver "Programados"</a>
			        </li>
			        <li>
			        	<a class="btn btn-md" href="<?php echo base_url('recordatorios/exportar');?>">Exportar a "xls"</a>
			        </li>
			      </ul>
			    </div>
			  </div>
		    </nav>
		  </div>
		  	<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-condensed">    
				<thead>       
					<tr>         
						<th>ID</th>
						<th>Accion</th>
						<th>Fecha Alta</th>
						<th>Fecha Recordatorio</th> 
						<th>Fecha Envío</th>
						<th>Origen</th> 
						<th>Usuario</th> 
						<th>Nombre de Mascota</th>
						<th>Sku</th>
						<th>Producto</th>							
						<th>Porcion</th>
						<th>Frecuencia</th>
						<th>Donacion</th>
						<th>Estatus</th>
						
					</tr>   
				</thead>    
				<tbody> 
				<?php foreach ($show_recordatorios as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					<tr>
						<td><?php echo $fila->id; ?></td>
						<td><?php echo $fila->action; ?></td>
						<td><?php echo $fila->fecha_alta; ?></td>
						<td><?php echo $fila->date_picker; ?></td>
						<td>
							<?php echo $fila->fecha_envio; ?><br>
							<?php
								if ( $fila->status_recordatorio == 0 ) { ?>
									<span class="label label-warning">Programado</span>
								<?php } elseif ( $fila->status_recordatorio == 1 ) { ?>
									<span class="label label-success">Enviado</span>
								<?php } ?>							
							
						</td>
						<td><?php echo $fila->origen; ?></td>
						<td>
							<?php echo $fila->name_customer; ?><br>
							<?php echo $fila->email_customer; ?>
						</td>
						
						<td><?php echo $fila->name_pet; ?></td>
						<td><?php echo $fila->sku; ?></td>
						<td>
							<img style="width:60px;" src="<?php echo $fila->image_product; ?>"> <br>
							<?php echo $fila->title_product; ?> (<?php echo $fila->presentation_product; ?> Kg)<br>
							
						</td>							
						<td><?php echo $fila->portion; ?> g.</td>
						<td><?php echo utf8_decode($fila->frecuency); ?> días</td>
						<td><?php echo $fila->donation; ?> comidas</td>
						<td>
							<a href="" class="btn btn-danger btn-sm" role="button" data-toggle="modal" data-target="#miDeleteRecordatorio<?php echo $fila->id; ?>">Eliminar</a>

										<!-- Modal -->
					                    <div id="miDeleteRecordatorio<?php echo $fila->id; ?>" class="modal fade" role="dialog">
					                        <div id="moduloseg" class="modal-dialog">
					                        <!-- Modal content-->
					                          <div class="modal-content">
					                              <div class="modal-header">
					                                <button type="button" class="close" data-dismiss="modal">&times;</button>
					                                <h3 class="modal-title">¿Desea eliminar el registro de forma permanente?</h3>
					                              </div>
					                              <div class="modal-body">
					                                <form id="EliminarRec" role="form" action="<?php echo site_url('recordatorios/eliminar');?>/<?php echo $fila->id; ?>" method="post">
					                                  
					                                  <div class="form-group">    
					                                    <label for="id">ID: <?php echo $fila->id; ?></label>       
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

						</td>
					</tr>


				<?php endforeach; ?>
				</tbody> 
			</table>
			</div>

	</div>
</div>