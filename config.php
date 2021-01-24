<?php
	$login = "root";
	$password="";
	$basedatos = "literatura"; 
	$conexion = mysqli_connect("localhost", $login, $password, $basedatos ); 
	mysqli_set_charset($conexion, "utf8");
?>
