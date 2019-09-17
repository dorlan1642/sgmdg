<?php
	include './conexion.php';
	
 if(isset($_POST['_submit']) && $_POST['_submit'] == "Eliminar"){
	 $id = $_POST['id'];
	
	 $resultado=$mysqli->query("SELECT url_img FROM Members WHERE id='$id'")or die ($mysqli->error);
	 while ($fila= mysqli_fetch_array($resultado)) {
		 print($fila['url_img']);
	 unlink("./../../img/img_members/" . $fila['url_img']);

	 }
	 $mysqli->query("DELETE FROM Members WHERE id='$id'") or die($mysqli->error);
	 header("Location:../members.php?bien=Eliminacion exitosa.");
	
 }	else{
    if (isset($_POST['id'])  && $_POST['id']!= ""){
		$id_member = $_POST['id'];
	

		function generateRandomString($length = 10) { 
			return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
		} 
		$ranadd =   generateRandomString();
		$resultado=$mysqli->query("SELECT url_img FROM Members WHERE id='$id_member'")or die ($mysqli->error);
		while ($fila= mysqli_fetch_array($resultado)) {
			print($fila['url_img']);
		unlink("./../../img/img_members/" . $fila['url_img']);

		}
		$uploadedfileload="true";
		$uploadedfile_size=$_FILES[uploadedfile][size];
	
		if ($_FILES[uploadedfile][size]>20000000)
		{$msg=$msg."El archivo es mayor que 2000KB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";}
		
		if (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/gif" OR $_FILES[uploadedfile][type] =="image/png"))
		{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
		$uploadedfileload="false";}
		
		$file_name=  $ranadd . "_" . $_FILES[uploadedfile][name] ;
		$add="./../../img/img_members/$file_name";
		if($uploadedfileload=="true"){
		
		if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
		
			if ( isset($_POST['name'])&& isset($_POST['title']) && isset($_POST['resume']) && isset($_POST['content'])){
		
		
				$name =$_POST['name'];
				$title=$_POST['title'];
				$resume=$_POST['resume'];
				$content=$_POST['content'];

				
				$name = addslashes($name);
				$title = addslashes($title);
				$resume = addslashes($resume);
				$content = addslashes($content);
				#$tag_line = stripslashes($tag_line);
		
		
		
				if ($name !=""&& $title !="" && $resume!="" && $content !=""){
		
						
					$mysqli->query("UPDATE Members SET name='$name', title='$title' ,resume='$resume',content='$content', url_img='$file_name' WHERE id='$id_member'")
					or die ($mysqli->error);
						
		
						header("Location:../members.php?bien= Actualizacion exitosa");
						
		
		
				}else {
					header("Location: ../member.php?error= Los campos no fueron completados"."&id=". $_POST['id']);
				}
		
		
			}else{
					header("Location: ../member.php?error= " . $msg ."&id=". $_POST['id']);
		
			} 
		
		
	
		
		
		
		}elseheader("Location: ../member.php?error=error al subir el archivo"."&id=". $_POST['id'] );
		
		}else{
			header("Location: ../member.php?error=  " . $msg."&id=". $_POST['id'] );
		}

}else{
	function generateRandomString($length = 10) { 
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
	} 
	$ranadd =   generateRandomString();
	
	$uploadedfileload="true";
	$uploadedfile_size=$_FILES[uploadedfile][size];
	echo $_FILES[uploadedfile][name];
	if ($_FILES[uploadedfile][size]>20000000)
	{$msg=$msg."El archivo es mayor que 2000KB, debes reduzcirlo antes de subirlo<BR>";
	$uploadedfileload="false";}
	

	
	$file_name=  $ranadd . "_" . $_FILES[uploadedfile][name] ;
	$add="./../../img/img_members/$file_name";
	if($uploadedfileload=="true"){
	
	if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
		
		if ( isset($_POST['name']) && isset($_POST['title']) && isset($_POST['resume']) && isset($_POST['content'])){
	
	
			$name =$_POST['name'];
			$title = $_POST['title'];
			$resume=$_POST['resume'];
			$content=$_POST['content'];

			
			$name = addslashes($name);
			$resume = addslashes($resume);
			$title = addslashes($title);
			$content = addslashes($content);
			#$tag_line = stripslashes($tag_line);
			
	
	
			if ($name !="" &&  $title != "" && $resume!="" && $content !=""){
	
					
				$mysqli->query("insert into Members
					(name , title, resume, content, url_img, created_at) 
					values( '$name', '$title', '$resume','$content','$file_name', NOW())")
					or die ($mysqli->error);
					echo($id_us);
	
					header("Location:../members.php?bien= Alta exitosa");
					echo($id_us);
	
	
			}else {
				header("Location: ../member.php?error= Los campos no fueron completados"."&id=". $_POST['id']);
			}
	
	
		}else{
				header("Location: ../member.php?error= Los campos no fueron completados"."&id=". $_POST['id'] );
	
		} 
	
	
	echo " Ha sido subido satisfactoriamente";
	
	
}elseheader("Location: ../member.php?error=error al subir el archivo" );
		
}else{
	header("Location: ../member	.php?error=  " . $msg );
}
}
 }





?>