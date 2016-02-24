<?php
header("Acces-Control-Allow-Origin: http://www.croquetero.com");
header ("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$action = null;
	$action = $_GET['accion'];

	if ( isset($action) ) {

		switch ($action) {
			case 'registrar':
				
					#$host = "localhost"; $user = "fundcroq_master";	$pass = "wiC%Phou^"; $db = "fundcroq_catalogos";	
					$host = "localhost"; $user = "root";	$pass = "lgva6773"; $db = "fundcroq_catalogos";
					$email_recordatorio = "luis@iceberg9.com";
					$fecha_recordatorio = "2016-02-25";
					$producto = "Software 2016";


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
				
					#$host = "localhost"; $user = "fundcroq_master";	$pass = "wiC%Phou^"; $db = "fundcroq_catalogos";	
					$host = "localhost"; $user = "root";	$pass = "lgva6773"; $db = "fundcroq_catalogos";
					$status_recordatorio = 0;
					$fecha_envio = date('Y-m-d H:i:s');
					try{
							$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
							$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							$sth = $dbh->prepare('SELECT * FROM recordatorios WHERE status_recordatorio=?');
							$sth->execute(array($status_recordatorio));
							$data_recordatorios = $sth->fetchAll(PDO::FETCH_ASSOC);
							if ( isset($data_recordatorios) && !empty($data_recordatorios) ) {
								foreach ($data_recordatorios as $recordatorio) {
									$id = $recordatorio['id'];
									$destinatario = $recordatorio['email_recordatorio'];
								    echo $destinatario."\n";
								    
								    #$asunto = "Recordatorio";
								    #$mensaje = "Ya es tiempo de comprar mas";
								    #mail($destinatario,$asunto,$mensaje);
								    $sth = $dbh->prepare('UPDATE recordatorios SET status_recordatorio=1, fecha_envio=date("Y-m-d H:i:s") WHERE id=?');
									$sth->execute(array($id));
									#$this->recordatorio($recordatorio->email_recordatorio);
									#$actualizar_status = $this->actualizar_status($recordatorio->id);
									#var_dump($actualizar_status); die();
								}
							}
							echo "Recordatorios Enviados";
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