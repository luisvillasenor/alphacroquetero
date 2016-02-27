<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=recordatorios.xls");
?>
<table class="table table-bordered">    
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
			<td><?php echo $fila->boolean; ?></td>
			<td><?php echo $fila->id_variant; ?></td>
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
