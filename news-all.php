<?php
include "parts/_header.php";
?>

<div class="container">
	<div class="container events-title">
		<div class="section-title center">
			<h2 style="text-align">Todas las noticias</h2>
		</div>
	</div>
	<div class="row padding">
	<?php 
		include "./admin/php/conexion.php";
		$resultado=$mysqli->query("select * from News")or die ($mysqli->error);
			while ($fila= mysqli_fetch_array($resultado)) {
	?>

		<div class="gray-lighter">
			<div class=" col-xs-12 col-sm-6 col-md-4  ">
				<a href="./news.php?id=<?php echo $fila['id']; ?>">
					<img class="img-thumbnail center-block  img-responsive marg-img image-focus" src="./img/img_news/<?php echo $fila['url_img']; ?>" alt="">
					<div>
						<h4 class="index-h4"><?php echo $fila['title']; ?></h4>
						<p class="index-p">Publicado en <?php echo $fila['news_date']; ?></p>
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