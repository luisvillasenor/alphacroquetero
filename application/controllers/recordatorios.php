<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recordatorios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('encrypt');
		#$this->load->library('email');
		// Si la sesion no tiene datos, redireccionarlo fuera del sistema
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(site_url('welcome/logout')); 
		}
		// Se Definen constantes para facilitar la programacion
		define("SUPERROL", 1); // "SuperAdministrador"
		define('ROL', $this->session->userdata('rol'));
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',$this->session->userdata('username'));
	    //
	    $this->load->model('permisos_model');
  		$this->load->model('tbl_recordatorios_crud_model');
  		$this->load->model('tbl_roles_model');

  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
	}

	public function show($status_recordatorio = null)
	{	
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_recordatorios_crud_model');
			$data['show_recordatorios'] = $this->tbl_recordatorios_crud_model->show($status_recordatorio);
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_recordatorios_view',$data);
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ( isset($tiene_permiso) == true ) {
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$this->load->model('tbl_recordatorios_crud_model');
				$data['show_recordatorios'] = $this->tbl_recordatorios_crud_model->show($status_recordatorio);
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_recordatorios_view',$data);	
				$this->load->view('footer_view');
			}else{

				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
		
	}

	public function exportar($status_recordatorio = null)
	{	
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_recordatorios_crud_model');
			$data['show_recordatorios'] = $this->tbl_recordatorios_crud_model->show($status_recordatorio);
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			#$this->load->view('menu_view');
			$this->load->view('exportar_recordatorios_view',$data);
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ( isset($tiene_permiso) == true ) {
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$this->load->model('tbl_recordatorios_crud_model');
				$data['show_recordatorios'] = $this->tbl_recordatorios_crud_model->show($status_recordatorio);
				$this->load->view('header_view');
				#$this->load->view('menu_view');
				$this->load->view('exportar_recordatorios_view',$data);
				$this->load->view('footer_view');
			}else{

				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
		
	}

	public function eliminar($id = null)
	{	
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_recordatorios_crud_model');
			$is_delete = $this->tbl_recordatorios_crud_model->delete($id);
			if ( isset($is_delete) ) {
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('cabecera_view');	
				$this->load->view('footer_view');
			} 
				else {

					$this->show();
					
				}

		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ( isset($tiene_permiso) == true ) {
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$this->load->model('tbl_recordatorios_crud_model');
				$is_delete = $this->tbl_recordatorios_crud_model->delete($id);
				if ( isset($is_delete) ) {
					$this->load->view('header_view');
					$this->load->view('menu_view');
					$this->load->view('cabecera_view');	
					$this->load->view('footer_view');
				} 
					else {

						$this->show();
						
					}
			}
				else{

					$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
					$data['username'] = USER;
					$data['rol'] = ROL;
					$data['get_all'] = $this->permisos_model->get_all();
					$this->load->view('header_view');
					$this->load->view('menu_view');
					$this->load->view('sorry_view',$data);
					$this->load->view('footer_view');
			}				
			
		}
		
	}

/*

	public function actualizar_status($id = null)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			
			$this->load->model('tbl_recordatorios_crud_model'); 
			$actualizar_status = $this->tbl_recordatorios_crud_model->actualizar_status($id);
			if ( isset($actualizar_status) && $actualizar_status == TRUE ) {
				return TRUE;
			}
			return null;
			#redirect(site_url('adultos/index'));

		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
			else
			{
				$metodo = $this->uri->segment(2); // Metodo de la URL
				$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
				if ($tiene_permiso == TRUE) {
					
					// EL USUARIO SI TIENE ACCESO AL METODO
					$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
					$data['username'] = USER;
					$data['rol'] = ROL;
			 		$data['get_all'] = $this->permisos_model->get_all();

					$this->load->model('tbl_recordatorios_crud_model'); 
					$this->tbl_recordatorios_crud_model->actualizar_status($id);
					#redirect('adultos/index');

				}
					else{

						$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
						$data['username'] = USER;
						$data['rol'] = ROL;
				 		$data['get_all'] = $this->permisos_model->get_all();

						$this->load->view('header_view');
						//$this->load->view('cabecera_view');
						$this->load->view('menu_view');
						$this->load->view('sorry_view',$data);
						$this->load->view('footer_view');
					}
			}
	}

	public function search($status_recordatorio = null)
	{	
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_recordatorios_crud_model');
			$data_recordatorios = $this->tbl_recordatorios_crud_model->show($status_recordatorio);
			if ( isset($data_recordatorios) && !empty($data_recordatorios) ) {
				foreach ($data_recordatorios as $recordatorio) {
					$this->recordatorio($recordatorio->email_recordatorio);
					$actualizar_status = $this->actualizar_status($recordatorio->id);
					#var_dump($actualizar_status); die();
					if ( isset($actualizar_status) && $actualizar_status == TRUE) {
						echo "Recordatorio enviado a: ".$recordatorio->email_recordatorio;
						echo "<br>";
					}
				}
			}
			
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_recordatorios_view',$data);
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ( isset($tiene_permiso) == true ) {
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$this->load->model('tbl_recordatorios_crud_model');
				$data_recordatorios = $this->tbl_recordatorios_crud_model->show($status_recordatorio);
				foreach ($data_recordatorios as $recordatorio) {
					$this->recordatorio($recordatorio->email_recordatorio);
					$this->actualizar_status($recordatorio->id);
					echo "Correo enviado a: ".$recordatorio->email_recordatorio;
					echo "<br>";
				}
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_recordatorios_view',$data);	
				$this->load->view('footer_view');
			}else{

				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
		
	}


	public function recordatorio($email = null)
	{	
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			#$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			#$data['username'] = USER;
			#$data['rol'] = ROL;
			#$data['get_all'] = $this->permisos_model->get_all();
			
			$config['protocol']    = 'smtp';
		    $config['smtp_host']    = 'autodiscover.aguascalientes.gob.mx';
		    $config['smtp_port']    = '25';
		    $config['smtp_timeout'] = '7';
		    $config['smtp_user']    = 'GOBAGS/luis.villasenor';
		    $config['smtp_pass']    = 'lgvA6773';
		    $config['charset']    = 'utf-8';
		    $config['newline']    = "\r\n";
		    $config['mailtype'] = 'html'; // or html
		    $config['validate'] = TRUE; // bool whether to validate email or not      
		    $this->email->initialize($config);
		    $this->email->from('luis@iceberg9.com', 'LUIS@ICEBERG9.COM');
		    $this->email->to($email); 
		    #$this->email->cc('luis.villasenor@aguascalientes.gob.mx,blanca.martinez@aguascalientes.gob.mx,rabindranath.garcia@aguascalientes.gob.mx'); 
		    $this->email->subject('NUEVO COMENTARIO EN SU CEDULA: ');
		    $this->email->message('
		    
		            <!DOCTYPE html>
		            <html>
		            <head>
		            <meta charset="utf-8">
		            </head>
		            <body>
		            
		            <h3>Tiene un nuevo comentario.</h3>
		            
		            
		            </body>
		            </html>
		            
		            ');
		    
		    #$this->email->send();
		    #echo $this->email->print_debugger();
		    
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ( isset($tiene_permiso) == true ) {
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		echo $email;
			}else{

				
			}				
			
		}
		
	}

*/



}