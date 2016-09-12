<?php
header("Acces-Control-Allow-Origin: http://www.croquetero.com");
header ("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	
	$host = "localhost"; $user = "fundcroq_master";	$pass = "wiC%Phou^"; $db = "fundcroq_catalogos";	

	$estatus = $_GET['estatus'];
				
		try{

			if ($estatus == 1) {
				$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sth = $dbh->prepare('SELECT * FROM codigos WHERE estatus=?');
				$sth->execute(array($estatus));
				
				$result = $sth->fetchAll();
				$count = count($result) - 1 ;
		
				if ( $count > -1 && $count <= 100 ) {
										
					//Envio de Notificacion para
					//generar nuevos codigos
					$destinatario = "gabriel@croquetero.com";
				    $asunto = "Notificacion de Nuevos Codigos Disponibles";
				    $mensaje = "Quedan ".$count." Códigos Disponibles, ya es tiempo de generar NUEVOS CODIGOS";
				    mail($destinatario,$asunto,$mensaje);

				} elseif( $count >= 0  ) {
					
				}

				$sth = $dbh->prepare('SELECT * FROM codigos WHERE estatus=? ORDER BY RAND() LIMIT 1 ');
				$sth->execute(array($estatus));
				$result = $sth->fetch(PDO::FETCH_ASSOC);
				
				if ( isset($result) && $result != false ) {
					$codigo = $result['codigo'];
					$sth = $dbh->prepare('UPDATE codigos SET estatus=0 WHERE codigo=?');
					$sth->execute(array($codigo));										
					$sth = $dbh->prepare('DELETE FROM codigos WHERE (codigo=? AND estatus = 0) LIMIT 1 ');
					$sth->execute(array($codigo));
					return print 'handlePcodigo(' . json_encode($result) . ');' ;
				}						
			}

		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

	
	$dbh = null;	


}
print json_encode(22);
exit();
/* 
Release Version 1.0 
*/