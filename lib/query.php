<?php

	try{

		$sql= "SELECT * FROM productos";
		$result = $pdo->query($sql);
		$result->execute();

	}
	catch(PDOException $e){

		$error = "Ha ocurrido un error al cargar los productos";
		echo $error;
		exit();

	}
	while($row = $result->fetch()){

		$productos[] = array(
			'id' => $row['id'],
			'nombre' => $row['nombre'],
			'imagen' => $row['imagen'],
			'precio' => $row['precio']);
		
	}

?>