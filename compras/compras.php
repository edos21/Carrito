<?php

session_start();
include '../conexion.php';
$arreglo=$_SESSION['carrito'];
$numeroventa=0;
$query=mysql_query("SELECT * FROM compras ORDER BY numeroventa DESC limit 1") or die(mysql_error());
while ($q=mysql_fetch_array($query)) {
	$numeroventa=$q['numeroventa'];
}
if ($numeroventa==0) {
	$numeroventa=1;
}else{
	$numeroventa++;
}
for ($i=0; $i <count($arreglo) ; $i++) { 
	mysql_query("INSERT INTO compras (numeroventa, nombre, imagen, precio, cantidad, subtotal)
	VALUES(".$numeroventa.",
			'".$arreglo[$i]['Nombre']."',
			'".$arreglo[$i]['Imagen']."',
			'".$arreglo[$i]['Precio']."',
			'".$arreglo[$i]['Cantidad']."',
			'".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']."'
			)") or die(mysql_error());
}
unset($_SESSION['carrito']);
header("location: ../index.php");
?>