<?php

/*
** Datos del servidor
*/

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'carritocompras';


/*
** CONEXION A BASE DE DATOS (NO CAMBIAR)
*/

	try{
		$pdo = new PDO('mysql:host='.$server.';dbname='.$db,$username,$password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
	}
	catch(PDOException $e){
		$error="No se ha podido cargar la base de datos";
		echo $error;
	}


?>