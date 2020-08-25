 <?php
	include './conexion.php';
	
 if(isset($_POST['_submit']) && $_POST['_submit'] == "Eliminar"){
	 $id = $_POST['id'];
	
	 $resultado=$mysqli->query("SELECT url_img FROM Events WHERE id='$id'")or die ($mysqli->error);
	 while ($fila= mysqli_fetch_array($resultado)) {
		 print($fila['url_img']);
	 unlink("./../../img/img_events/" . $fila['url_img']);

	 }
	 $mysqli->query("DELETE FROM Events WHERE id='$id'") or die($mysqli->error);
	 header("Location:../events.php?bien=Eliminación exitosa.");
	
 }	else {
	

if (isset($_POST['id'])  && $_POST['id']!= ""){
		$id_event = $_POST['id'];
	

		function generateRandomString($length = 10) { 
			return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
		} 
		$ranadd =   generateRandomString();
		$resultado=$mysqli->query("SELECT url_img FROM Events WHERE id='$id_event'")or die ($mysqli->error);
		if ($_FILES[uploadedfile][size] > 0) {
		while ($fila= mysqli_fetch_array($resultado)) {
			print($fila['url_img']);
		unlink("./../../img/img_events/" . $fila['url_img']);

		}
		$uploadedfileload="true";
	}
		$uploadedfile_size=$_FILES[uploadedfile][size];
	
		if ($_FILES[uploadedfile][size]>20000000)
		{$msg=$msg."El archivo es mayor que 2000KB, debes reducirlo antes de subirlo<BR>";
		$uploadedfileload="false";}
		
		/*if (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/gif" OR $_FILES[uploadedfile][type] =="image/png"))
		{$msg=$msg."Error: Error: Es necesario subir una imagen. Deben ser tipo .jpg o .gif<BR>";
		$uploadedfileload="false";}*/
		
		$file_name=  $ranadd . "_" . $_FILES[uploadedfile][name] ;
		$add="./../../img/img_events/$file_name";
	if($uploadedfileload=="true"){
		
		if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
		
			if ( isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['content'])&& isset($_POST['date_event'])){
		
		
				$name =$_POST['name'];
				$resume=$_POST['resume'];
				$content=$_POST['content'];
				$date_event=$_POST['date_event'];
				
				$name = addslashes($name);
				$resume = addslashes($resume);
				$content = addslashes($content);
				#$tag_line = stripslashes($tag_line);
		
		
		
				if ($name !="" && $resume!="" && $content !="" && $date_event!=""){
		
						
					$mysqli->query("UPDATE Events SET name='$name',resume='$resume',content='$content',date_event=STR_TO_DATE('$date_event', '%d-%m-%Y'), url_img='$file_name' WHERE id='$id_event'")
					or die ($mysqli->error);
						
		
						header("Location:../events.php?bien= Actualización exitosa");
						
		
		
				}else {
					header("Location: ../event.php?error= Los campos no fueron completados"."&id=". $_POST['id']);
				}
		
		
			}else{
					header("Location: ../event.php?error= " . $msg ."&id=". $_POST['id']);
		
			} 
		
		}else
		{
			header("Location: ../event.php?error=error al subir el archivo"."&id=". $_POST['id'] );
		
		}
		}else{
			//header("Location: ../event.php?error=  " . $msg."&id=". $_POST['id'] );

			if ( isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['content'])&& isset($_POST['date_event'])){
		
		
				$name =$_POST['name'];
				$resume=$_POST['resume'];
				$content=$_POST['content'];
				$date_event=$_POST['date_event'];
				
				$name = addslashes($name);
				$resume = addslashes($resume);
				$content = addslashes($content);
				#$tag_line = stripslashes($tag_line);
		
		
		
				if ($name !="" && $resume!="" && $content !="" && $date_event!=""){
		
						
					$mysqli->query("UPDATE Events SET name='$name',resume='$resume',content='$content',date_event=STR_TO_DATE('$date_event', '%d-%m-%Y') WHERE id='$id_event'")
					or die ($mysqli->error);
						
		
						header("Location:../events.php?bien= Actualización exitosa");
						
		
		
				}else {
					header("Location: ../event.php?error= Los campos no fueron completados"."&id=". $_POST['id']);
				}
		
		
			}else{
					header("Location: ../event.php?error= " . $msg ."&id=". $_POST['id']);
		
			} 
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
	{$msg=$msg."El archivo es mayor que 2000KB, debes reducirlo antes de subirlo<BR>";
	$uploadedfileload="false";}
	 
	/*if (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/gif" OR $_FILES[uploadedfile][type] =="image/png"))
	{$msg=$msg."Error: Es necesario subir una imagen. Deben ser tipo .jpg o .gif<BR>";
	$uploadedfileload="false";}*/
	
	$file_name=  $ranadd . "_" . $_FILES[uploadedfile][name] ;
	$add="./../../img/img_events/$file_name";
	if($uploadedfileload=="true"){
	
	if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
		
		if ( isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['content'])&& isset($_POST['date_event'])){
	
	
			$name =$_POST['name'];
			$resume=$_POST['resume'];
			$content=$_POST['content'];
			$date_event=$_POST['date_event'];
			
			$name = addslashes($name);
			$resume = addslashes($resume);
			$content = addslashes($content);
			#$tag_line = stripslashes($tag_line);
	
	
	
			if ($name !="" && $resume!="" && $content !="" && $date_event!=""){
	
					
				$mysqli->query("insert into Events
					(name , resume, content, url_img, date_event, created_at) 
					values( '$name','$resume','$content','$file_name', STR_TO_DATE('$date_event', '%d-%m-%Y'), NOW())")
					or die ($mysqli->error);
					
	
					header("Location:../events.php?bien= Alta exitosa");
	
			}elseheader("Location: ../event.php?error= Los campos no fueron completados"."&id=". $_POST['id']);
	
	
		}else{
				header("Location: ../event.php?error= Los campos no fueron completados"."&id=". $_POST['id'] );

	
		} 
	
	
	echo " Ha sido subido satisfactoriamente";
	
	
}elseheader("Location: ../event.php?error=error al subir el archivo" );
		
}else{
	header("Location: ../event.php?error=  " . $msg );
}
}

 
} //primer else del code

?>