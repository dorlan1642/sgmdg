 
<?php
	$nombreusuario="SGMDG";
	$passwordbd="q?jXe8a-_5ET";
	$servidor="localhost";
	$basedatos="sgmdg";
	
	$mysqli = new mysqli($servidor, $nombreusuario, $passwordbd,$basedatos);
	if($mysqli->connect_error){
		die('no se pudo conectar'.mysqli_connect_error());
	}
?>