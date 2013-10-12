<?php
	include 'conexion.php';
	$query = mysql_query('SELECT * FROM productos WHERE id='.$_GET['id']);
?>

<!Doctype html>
<html>
	<head>
		<title>Carrito de compras</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/scripts.js"></script>
	</head>
	<body>
		<header>
			<h1>Detalles</h1>
			<a href="carrito.php">Ver Carrito</a>
		</header>
		<section>

		<?php
			while ($q = mysql_fetch_array($query)) {
		?>
				<center>
					<img src="img/productos/<?php echo $q['imagen'] ?>"><br>
					<span><?php echo $q['nombre'] ?></span><br>
					<span>Detalles: <?php echo $q['descripcion'] ?></span>
					<span>Precio: <?php echo $q['precio'] ?></span><br>
					<a href="carrito.php?id=<?php echo $q['id'] ?>">A&ntilde;adir</a>
				</center>
		<?php
			}
		?>

		</section>
	</body>
</html>