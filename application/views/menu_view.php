<div id="menu1"> <!--Menu principa de navegación-->
			<ul id="menu1_1">
			<?php
  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL OR ROL == 2) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
		?>	
				<li class="contenedor" id="seguridad">
					<a href="<?php echo site_url('home/seguridad');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/minilogo.png"></a>
					<p class="texto">Seguridad</p>
				</li>

				<?php if (ROL == SUPERROL) { ?>
						<li class="contenedor" id="empleados">
							<a href="<?php echo site_url('recordatorios/show');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/minilogo.png"></a>
							<p class="texto">Gestión de Recordatorios</p>
						</li>
				<?php } ?>


		<?php
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			
		}

			?>


				<li class="contenedor" id="inventario"><!--LI-->
					<a href="<?php echo site_url('home/gestioncatalogos');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/minilogo.png"></a>
					<p class="texto">Gestión de Catálogos</p>
				</li>
				
				
				<li class="contenedor" id="salir"><!--LI-->
					<a href="<?php echo site_url('welcome/logout');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/minilogo.png"></a>
					<p class="texto">Salir</p>
				</li>
			</ul>
</div>