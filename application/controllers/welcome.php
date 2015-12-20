<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {

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
	function __construct() /*Metodo constructor e inicializacion de librerias
								session y encrypt y modulo User*/
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->model('tbl_user_model');
	}

	public function index() /*Metodo principal se realiza la validacion 
								*/
	{

		$ci_session= $this->session->userdata('user_data');
		if (empty($ci_session)===FALSE) {
			//$this->logout();
			redirect(site_url('welcome/logout'));
		}

		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$credenciales = array(
			'username' => $username,
			'password' => $password
		);

		$existe = $this->tbl_user_model->verify_user($credenciales);
		$activo = $this->tbl_user_model->verify_status($credenciales);

		if ( ($existe == true) && ($activo == true) ) {
		//llamar al metodo para el tipo de rol para saber a donde tendra permisos de navegacion
			$id_tipo = $this->tbl_user_model->verify_rol($credenciales);//me guarda el areglo de verify_rol, llamo a la clase tbl_user_model y al metodo

			if ( isset($id_tipo) ) {

				switch ($id_tipo) {
				 	case 1://Rol SuperAdministrador
						$newdata= array(
							'username' => $username, 
							'rol' => $id_tipo,
							'id_status' => 1,
							'success' => TRUE,
							'logged_in'=> TRUE);
						$this->session->set_userdata($newdata);
						$this->input->set_cookie($newdata);
				 		redirect(site_url('home/index'));
				 	break;

				 	case 2://Rol Administrador
				 		$newdata= array(
							'username' => $username, 
							'rol' => $id_tipo,
							'id_status' => 1,
							'success' => TRUE,
							'logged_in'=> TRUE);
						$this->session->set_userdata($newdata);
						$this->input->set_cookie($newdata);
				 		redirect(site_url('home/index'));
				 	break;

				 	case 3://Rol Capturista
				 		$newdata= array(
							'username' => $username, 
							'rol' => $id_tipo,
							'id_status' => 1,
							'success' => TRUE,
							'logged_in'=> TRUE);
						$this->session->set_userdata($newdata);
						$this->input->set_cookie($newdata);
				 		redirect(site_url('home/index'));
				 	break;
				 	
				 	default:
					 	$this->load->view('header_view');				
						$this->load->view('505_view');
						$this->load->view('footer_view');
						$this->session->sess_destroy();
				 		//redirect('welcome/logout');
				 	break;
				}

			}
				$this->load->view('header_view');				
				$this->load->view('505_view');
				$this->load->view('footer_view');
				$this->session->sess_destroy();
	
		}else{

			$this->logout();
		}
		
	}

	public function logout()
	{
		$ci_session= $this->session->userdata('user_data');
		if (empty($ci_session)===TRUE) {
			$newdata= array(
				'username' => '', 
				'rol' => '',
				'id_status' => '',
				'logged_in'=> FALSE);
			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
		}
			$this->load->view('login_view');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */