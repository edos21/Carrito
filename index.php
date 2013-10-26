<?php
	include 'lib/conexion.php';
	include 'lib/query.php';
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

		<?php foreach ($productos as $producto): ?>
			<div class="producto">
				<center>
					<img src="img/productos/<?php echo $producto['imagen'] ?>"><br>
					<span><?php echo $producto['nombre'] ?></span><br>
					<span>Precio: <?php echo $producto['precio'] ?></span><br>
					<a href="detalles.php?id=<?php echo $producto['id'] ?>">Ver</a>
				</center>
			</div>
		<?php endforeach; ?>
		</section>
	</body>
</html>