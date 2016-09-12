<?php
header("Acces-Control-Allow-Origin: http://www.croquetero.com");
header ("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$host = "localhost";
	$user = "fundcroq_master";
	$pass = "wiC%Phou^";
	$db = "fundcroq_catalogos";

	$sku = $_GET['sku'];
	$peso = $_GET['peso'];
	$edad = $_GET['edad'];

	try{
		$dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sth = $dbh->prepare('SELECT * FROM cachorro WHERE sku=? AND peso=? AND edad=?');
		$sth->execute(array($sku, $peso, $edad));
		return print 'handleP(' . json_encode($sth->fetchAll(PDO::FETCH_ASSOC)) . ');' ;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$dbh = null;
}

print json_encode(22);
exit();