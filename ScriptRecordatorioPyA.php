<?php
header("Acces-Control-Allow-Origin: http://www.croquetero.com");
header ("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$action = null;
	$email = null;
	$fecha_recordatorio = null;

	$action = $_GET['accion'];
	$email = $_GET['email'];
	$fecha = $_GET['fecha'];

	if ( isset($action) ) {

		#$host = "localhost"; $user = "fundcroq_master";	$pass = "wiC%Phou^"; $db = "fundcroq_catalogos";	
		$host = "localhost"; $user = "root";	$pass = "lgva6773"; $db = "fundcroq_catalogos";
		#$host = "internal-db.s202570.gridserver.com"; $user = "db202570";	$pass = "3bbcQt2WtV?"; $db = "db202570_devcroquetero";

		switch ($action) {
			case 'registrar':
					
					$email_recordatorio = $email;
					$fecha_recordatorio = $fecha;
					$producto = "Producto X 2016";

					#$email_recordatorio = $_GET['email'];
					#$fecha_recordatorio = $_GET['fecha'];
					#$producto = $_GET['producto'];
					
					if ( isset($email_recordatorio) && $email_recordatorio != null ) {
						
						if ( isset($fecha_recordatorio) && $fecha_recordatorio != null ) {
							
								try{
										$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
										$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

										$sth = $dbh->prepare('INSERT INTO recordatorios (email_recordatorio, fecha_recordatorio, producto) VALUES (:email_recordatorio, :fecha_recordatorio, :producto)');

										$sth->bindParam(':email_recordatorio', $email_recordatorio);
										$sth->bindParam(':fecha_recordatorio', $fecha_recordatorio);
										$sth->bindParam(':producto', $producto);
										
										$sth->execute();
										echo "Recordatorio registrado";
										return true;
								}
								catch(PDOException $e) {
									echo "Error: " . $e->getMessage();
								}
								
								$dbh = null;
								return false;

						}
						$dbh = null;
						return false;

					}
					$dbh = null;
					return false;		


				break;

			case 'recordatorio':
				
					$status_recordatorio = 0;
					$fecha_envio = date('Y-m-d H:i:s');
					$hoy = date('Y-m-d');
					try{
							$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
							$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							$sth = $dbh->prepare('SELECT * FROM recordatorios WHERE status_recordatorio=? AND fecha_recordatorio=?');
							$sth->execute(array($status_recordatorio,$hoy));
							$data_recordatorios = $sth->fetchAll(PDO::FETCH_ASSOC);
							if ( isset($data_recordatorios) && !empty($data_recordatorios) ) {
								foreach ($data_recordatorios as $recordatorio) {
									$id = $recordatorio['id'];
									$destinatario = $recordatorio['email_recordatorio'];
								    $asunto = "Recordatorio";
								    $mensaje = "Ya es tiempo de comprar mas";
								    mail($destinatario,$asunto,$mensaje);
								    
								    $sth = $dbh->prepare('UPDATE recordatorios SET status_recordatorio=1, fecha_envio=date("Y-m-d H:i:s") WHERE id=?');
									$sth->execute(array($id));
									
									echo "ID: ".$id." -- Destinatario: ".$destinatario." Fecha enviado: ".$fecha_envio."\n";
								}
								#echo "Recordatorios Enviados";
								exit();
							}
							echo "No hay Recordatorios para hoy";
							exit();
							#return true;
					}
					catch(PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
				break;
			default:
				echo "No es Accion";
				break;
		}
		$dbh = null;		
		exit();	
	}	
	die();

}
echo "No es GET";
die();