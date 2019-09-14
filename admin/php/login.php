<?php
session_start(); 
	if(isset($_POST['user']) && 
		isset($_POST['pass'])){
		include "./conexion.php";
		$re=$mysqli->query("select * from users
			where user='".$_POST['user']."' and
			 pass= '".($_POST['pass'])."'") or die ($mysqli->error);
			
			
		if(mysqli_num_rows($re)==1){
			while ($fila=mysqli_fetch_array($re)){
				$_SESSION['Id_user']=$fila['id_user'];
				$_SESSION['Name']=$fila['name'];
				$_SESSION['User']=$fila['user'];
				
			}
			header("Location:../menu.php");

		}else{
			header("Location:../index.php?error=Datos Erroneos");
		}	

	}else{
		header("Location:../index.php?error=Datos Invalidos");
	}


 ?>