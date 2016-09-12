<?php
header("Content-type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=recordatorios.xls");
?>
<table>    
		<tr>         
			<th>id</th>
			<th>accion</th> 
			<th>fecha alta</th>
			<th>fecha envio</th>  
			<th>origen</th> 
			<th>Usuario</th> 
			<th>Email</th> 
			<th>Fecha Recordatorio</th> 
			<th>Nombre de Mascota</th>
			<th>Sku</th>
			<th>Producto</th>
			<th>Imagen</th>
			<th>Presentacion</th> 
			<th>Porcion</th>
			<th>Frecuencia</th>
			<th>Precio Lista</th>
			<th>Precion PyA</th>
			<th>Donacion</th>
			<th>Ahorro</th>
			<th>Id Variant</th>
			<th>Estatus</th> 
		</tr>   

	<?php foreach ($show_recordatorios as $fila) :?> 
		<tr>
			<td><?php echo $fila->id; ?></td>
			<td><?php echo $fila->action; ?></td>
			<td><?php echo $fila->fecha_alta; ?></td>
			<td><?php echo $fila->fecha_envio; ?></td>
			<td><?php echo $fila->origen; ?></td>
			<td><?php echo $fila->name_customer; ?></td>
			<td><?php echo $fila->email_customer; ?></td>
			<td><?php echo $fila->date_picker; ?></td>
			<td><?php echo $fila->name_pet; ?></td>
			<td><?php echo $fila->sku; ?></td>
			<td><?php echo $fila->title_product; ?></td>
			<td><?php echo $fila->image_product; ?></td>
			<td><?php echo $fila->presentation_product; ?></td>
			<td><?php echo $fila->portion; ?></td>
			<td><?php echo utf8_decode($fila->frecuency); ?></td>
			<td><?php echo $fila->price_list; ?></td>
			<td><?php echo $fila->price_pya; ?></td>
			<td><?php echo $fila->donation; ?></td>
			<td><?php echo $fila->save_money; ?></td>
			<td><?php echo $fila->id_variant; ?></td>
			<td>
				<?php
					if ( $fila->status_recordatorio == 0 ) { ?>
						<span>Programado</span>
					<?php } elseif ( $fila->status_recordatorio == 1 ) { ?>
						<span>Enviado</span>
					<?php } ?>							
				
			</td>
		</tr>
	<?php endforeach; ?>

</table> 
