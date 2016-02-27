<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1>LISTA DE RECORDATORIOS [PRUEBAS]</h1></div>
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
			        	<a class="btn btn-md" href="<?php echo base_url('recordatorios/exportar');?>">Exportar a "csv"</a>
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
						<th>Usuario</th> 
						<th>Email</th> 
						<th>Fecha Recordatorio</th> 
						<th>Nombre de Mascota</th>
						<th>Producto</th>
						<th>Imagen</th>
						<th>Presentacion</th> 
						<th>Porcion</th>
						<th>Frecuencia</th>
						<th>Precio Lista</th>
						<th>Precion PyA</th>
						<th>Donacion</th>
						<th>Ahorro</th>
						<th>Boolean</th>
						<th>Id Variant</th>
						<th>Estatus</th>
						<th></th> 
					</tr>   
				</thead>    
				<tbody> 
				<?php foreach ($show_recordatorios as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					<tr>
						<td><?php echo $fila->name_customer; ?></td>
						<td><?php echo $fila->email_customer; ?></td>
						<td><?php echo $fila->date_picker; ?></td>
						<td><?php echo $fila->name_pet; ?></td>
						<td><?php echo $fila->title_product; ?></td>
						<td><?php echo $fila->image_product; ?></td>
						<td><?php echo $fila->presentation_product; ?></td>
						<td><?php echo $fila->portion; ?></td>
						<td><?php echo $fila->frecuency; ?></td>
						<td><?php echo $fila->price_list; ?></td>
						<td><?php echo $fila->price_pya; ?></td>
						<td><?php echo $fila->donation; ?></td>
						<td><?php echo $fila->save_money; ?></td>
						<td><?php echo $fila->booleano; ?></td>
						<td><?php echo $fila->id_variant; ?></td>
						<td>
							<?php
								if ( $fila->status_recordatorio == 0 ) { ?>
									<span class="label label-warning">Programado</span>
								<?php } elseif ( $fila->status_recordatorio == 1 ) { ?>
									<span class="label label-success">Enviado</span>
								<?php } ?>							
							
						</td>
						<td>
							<a href="" data-toggle="modal" data-target="#miDeleteRecordatorio<?php echo $fila->id; ?>">Eliminar</a>

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