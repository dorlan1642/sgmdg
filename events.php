<?php
include './parts/_header.php'
?>

<div class="container">
	<div class="container events-title">
		<div class="section-title center">
			<h2 style="text-align">Todos los eventos</h2>
		</div>
	</div>
	<div class="container">
		<div class="col-md-4">
			<a href="./index.php#Events">
				<h3 class="members_all">&lArr; Inicio</h3>
			</a>
		</div>
	</div>
	<div id="padding-events" class="row">
	<?php 
		include "./admin/php/conexion.php";
		$resultado=$mysqli->query("select * from Events")or die ($mysqli->error);
			while ($fila= mysqli_fetch_array($resultado)) {
	?>

		<div class="gray-lighter ">
			<div class=" col-xs-12 col-sm-6 col-md-4  ">
				<a href="./event.php?id=<?php echo $fila['id']; ?>">
					<img class="img-thumbnail center-block  img-responsive marg-img image-focus" src="./img/img_events/<?php echo $fila['url_img']; ?>" alt="">
					<div style="text-align: center;">
						<h4 class="index-h3"><?php echo $fila['name']; ?></h4>
						<p class="index-span"> <?php echo $fila['date_event']; ?> </p>
					</div>
				</a>
			</div>
		</div>
	<?php 
	} 
	?>
</div>

<?php
include './parts/_footer_main.php'
?>