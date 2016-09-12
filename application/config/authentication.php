<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Niveles y Roles */
$config['levels_and_roles'] = array(
	'1' => 'usuario',
	'6' => 'manager',
	'9' => 'admin' 
);

/* Grupos */
$config['groups'] = array(
	'empleados' => 'manager,admin' 
);

?>