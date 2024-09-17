<?php
	define('HOST','bd_southpark');
	define('DB', 'south_park');
	define('USER', 'root');
	define('PASS', '');
	$dsn = 'mysql:host='. HOST . ';dbname='. DB;
		try{
			$bd = new PDO($dsn,USER,PASS);
			$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo htmlentities('Houve um erro na conexão: ' . $e->getMessage());
		}
?>