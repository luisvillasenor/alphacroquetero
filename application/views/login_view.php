<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>WebApp Gestion de Catalogos Croquetero</title>
	<meta name="description" content="WebApp Gestion de Catalogos Croquetero">
	<meta name="author" content="http://www.iceberg9.com">
	<link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

		.form-signin {
			max-width: 300px;
			padding: 19px 29px 29px;
			margin: 0 auto 20px;
			background-color: #fff;
			border: 1px solid #e5e5e5;
			-webkit-border-radius: 5px;
			   -moz-border-radius: 5px;
			        border-radius: 5px;
			-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
			   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
			        box-shadow: 0 1px 2px rgba(0,0,0,.05);
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin input[type="text"],
		.form-signin input[type="password"] {
			font-size: 16px;
			height: auto;
			margin-bottom: 15px;
			padding: 7px 9px
		}

	</style>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>

<body>  <!--Contenedor de la pagina principal-->
	<div class="container"> <!--Contenido-->

		<form class="form-signin" id="" name="" method="post" action="<?php echo site_url('welcome/index'); ?>">
			<h2 class="form-signin-heading">Iniciar Sesión</h2>
			<input type="text" id="username" name="username" class="input-block-level" placeholder="Usuario">
			<input type="password" id="password" name="password" class="input-block-level" placeholder="Password">
			<button type="submit" class="btn btn-large btn-primary">Acceso</button>
		</form>


	</div> <!--fin de contenido-->
		

	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrapValidator.min.js"></script>
	<script src="<?php echo base_url(); ?>js/validator.js"></script>

</body> <!--Fin de contenedor de la pagina principal-->
</html>
