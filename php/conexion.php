<?php
	$nombreusuario="user";
	$passwordbd="Galeana2020.";
	$servidor="localhost";
	$basedatos="sgmdg";
	
	$mysqli = new mysqli($servidor, $nombreusuario, $passwordbd,$basedatos);
	if($mysqli->connect_error){
		die('no se pudo conectar'.mysqli_connect_error());
	}
?>