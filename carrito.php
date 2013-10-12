<?php
	
	session_start();
	include 'conexion.php';
	if (isset($_SESSION['carrito'])) {
		if(isset($_GET['id'])){
			$arreglo=$_SESSION['carrito'];
			$encontro=false;
			$numero=0;
			for ($i=0;$i<count($arreglo);$i++) {
				if ($arreglo[$i]['Id']==$_GET['id']) {
					$encontro=true;
					$numero=$i;
				}
			}
			if ($encontro==true) {
				$arreglo[$numero]['Cantidad']++;
				$_SESSION['carrito']=$arreglo;
			}else{
				$nombre="";
				$precio=0;
				$imagen="";
				$query=mysql_query("SELECT * FROM productos WHERE id=".$_GET['id']);
				while ($q=mysql_fetch_array($query)) {
					$nombre=$q['nombre'];
					$precio=$q['precio'];
					$imagen=$q['imagen'];
				}
				$nuevos=array('Id' => $_GET['id'],
								'Nombre'=>$nombre,
								'Precio'=>$precio,
								'Imagen'=>$imagen,
								'Cantidad'=>1);

				array_push($arreglo, $nuevos);
				$_SESSION['carrito']=$arreglo;
			}
		}
	}else{
		if (isset($_GET['id'])) {
			$nombre="";
			$precio=0;
			$imagen="";
			$query=mysql_query("SELECT * FROM productos WHERE id=".$_GET['id']);
			while ($q=mysql_fetch_array($query)) {
				$nombre=$q['nombre'];
				$precio=$q['precio'];
				$imagen=$q['imagen'];
			}
			$arreglo[]=array('Id' => $_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}

?>
<!Doctype html>
<html>
	<head>
		<title>Carrito de compras</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
	</head>
	<body>
		<header>
			<h1>Carrito de Compras</h1>
			<a href="carrito.php">Ver Carrito</a>
		</header>
		<section>
		<?php
			$total = 0;
			if (isset($_SESSION['carrito'])) {
				$datos = $_SESSION['carrito'];
				
				for ($i=0; $i <count($datos) ; $i++) { 
		?>
				<div class="producto">
					<center>
						<img src="img/productos/<?php echo $datos[$i]['Imagen']; ?>"><br>
						<span><?php echo $datos[$i]['Nombre']; ?></span><br>
						<span>Precio<?php echo $datos[$i]['Precio']; ?></span><br>
						<span>Cantidad 
							<input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
							data-precio="<?php echo $datos[$i]['Precio']; ?>"
							data-id="<?php echo $datos[$i]['Id']; ?>"
							class="cantidad"/>
						</span><br>
						<span class="subtotal">SubTotal <?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad']; ?></span><br>
					</center>
				</div>
		<?php
			$total+= $datos[$i]['Precio']*$datos[$i]['Cantidad'];
				}
			}else{
				echo '<center><h3>El carrito esta vacio</h3></center>';
			}
		?>
			<center><h3 id="total">Total: <?php echo $total; ?></h3>
			<a href="./">Ver Catalogo</a>
			<?php if ($total != 0) {?>
			<a href="./compras/compras.php">Comprar</a></center>
			<?php } ?>
		</section>
	</body>
</html>