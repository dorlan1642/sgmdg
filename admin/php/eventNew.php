 <?php
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

if (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/gif"))
{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
$uploadedfileload="false";}

$file_name=  $ranadd . "_" . $_FILES[uploadedfile][name] ;
$add="./../../img/img_events/$file_name";
if($uploadedfileload=="true"){

if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
    include './conexion.php';
	if ( isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['content'])&& isset($_POST['date_event'])){


		$name =$_POST['name'];
		$resume=$_POST['resume'];
        $content=$_POST['content'];
        $date_event=$_POST['date_event'];
		




		if ($name !="" && $resume!="" && $content !="" && $date_event!=""){

				
			$mysqli->query("insert into Events
				(name , resume, content, url_img, date_event, created_at) 
				values( '$name','$resume','$content','$file_name', STR_TO_DATE('$date_event', '%d-%m-%Y'), NOW())")
				or die ($mysqli->error);
				echo($id_us);

				header("Location:../alta_us.php?bien= Alta exitosa");
				echo($id_us);


		}else {
			header("Location: ../alta_us.php?error= Los campos no fueron completados");
		}


	}else{
			header("Location: ../events.php.php?error=  " + $_POST['id_us'] );

	} 


echo " Ha sido subido satisfactoriamente";



}else{echo "Error al subir el archivo" ;}

}else{echo $msg;}
?>