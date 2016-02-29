<?php
header("Acces-Control-Allow-Origin: http://www.croquetero.com");
header ("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$action 			  = null;
	$fecha_alta		 	  = null;
	$fecha_envio	 	  = null;
	$email_customer 	  = null;
	$name_customer 		  = null;
	$date_picker 		  = null;
	$name_pet 			  = null;
	$title_product 		  = null;
	$image_product 		  = null;
	$presentation_product = null;
	$portion 			  = null;
	$frecuency 			  = null;
	$price_list 		  = null;
	$price_pya 			  = null;
	$donation 			  = null;
	$save_money 		  = null;
	$boolean 			  = null;
	$id_variant 		  = null;
	$status_recordatorio  = null;

	$action = $_GET['accion'];

	if ( isset($action) ) {

		$host = "localhost"; $user = "fundcroq_master";	$pass = "wiC%Phou^"; $db = "fundcroq_catalogos";	
		#$host = "localhost"; $user = "root";	$pass = "lgva6773"; $db = "fundcroq_catalogos";
		#$host = "internal-db.s202570.gridserver.com"; $user = "db202570";	$pass = "3bbcQt2WtV?"; $db = "db202570_devcroquetero";

		switch ($action) {

			case 'registrar':

					$recordatorio = array( 
						'action' 	  		  => $_GET['accion'],
						'email_customer' 	  => html_entity_decode($_GET['email_customer']),
						'name_customer' 	  => $_GET['name_customer'],
						'date_picker' 		  => $_GET['date_picker'],
						'name_pet' 			  => $_GET['name_pet'],
						'title_product' 	  => $_GET['title_product'],
						'image_product' 	  => "https:".html_entity_decode($_GET['image_product']),
						'presentation_product'=> html_entity_decode($_GET['presentation_product']),
						'portion' 			  => html_entity_decode($_GET['portion']),
						'frecuency' 		  => html_entity_decode($_GET['frecuency']),
						'price_list' 		  => html_entity_decode($_GET['price_list']),
						'price_pya' 		  => html_entity_decode($_GET['price_pya']),
						'donation' 			  => html_entity_decode($_GET['donation']),
						'save_money' 		  => html_entity_decode($_GET['save_money']),
						'booleano' 			  => html_entity_decode($_GET['booleano']),
						'id_variant' 		  => html_entity_decode($_GET['id_variant'])
					);
			
					if ( isset($recordatorio['email_customer']) && $recordatorio['email_customer'] != null ) {
						
						if ( isset($recordatorio['date_picker']) && $recordatorio['date_picker'] != null ) {
							
								try{
										$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
										$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

										$sth = $dbh->prepare('INSERT INTO recordatorios (action, email_customer, name_customer, date_picker, name_pet, title_product, image_product, presentation_product, portion, frecuency, price_list, price_pya, donation, save_money, booleano, id_variant) VALUES (:action, :email_customer, :name_customer, :date_picker, :name_pet, :title_product, :image_product, :presentation_product, :portion, :frecuency, :price_list, :price_pya, :donation, :save_money, :booleano, :id_variant)');

										$sth->bindParam(':action', $recordatorio['action']);
										$sth->bindParam(':email_customer', $recordatorio['email_customer']);
										$sth->bindParam(':name_customer', $recordatorio['name_customer']);
										$sth->bindParam(':date_picker', $recordatorio['date_picker']);
										$sth->bindParam(':name_pet', $recordatorio['name_pet']);
										$sth->bindParam(':title_product', $recordatorio['title_product']);
										$sth->bindParam(':image_product', $recordatorio['image_product']);
										$sth->bindParam(':presentation_product', $recordatorio['presentation_product']);
										$sth->bindParam(':portion', $recordatorio['portion']);
										$sth->bindParam(':frecuency', $recordatorio['frecuency']);
										$sth->bindParam(':price_list', $recordatorio['price_list']);
										$sth->bindParam(':price_pya', $recordatorio['price_pya']);
										$sth->bindParam(':donation', $recordatorio['donation']);
										$sth->bindParam(':save_money', $recordatorio['save_money']);
										$sth->bindParam(':booleano', $recordatorio['booleano']);
										$sth->bindParam(':id_variant', $recordatorio['id_variant']);
										
										$sth->execute();
										return print 'handlePress([{"respuesta": 1},{"accion": "registrar"}]);' ;
								}
								catch(PDOException $e) {
									echo "Error: " . $e->getMessage();
								}
								
								$dbh = null;
								return print 'handlePress([{"respuesta": 0}]);' ;

						}
						$dbh = null;
						return print 'handlePress([{"respuesta": 0}]);' ;

					}
					$dbh = null;
					return print 'handlePress([{"respuesta": 0}]);' ;


				break;

			case 'enviarahora':
				
				$recordatorio = array( 
					'action' 	  		  => $_GET['accion'],
					'email_customer' 	  => html_entity_decode($_GET['email_customer']),
					'name_customer' 	  => $_GET['name_customer'],
					'date_picker' 		  => date("Y-m-d"),
					'name_pet' 			  => $_GET['name_pet'],
					'title_product' 	  => $_GET['title_product'],
					'image_product' 	  => "https:".html_entity_decode($_GET['image_product']),
					'presentation_product'=> html_entity_decode($_GET['presentation_product']),
					'portion' 			  => html_entity_decode($_GET['portion']),
					'frecuency' 		  => html_entity_decode($_GET['frecuency']),
					'price_list' 		  => html_entity_decode($_GET['price_list']),
					'price_pya' 		  => html_entity_decode($_GET['price_pya']),
					'donation' 			  => html_entity_decode($_GET['donation']),
					'save_money' 		  => html_entity_decode($_GET['save_money']),
					'booleano' 			  => html_entity_decode($_GET['booleano']),
					'id_variant' 		  => html_entity_decode($_GET['id_variant'])
				);

	
				#$date_picker = date("Y-m-d");
						
				if ( isset($recordatorio['email_customer']) && $recordatorio['email_customer'] != null ) {
						
						if ( isset($recordatorio['date_picker']) && $recordatorio['date_picker'] != null ) {
						
						try{
								$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
								$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								################
								$sth = $dbh->prepare('INSERT INTO recordatorios (action, email_customer, name_customer, date_picker, name_pet, title_product, image_product, presentation_product, portion, frecuency, price_list, price_pya, donation, save_money, booleano, id_variant) VALUES (:action, :email_customer, :name_customer, :date_picker, :name_pet, :title_product, :image_product, :presentation_product, :portion, :frecuency, :price_list, :price_pya, :donation, :save_money, :booleano, :id_variant)');

								$sth->bindParam(':action', $recordatorio['action']);
								$sth->bindParam(':email_customer', $recordatorio['email_customer']);
								$sth->bindParam(':name_customer', $recordatorio['name_customer']);
								$sth->bindParam(':date_picker', $recordatorio['date_picker']);
								$sth->bindParam(':name_pet', $recordatorio['name_pet']);
								$sth->bindParam(':title_product', $recordatorio['title_product']);
								$sth->bindParam(':image_product', $recordatorio['image_product']);
								$sth->bindParam(':presentation_product', $recordatorio['presentation_product']);
								$sth->bindParam(':portion', $recordatorio['portion']);
								$sth->bindParam(':frecuency', $recordatorio['frecuency']);
								$sth->bindParam(':price_list', $recordatorio['price_list']);
								$sth->bindParam(':price_pya', $recordatorio['price_pya']);
								$sth->bindParam(':donation', $recordatorio['donation']);
								$sth->bindParam(':save_money', $recordatorio['save_money']);
								$sth->bindParam(':booleano', $recordatorio['booleano']);
								$sth->bindParam(':id_variant', $recordatorio['id_variant']);
								$sth->execute();
								################
								$id = $dbh->lastInsertId();
								################
								$destinatario = $recordatorio['email_customer'];
							    $asunto = "Recordatorio Programa y Ahorra";
							    $message = "
							    <html>
<head><title></title></head>
<body style='font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; background: #ebebeb;' bgcolor='#ebebeb'>
<style type='text/css'>
.initial-section .call-to-action a:hover {
background: #f38809;
}
</style>


<div id='wrapper' style='width: 760px; background: #fff; margin: 0 auto; padding: 25px; border: 1px solid #58585a;'>

	<div class='header' style='padding: 20px 0; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #58585a; margin-bottom: 20px;'>
		<img src='https://cdn.shopify.com/s/files/1/0740/0383/t/12/assets/croquetero-logo-email.png?3107721613896352263' alt='' style='height: auto; width: 100%; max-width: 300px; display: block;'>
	</div>

	<div class='initial-section' style='background: transparent url('http://fundacioncroquetero.org/bgpya_1.png') no-repeat center bottom;'>
		<span class='regards' style='display: inline-block; color: #616161; font-size: 20px; font-weight: 700;'>Estimado Alan Kimo,</span>
		<p style='font-size: 14px;'>Este es un recordatorio con la informaci&oacute;n del producto que te interes&oacute; adquirir. Si lo deseas puedes realizar ahora mismo tu compra, s&oacute;lo da click en el bot&oacute;n Comprar producto. No esperes m&aacute;s y consiente a tu peludo con su alimento preferido.</p>

		<div class='img-product' style='text-align: center; margin: 20px 0;' align='center'>
			<img src='".$recordatorio['image_product']."' alt='".$recordatorio['title_product']." (".$recordatorio['presentation_product'].")'>
		</div>

		<div class='title-product' style='color: #616161; font-size: 18px; font-weight: 600; text-align: center;' align='center'>
			".$recordatorio['title_product']." (".$recordatorio['presentation_product'].")
		</div>

		<div class='call-to-action' style='padding-bottom: 150px; text-align: center; margin: 30px 0 0;' align='center'>
			<a href='#' style='display: inline-block; color: #fff; font-size: 20px; font-weight: 600; text-decoration: none; background: #f49500; padding: 20px 40px;'><img src='cart-icon.png'> Comprar Producto</a>
		</div>
	</div>

	<div class='ficha'>
		
		<p class='email-codigo' style='text-align: center; color: #fff; font-size: 20px; font-weight: bold; background: #f59321; padding: 10px;' align='center'>Ficha Programa y Ahorra</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><span style='color: #f59321; font-weight: bold;'>Nombre:</span> ".$recordatorio['name_pet']."</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><img src='https://%7B%7B%20attributes.imageBulto%20%7D%7D' style='max-width: 100px;'></p>
		
		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><span style='color: #f59321; font-weight: bold;'>Alimento:</span> ".$recordatorio['title_product']."</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><span style='color: #f59321; font-weight: bold;'>Presentaci&oacute;n:</span> ".$recordatorio['presentation_product'].".</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><img src='https://cdn.shopify.com/s/files/1/0740/0383/files/Mail_R.jpg?15630891721542932741' alt='Raci&oacute;n'><span style='color: #f59321; font-weight: bold;'>   Raci&oacute;n diaria recomendada:</span> ".$recordatorio['portion'].".</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><img src='https://cdn.shopify.com/s/files/1/0740/0383/files/Mail_F.jpg?15630891721542932741' alt='Frecuencia'><span style='color: #f59321; font-weight: bold;'>   Frecuencia recomendada*:</span> ".$recordatorio['frecuency'].".</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><img src='https://cdn.shopify.com/s/files/1/0740/0383/files/Mail_P.jpg?15630891721542932741' alt='Programa y Ahorra'><span style='color: #f59321; font-weight: bold;'>   Precio Programa y Ahora**:</span> ".$recordatorio['price_pya']." (Precio regular <del>".$recordatorio['price_list']." </del>).</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'><img src='https://cdn.shopify.com/s/files/1/0740/0383/files/Mail_D.jpg?15630891721542932741' alt='Donaci&oacute;n anual'><span style='color: #f59321; font-weight: bold;'>   Donaci&oacute;n anual***:</span> ".$recordatorio['donation'].".</p>

		<i style='font-size: 12px; padding-top: 30px; display: block;'>* Es la duraci&oacute;n estimada de tu bulto de alimento acorde con la raci&oacute;n diaria recomendada por la marca, seg&uacute;n las caracter&iacute;sticas de tu mascota. Si el consumo de alimento de tu mascota es distinto, no te preocupes. Ll&aacute;manos y relizaremos este cambio.</i>

		<i style='font-size: 12px; padding-top: 30px; display: block;'>** Al programar y prepagar tus pedidos obtienes el descuento Programa y Ahorra de Croquetero. &iquest;Tienes duda de c&oacute;mo prepagar tus siguientes pedidos? <a href='#' style='color: inherit;'>Da click aqu&iacute;</a></i>

		<i style='font-size: 12px; padding-top: 30px; display: block;'>*** Con este programa tu mascota alimenta a otra mascota de Croquetero, con tus compras de alimento ayudas a nutrir a perros y gatos en adopci&oacute;n. Conoce m&aacute;s sobre el <a href='#' style='color: inherit;'>'Movimiento Croquetero'</a></i>

	</div>

	<div class='footer'>

		<h2 style='font-size: 25px; font-weight: bold; margin: 0; padding: 30px 0 0;'>Preguntas frecuentes</h2>

		<h3 style='font-size: 18px; font-weight: normal; margin: 0; padding: 30px 0;'><span style='color: #f59321;'>&iquest;Cu&aacute;ndo recibir&eacute; mi pedido?</span></h3>

		<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>Entregas en el DF y zona metropolitana 1 a 3 d&iacute;as h&aacute;biles</p>

		<p style='font-size: 14px;'>Entregas fuera del DF y zona metropolitana 2 a 5 d&iacute;as h&aacute;biles</p>

		<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>Si tu pedido incluye alimento y accesorios, intentaremos enviarte tu pedido completo dentro de los tiempos indicados. En ocasiones puedes llegar a recibir en env&iacute;os separados el alimento y los accesorios con el fin de entregarte a la brevedad lo que tipicamente urge m&aacute;s.</p>

		<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>Ten en cuenta que existen ciertos accesorios que conllevan una personalizaci&oacute;n lo cual puede atrasar la entrega. Igualmente si tu pedido incluye productos 'pre-ordena', &eacute;stos est&aacute;n sujetos a la informaci&oacute;n de entrega disponible en la p&aacute;gina del producto.</p>

		<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>Finalmente, si alguno de los productos en tu orden llegara a agotarse por causas ajenas a Croquetero, nos comunicaremos contigo para reprogramar la entrega.</p>

		<h3 style='font-size: 18px; font-weight: normal; margin: 0; padding: 30px 0;'><span style='color: #f59321;'>&iquest;Te urge tu pedido o no tienes disponibilidad para recibir en cualquier momento del d&iacute;a?</span></h3>

		<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>Por favor notif&iacute;canos al (55) 6386-8856 o bien respondiendo este correo en horarios de atenci&oacute;n (L a V de 8 am a 8 pm y s&aacute;bado de 10 am a 6 pm) y haremos todo lo posible por coordinar la entrega acorde a tus necesidades.</p>

		<h3 style='font-size: 18px; font-weight: normal; margin: 0; padding: 30px 0;'><span style='color: #f59321;'>&iquest;Requieres factura de tu compra?</span></h3>

		<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>Por favor responde a este correo proporcionando los siguientes datos:</p>

		<p class='email-especial' style='padding-left: 15px; padding-right: 15px; font-size: 14px;'>

			<span style='color: #f59321; font-weight: bold;'>Raz&oacute;n Social</span><br><span style='color: #f59321; font-weight: bold;'>RFC</span><br><span style='color: #f59321; font-weight: bold;'>Direcci&oacute;n fiscal</span><br></p>

		<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>Las facturas ser&aacute;n enviadas al correo electr&oacute;nico de tu cuenta en un plazo m&aacute;ximo de 2 d&iacute;as h&aacute;biles posterior a la entrega y pago de tu pedido.</p>

		
		<div class='email-dudas' style='width: 100%; padding-top: 30px; padding-bottom: 30px;'><p style='height: 30px; color: #fff; font-size: 14px; font-weight: bold; text-align: center; line-height: 30px; background: #58585a;' align='center'>&iquest;Dudas o cambios? Comun&iacute;cate a la l&iacute;nea VET (55) 6386-8856</p></div>

		<div class='email-footer' style='text-align: center;' align='center'>

			<p style='font-size: 16px; line-height: 137.5%; font-weight: normal; margin: 0; padding: 0 0 30px;'>&iquest;Te gusta lo que ofrecemos? Siguenos en nuestras redes sociales</p>

			<a href='https://twitter.com/soycroquetero' title='Twitter'><img src='https://cdn.shopify.com/s/files/1/0740/0383/t/12/assets/icono-email-twitter.png?17976203956481532224' alt='Twitter'></a>

			<a href='https://www.facebook.com/Croquetero' title='Facebook'><img src='https://cdn.shopify.com/s/files/1/0740/0383/t/12/assets/icono-email-facebook.png?13608627287219887544' alt='Facebook'></a>

		</div>

	</div>

</div>




</body>
</html>


									";

									// Always set content-type when sending HTML email
									$headers = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
									// More headers
									$headers .= 'From: <contacto@croquetero.com>' . "\r\n";
							    mail($destinatario,$asunto,$message,$headers);
							    ################
							    $sth = $dbh->prepare('UPDATE recordatorios SET status_recordatorio=1, fecha_envio=date("Y-m-d H:i:s") WHERE id=?');
								$sth->execute(array($id));
								################
								return print 'handlePress([{"respuesta": 1},{"accion": "enviarahora"}]);' ;
						}
						catch(PDOException $e) {
							echo "Error: " . $e->getMessage();
							$dbh = null;
							return print 'handlePress([{"respuesta": 0}]);' ;
						}
						
						$dbh = null;
						return print 'handlePress([{"respuesta": 0}]);' ;

					}
					$dbh = null;
					return print 'handlePress([{"respuesta": 0}]);' ;

				}
				$dbh = null;
				return print 'handlePress([{"respuesta": 0}]);' ;


				break;


			case 'recordatorio':

					$status_recordatorio = 0;
					$hoy = date('Y-m-d');
					try{
							$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
							$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							$sth = $dbh->prepare('SELECT * FROM recordatorios WHERE status_recordatorio=? AND date_picker=?');
							$sth->execute(array($status_recordatorio,$hoy));
							$data_recordatorios = $sth->fetchAll(PDO::FETCH_ASSOC);
							if ( isset($data_recordatorios) && !empty($data_recordatorios) ) {
								foreach ($data_recordatorios as $recordatorio) {
									$id = $recordatorio['id'];
									$destinatario = $recordatorio['email_customer'];
								    $asunto = "Recordatorio Programa y Ahorra";
								    $message = '';

									// Always set content-type when sending HTML email
									$headers = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
									// More headers
									$headers .= 'From: <contacto@croquetero.com>' . "\r\n";
							    	mail($destinatario,$asunto,$message,$headers);
								    
								    $sth = $dbh->prepare('UPDATE recordatorios SET status_recordatorio=1, fecha_envio=date("Y-m-d H:i:s") WHERE id=?');
									$sth->execute(array($id));
									#echo "ID: ".$id." -- Destinatario: ".$destinatario." Fecha enviado: ".$fecha_envio."\n";
								}
								return print 'handlePress([{"respuesta": 1}]);' ;
								#echo "Recordatorios Enviados";
								exit();
							}
							#echo "No hay Recordatorios para hoy";
							return print 'handlePress([{"respuesta": 0}]);' ;
							exit();
							#return true;
					}
					catch(PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
				break;
			default:
				#echo "No es Accion";
				return print 'handlePress([{"respuesta": 0}]);' ;
				break;
		}
		$dbh = null;
		return print 'handlePress([{"respuesta": 0}]);' ;
		exit();	
	}
	return print 'handlePress([{"respuesta": 0}]);' ;
	die();

}
#echo "No es GET";
return print 'handlePress([{"respuesta": 0}]);' ;
die();