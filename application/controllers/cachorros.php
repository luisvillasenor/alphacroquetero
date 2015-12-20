<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cachorros extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('encrypt');
		// Si la sesion no tiene datos, redireccionarlo fuera del sistema
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(site_url('welcome/logout')); 
		}
		// Se Definen constantes para facilitar la programacion
		define("SUPERROL", 1); // "SuperAdministrador"
		define('ROL',$this->session->userdata('rol'));
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',$this->session->userdata('username'));
	    //
	    $this->load->model('permisos_model');
  		$this->load->model('tbl_cachorros_crud_model');
  		$this->load->model('tbl_roles_model');
  		//$this->load->model('tbl_status_cpu_model');
  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
	}


	/**
	* Carga todos los SKUs del Catalogo
	*/
	public function index()
	{ 
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$data['titulo_cachorros'] = 'LISTA DE SKU´s CACHORROS';

			$this->load->model('tbl_cachorros_crud_model');
			$data['cargar_cachorros'] = $this->tbl_cachorros_crud_model->cargar_cachorros();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			
			$this->load->view('header_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_cachorros_view',$data);
			$this->load->view('footer_view');

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
				$data['titulo'] = 'LISTA DE SKU´s';

				$this->load->model('tbl_cachorros_crud_model');
				$data['cargar_cachorros'] = $this->tbl_cachorros_crud_model->cargar_cachorros();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_cachorros_view',$data);
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

	public function crear()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
		
			$presentacion = array(
				'sku' => $this->input->post('sku'),
				'producto' => $this->input->post('producto'),
				'presentacion' => $this->input->post('presentacion'),
				'edad' => $this->input->post('edad'),
				'peso' => $this->input->post('peso'),
				'porcion' => $this->input->post('porcion')
			);

			$this->load->model('tbl_cachorros_crud_model');
			$nuevo = $this->tbl_cachorros_crud_model->agregar($presentacion);
			redirect(site_url('cachorros/index'));	

		}
		// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
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

				$presentacion = array(
					'sku' => $this->input->post('sku'),
					'producto' => $this->input->post('producto'),
					'presentacion' => $this->input->post('presentacion'),
					'edad' => $this->input->post('edad'),
					'peso' => $this->input->post('peso'),
					'porcion' => $this->input->post('porcion')
				);

				$this->load->model('tbl_cachorros_crud_model');
				$nuevo = $this->tbl_cachorros_crud_model->agregar($presentacion);
				redirect(site_url('cachorros/index'));

				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$this->load->view('sorry_view',$data);
			}				
			
		}
	}

	public function actualizar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$presentacion = array(
				'id' => $this->input->post('id'),
				'sku' => $this->input->post('sku'),
				'producto' => $this->input->post('producto'),
				'presentacion' => $this->input->post('presentacion'),
				'edad' => $this->input->post('edad'),
				'peso' => $this->input->post('peso'),
				'porcion' => $this->input->post('porcion')
			);

			$this->load->model('tbl_cachorros_crud_model'); 
			$this->tbl_cachorros_crud_model->actualizar($presentacion);
			redirect(site_url('cachorros/index'));

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

		 		$presentacion = array(
				'id' => $this->input->post('id'),
				'sku' => $this->input->post('sku'),
				'producto' => $this->input->post('producto'),
				'presentacion' => $this->input->post('presentacion'),
				'edad' => $this->input->post('edad'),
				'peso' => $this->input->post('peso'),
				'porcion' => $this->input->post('porcion')
				);

				$this->load->model('tbl_cachorros_crud_model'); 
				$this->tbl_cachorros_crud_model->actualizar($presentacion);
				redirect('cachorros/index');

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

	public function detalles($sku) // Se recibe por la URL el id_del CPU
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			
			$this->load->model('tbl_cachorros_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include

			$data['cargar_detalles'] = $this->tbl_cachorros_crud_model->cargar_detalles($sku);
			$data['sku'] = $sku;
			
			$this->load->view('header_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_detalles_cachorro',$data);
			$this->load->view('footer_view');
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
			 		
				$this->load->model('tbl_cachorros_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include

				$data['cargar_detalles'] = $this->tbl_cachorros_crud_model->cargar_detalles($sku);
				$data['sku'] = $sku;
				
				$this->load->view('header_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_detalles_cachorro',$data);
				$this->load->view('footer_view');
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




	public function eliminar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$presentacion = array(
				'id' => $this->input->post('id'),
			);

			$this->load->model('tbl_cachorros_crud_model'); 
			$this->tbl_cachorros_crud_model->eliminar($presentacion);
			redirect(site_url('cachorros/index'));

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

				$presentacion = array(
					'id' => $this->input->post('id'),
				);

				$this->load->model('tbl_cachorros_crud_model'); 
				$this->tbl_cachorros_crud_model->eliminar($presentacion);
				redirect(site_url('cachorros/index'));

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

	public function eliminarsku($sku = null)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$this->load->model('tbl_cachorros_crud_model'); 
			$this->tbl_cachorros_crud_model->eliminarsku($sku);
			redirect(site_url('cachorros/index'));

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

				$this->load->model('tbl_cachorros_crud_model'); 
				$this->tbl_cachorros_crud_model->eliminarsku($sku);
				redirect(site_url('cachorros/index'));

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


/* End of file welcome.php */
}
/* Location: ./application/controllers/welcome.php */