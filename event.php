<?php
include './parts/_header.php'
?>

<?php 
	include './admin/php/conexion.php';
	$id=$_GET['id'];
	$resultado=$mysqli->query("select * from Events where id='$id'")or die($mysqli->error);
		while ($fila=mysqli_fetch_array($resultado)){
?>

<div class="container ">
    <div class="container">
			<div class="col-md-4">
				<a href="./events.php">
					<h3 class="members_all">&lArr; Volver a los eventos</h3>
				</a>
			</div>
		</div>
    <img class="img-thumbnail center-block  img-responsive member-img" src="./img/img_events/<?php echo $fila['url_img']; ?>" alt="">
    <div class="gray-lighter ">
        <h1 class="member-h1"> <?php echo $fila['name']; ?> </h1>
		<h1 class="member-h2"><?php echo $fila['date_event']; ?></h1>
		
		<div>
            <h4 style="font-size: 30px;"><?php echo $fila['resume']; ?></h4>
        </div>
        <div style="padding-bottom: 100px;">
            <p style="margin-bottom: 100px;" class="member-p"><br><?php echo $fila['content']; ?></p>
        </div>
    </div>
</div>

<?php
}
?>

<?php
include './parts/_footer_main.php'
?>