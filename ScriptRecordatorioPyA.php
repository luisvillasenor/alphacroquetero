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
						'email_customer' 	  => $_GET['email_customer'],
						'name_customer' 	  => $_GET['name_customer'],
						'date_picker' 		  => $_GET['date_picker'],
						'name_pet' 			  => $_GET['name_pet'],
						'title_product' 	  => $_GET['title_product'],
						'image_product' 	  => $_GET['image_product'],
						'presentation_product'=> $_GET['presentation_product'],
						'portion' 			  => $_GET['portion'],
						'frecuency' 		  => $_GET['frecuency'],
						'price_list' 		  => $_GET['price_list'],
						'price_pya' 		  => $_GET['price_pya'],
						'donation' 			  => $_GET['donation'],
						'save_money' 		  => $_GET['save_money'],
						'booleano' 			  => $_GET['booleano'],
						'id_variant' 		  => $_GET['id_variant']
					);
			
					if ( isset($recordatorio['email_customer']) && $recordatorio['email_customer'] != null ) {
						
						if ( isset($recordatorio['date_picker']) && $recordatorio['date_picker'] != null ) {
							
								try{
										$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
										$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

										$sth = $dbh->prepare('INSERT INTO recordatorios (email_customer, name_customer, date_picker, name_pet, title_product, image_product, presentation_product, portion, frecuency, price_list, price_pya, donation, save_money, booleano, id_variant) VALUES (:email_customer, :name_customer, :date_picker, :name_pet, :title_product, :image_product, :presentation_product, :portion, :frecuency, :price_list, :price_pya, :donation, :save_money, :booleano, :id_variant)');

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
										return print 'handlePress([{"respuesta": 1}]);' ;
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
					'email_customer' 	  => $_GET['email_customer'],
					'name_customer' 	  => $_GET['name_customer'],
					'date_picker' 		  => date("Y-m-d"),
					'name_pet' 			  => $_GET['name_pet'],
					'title_product' 	  => $_GET['title_product'],
					'image_product' 	  => $_GET['image_product'],
					'presentation_product'=> $_GET['presentation_product'],
					'portion' 			  => $_GET['portion'],
					'frecuency' 		  => $_GET['frecuency'],
					'price_list' 		  => $_GET['price_list'],
					'price_pya' 		  => $_GET['price_pya'],
					'donation' 			  => $_GET['donation'],
					'save_money' 		  => $_GET['save_money'],
					'booleano' 			  => $_GET['booleano'],
					'id_variant' 		  => $_GET['id_variant']
				);

	
				#$date_picker = date("Y-m-d");
						
				if ( isset($recordatorio['email_customer']) && $recordatorio['email_customer'] != null ) {
						
						if ( isset($recordatorio['date_picker']) && $recordatorio['date_picker'] != null ) {
						
						try{
								$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
								$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								################
								$sth = $dbh->prepare('INSERT INTO recordatorios (email_customer, name_customer, date_picker, name_pet, title_product, image_product, presentation_product, portion, frecuency, price_list, price_pya, donation, save_money, booleano, id_variant) VALUES (:email_customer, :name_customer, :date_picker, :name_pet, :title_product, :image_product, :presentation_product, :portion, :frecuency, :price_list, :price_pya, :donation, :save_money, :booleano, :id_variant)');

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
							    $asunto = "Recordatorio";
							    $mensaje = "Ya es tiempo de comprar mas";
							    mail($destinatario,$asunto,$mensaje);
							    ################
							    $sth = $dbh->prepare('UPDATE recordatorios SET status_recordatorio=1, fecha_envio=date("Y-m-d H:i:s") WHERE id=?');
								$sth->execute(array($id));
								################
								return print 'handlePress([{"respuesta": 1}]);' ;
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
								    $asunto = "Recordatorio";
								    $mensaje = "Ya es tiempo de comprar mas";
								    mail($destinatario,$asunto,$mensaje);
								    
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