<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Gestion de Catalogos</title>
  <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/estilo.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>

<style type="text/css">
	#nombre_completo { text-transform: uppercase; }
  #nombre { text-transform: uppercase; }
	#cargo { text-transform: uppercase; }
	#correo_electonico { text-transform: lowercase }
  #username {text-transform: lowercase }
  #email {text-transform: lowercase }
  #otros_servicios {text-transform: uppercase }
  #categoria {text-transform: uppercase }
  #marca {text-transform: uppercase }
  #modelo {text-transform: uppercase }
  #hostname {text-transform: uppercase }
  #num_serie {text-transform: uppercase }
  #ubicacion {text-transform: uppercase }
  #componente {text-transform: lowercase }
  #recurso {text-transform: lowercase }
  #tipo {text-transform: uppercase }
  #nombre { text-transform: uppercase }
</style>



<body><!--Contenido de la pagina principal-->
	<div class="container">
<ol class="breadcrumb">
<?php echo $this->session->userdata('username') ?>
</ol>