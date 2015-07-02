<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos extends CI_Controller {

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
		session_start();
	}

	public function index()
	{ 
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_permisos_view');
			$this->load->view('pie_view');
			$this->load->view('footer_view');
	}

	/*public function permisos()
	{	
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_permisos_view');
			$this->load->view('pie_view');
			$this->load->view('footer_view');
	}*/

	public function activar()
	{
		
	}

	public function desactivar()
	{
		
	}

	public function eliminar()
	{
		
	}

	public function editar()
	{
		
	}

	public function crear()
	{
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */