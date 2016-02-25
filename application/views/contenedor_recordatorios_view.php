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
			<table class="table table-bordered">    
				<thead>       
					<tr>         
						<th>Usuario</th> 
						<th>Mail</th> 
						<th>Producto</th> 
						<th>Fecha Programada</th>
						<th>Fecha de envío</th>
						<th>Estatus</th> 
					</tr>   
				</thead>    
				<tbody> 
				<?php foreach ($show_recordatorios as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					<tr>
						<td></td>
						<td><?php echo $fila->email_recordatorio; ?></td>
						<td><?php echo $fila->producto; ?></td>
						<td><?php echo $fila->fecha_recordatorio; ?></td>
						<td><?php echo $fila->fecha_envio; ?></td>
						<td>
							<?php
								if ( $fila->status_recordatorio == 0 ) { ?>
									<span class="label label-warning">Programado</span>
								<?php } elseif ( $fila->status_recordatorio == 1 ) { ?>
									<span class="label label-success">Enviado</span>
								<?php } ?>							
							
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody> 
			</table> 

	</div>
</div>