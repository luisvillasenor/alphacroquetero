<div id="inventario" class="container text-center" >
<div class="row">	

	<div class="col-md-4" >
		<div id="moduloseg">
			<div class="panel panel-danger">
			  <div class="panel-heading"><h1>Usuarios</h1></div>
			  <div class="panel-body"><small>Usuarios del Sistema</small></div>
			  <div class="caption">
		        <p><a href="<?php echo site_url('users/index');?>" class="btn btn-default btn-lg" role="button">Entrar</a></p>
		      </div>
			</div>	      
		</div>
	</div>

	<?php

	  	/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
		?>	
	<div class="col-md-4" >
		<div id="moduloseg">
			<div class="panel panel-danger">
			  <div class="panel-heading"><h1>Permisos</h1></div>
			  <div class="panel-body"><small>Roles, Usuarios</small></div>
			  <div class="caption">
		        <p><a href="<?php echo site_url('permisos/index');?>" class="btn btn-default btn-lg" role="button">Entrar</a></p>
		      </div>
			</div>	      
		</div>
	</div>  


		<?php
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			
		}

			?>
  

</div>
</div>