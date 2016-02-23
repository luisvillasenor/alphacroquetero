<?php
header("Acces-Control-Allow-Origin: http://www.croquetero.com");
header ("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	
	#$host = "localhost"; $user = "fundcroq_master";	$pass = "wiC%Phou^"; $db = "fundcroq_catalogos";	
	$host = "localhost"; $user = "root";	$pass = "lgva6773"; $db = "fundcroq_catalogos";
	$email_recordatorio = "luis@iceberg9.com";
	$fecha_recordatorio = "2016-02-24";
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

}
print json_encode(22);
exit();