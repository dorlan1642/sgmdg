

<?php
include './parts/_header.php'
?>
<?php 
	include './php/conexion.php';
	$id=$_GET['id'];

	$resultado=$mysqli->query("select * from Events where 	id='$id'")or die($mysqli->error);

	while ($fila=mysqli_fetch_array($resultado)){
       
      
 ?>
 <div class="container">

 <h1> <?php echo $fila['id']."-". $fila['name']; ?> </h1>
 <?php echo $fila['content']; ?> 
 </div>

 <?php

	}
 ?>



<div class="container">
	
</div>


<?php
include './parts/_footer_main.php'
?>