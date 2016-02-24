<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=recordatorios.xls");
?>
<table class="table table-bordered">    
	<thead>       
		<tr>         
			<th>Usuario</th> 
			<th>Mail</th> 
			<th>Producto</th> 
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
