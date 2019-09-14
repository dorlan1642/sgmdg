<?php
include "parts/_header.php";
?>

<div class="container">
	<div class="container events-title">
		<div class="section-title center">
			<h2 style="text-align">Todos los miembros</h2>
		</div>
	</div>
	<div class="container">
		<div class="col-md-4">
			<a href="./index.php#Members">
				<h3 class="members_all">&lArr; Inicio</h3>
			</a>
		</div>
	</div>
	<div class="row padding">
	<?php 
		include "./admin/php/conexion.php";
		$resultado=$mysqli->query("select * from Members")or die ($mysqli->error);
			while ($fila= mysqli_fetch_array($resultado)) {
	?>

		<div class="gray-lighter">
			<div class=" col-xs-12 col-sm-6 col-md-4  ">
				<a href="./member.php?id=<?php echo $fila['id']; ?>">
					<img class="img-thumbnail center-block  img-responsive marg-img image-focus" src="./img/img_events/<?php echo $fila['url_img']; ?>" alt="">
					<div>
						<h4 class="index-h4"><?php echo $fila['name']; ?></h4>
						<p class="index-p"> <?php echo $fila['resume']; ?> </p>
					</div>
				</a>
			</div>
		</div>
	<?php 
} 
?>
</div>

<?php
include 'parts/_footer_main.php'
?>