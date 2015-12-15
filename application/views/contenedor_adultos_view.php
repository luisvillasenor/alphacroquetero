<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1><?php echo $titulo;?></h1></div>
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
						        <h4 class="modal-title">Ingresar Nuevo Usuario</h4>
						      </div>
						      <div class="modal-body">

						         <form id="ModalNuevoUser" class="form" role="form" method="post" action="<?php echo base_url('users/crear');?>">
						         	<div class="form-group">       
									  	<label for="nombre">Nombre Completo</label>       
										<input type="text" class="form-control" name="nombre" id="nombre" required>
									</div>
								  <div class="form-group">
								    <label for="id_tipo">Rol</label> 
									<select class="form-control" name="id_tipo" id="id_tipo">
									    <?php foreach ($cargar_roles as $rol) :?>      
									 	<option value="<?php echo $rol->id_tipo; ?>"><?php echo $rol->descripcion;?></option>                 
									 	<?php endforeach; ?>       
									 </select> 
								  </div>
								  <div class="form-group">
									   	<label for="username">Username</label>       
										<input type="text" class="form-control" name="username" id="username"> 
								  </div>
								  <div class="form-group">
								  		<label for="password">Password</label>       
										<input type="text" class="form-control" name="password" id="password">
								  </div>
								  <div class="form-group"> 
										<label for="email">Email</label>       
										<input type="text" class="form-control" name="email" id="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
								  </div>
								  <div class="form-group"> 
										<label for="tel">Telefono</label>       
										<input type="text" class="form-control" name="tel" id="tel">
								  </div>
								  <div class="form-group">       
										<label for="id_status"> </label>      
										<input type="hidden"  name="id_status" value="1" id="id_status">
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
						<td><a href="<?php echo base_url('adultos/detalles');?>/<?php echo $fila->sku; ?>">Ver SKU completo</a></td>
					</tr>
				<?php endforeach; ?>
				</tbody> 
			</table> 



	</div>
</div>