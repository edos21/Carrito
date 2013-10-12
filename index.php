<?php
	include 'conexion.php';
	$query = mysql_query('SELECT * FROM productos');
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
			<h1>Carrito De Compras</h1>
			<a href="carrito.php">Ver Carrito</a>
		</header>
		<section>

		<?php
			while ($q = mysql_fetch_array($query)) {
		?>
			<div class="producto">
				<center>
					<img src="img/productos/<?php echo $q['imagen'] ?>"><br>
					<span><?php echo $q['nombre'] ?></span><br>
					<span>Precio: <?php echo $q['precio'] ?></span><br>
					<a href="detalles.php?id=<?php echo $q['id'] ?>">Ver</a>
				</center>
			</div>
		<?php
			}
		?>

		</section>
	</body>
</html>