<?php
	include './conexion.php';
	
 if(isset($_POST['_submit']) && $_POST['_submit'] == "Eliminar"){
	 $id = $_POST['id'];
	
	 $resultado=$mysqli->query("SELECT url_img FROM News WHERE id='$id'")or die ($mysqli->error);
	 while ($fila= mysqli_fetch_array($resultado)) {
		 print($fila['url_img']);
	 unlink("./../../img/img_news/" . $fila['url_img']);

	 }
	 $mysqli->query("DELETE FROM News WHERE id='$id'") or die($mysqli->error);
	 header("Location:../news.php?bien=Eliminacion exitosa.");
	
 }	else{
    if (isset($_POST['id'])  && $_POST['id']!= ""){
		$id_new = $_POST['id'];
	

		function generateRandomString($length = 10) { 
			return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
		} 
		$ranadd =   generateRandomString();
		$resultado=$mysqli->query("SELECT url_img FROM News WHERE id='$id_new'")or die ($mysqli->error);
		while ($fila= mysqli_fetch_array($resultado)) {
			print($fila['url_img']);
		unlink("./../../img/img_news/" . $fila['url_img']);

		}
		$uploadedfileload="true";
		$uploadedfile_size=$_FILES[uploadedfile][size];
	
		if ($_FILES[uploadedfile][size]>20000000)
		{$msg=$msg."El archivo es mayor que 2000KB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";}
		
		/*if (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/gif" OR $_FILES[uploadedfile][type] =="image/png"))
		{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
		$uploadedfileload="false";}*/
		
		$file_name=  $ranadd . "_" . $_FILES[uploadedfile][name] ;
		$add="./../../img/img_news/$file_name";
		if($uploadedfileload=="true"){
		
		if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
		
			if ( isset($_POST['author']) && isset($_POST['title']) && isset($_POST['news_content']) && isset($_POST['news_date'])){
		
		
				$author =$_POST['author'];
				$title=$_POST['title'];
				$news_content=$_POST['news_content'];
				$news_date=$_POST['news_date'];

				
				$author= addslashes($author);
				$title = addslashes($title);
				$news_content = addslashes($news_content);
		
				#$tag_line = stripslashes($tag_line);
		
		
		
				if ($author !=""&& $title !="" && $news_content!="" && $news_date !=""){
		
						
					$mysqli->query("UPDATE News SET author='$author', title='$title', news_content='$news_content', news_date=STR_TO_DATE('$news_date', '%d-%m-%Y'), url_img='$file_name' WHERE id='$id_new'")
					or die ($mysqli->error);
						
		
						header("Location:../news.php?bien= Actualizacion exitosa");
						
		
		
				}else {
					header("Location: ../news.php?error= Los campos no fueron completados"."&id=". $_POST['id']);
				}
		
		
			}else{
					header("Location: ../new.php?error= Los campos no fueron completados" . $msg ."&id=". $_POST['id']);
		
			} 
		
		
	
		
		
		
		}elseheader("Location: ../new.php?error=error al subir el archivo"."&id=". $_POST['id'] );
		
		}else{
			header("Location: ../new.php?error=  " . $msg."&id=". $_POST['id'] );
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
	$add="./../../img/img_news/$file_name";
	if($uploadedfileload=="true"){
	
	if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
		
		if ( isset($_POST['author']) && isset($_POST['title']) && isset($_POST['news_content']) && isset($_POST['news_date'])){
		
		
			$author =$_POST['author'];
			$title=$_POST['title'];
			$news_content=$_POST['news_content'];
			$news_date=$_POST['news_date'];

			
			$author= addslashes($author);
			$title = addslashes($title);
			$news_content = addslashes($news_content);
	
			#$tag_line = stripslashes($tag_line);
	
	
	
			if ($author !=""&& $title !="" && $news_content!="" && $news_date !=""){
				
				$mysqli->query("INSERT INTO News
					(author , title, news_content, url_img, news_date, created_at) 
					VALUES( '$author', '$title', '$news_content','$file_name', STR_TO_DATE('$news_date', '%d-%m-%Y') , NOW())")
					or die ($mysqli->error);
					echo($id_us);
	
					header("Location:../news.php?bien= Alta exitosa");
					echo($id_us);
	
	
			}else {
				header("Location: ../new.php?error= Los campos no fueron completados"."&id=". $_POST['id']);
			}
	
	
		}else{
				header("Location: ../new.php?error= Los campos no fueron completados"."&id=". $_POST['id'] );
	
		} 
	
	
	echo " Ha sido subido satisfactoriamente";
	
	
}elseheader("Location: ../new.php?error=error al subir el archivo" );
		
}else{
	header("Location: ../new.php?error=  " . $msg );
}
}
 }





?>