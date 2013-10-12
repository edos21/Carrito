<?php

/*
** Colocar Datos del servidor
*/

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'carritocompras';


/*
** CONEXION A BASE DE DATOS (NO CAMBIAR)
*/

	$conexion = mysql_connect($server,$username,$password);
	mysql_select_db($db, $conexion);


?>