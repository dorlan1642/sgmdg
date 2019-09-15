<?php
include "./parts/_header.php";
?>

<?php
    include './admin/php/conexion.php';
    $id = $_GET['id'];
    $resultado = $mysqli->query("select id, title, news_content, DATE_FORMAT(news_date,'%d/%m/%Y') 
    as news_date, url_img, author from News where id='$id'")or die($mysqli->error);
        while ($fila=mysqli_fetch_array($resultado)){
?>

<div class="container ">
    <div class="container">
			<div class="col-md-4">
				<a href="./news-all.php">
					<h3 class="members_all">&lArr; Volver a noticias</h3>
				</a>
			</div>
		</div>
    <img class="img-thumbnail center-block  img-responsive member-img" src="./img/img_news/<?php echo $fila['url_img']; ?>" alt="">
    <div class="gray-lighter ">
        <h1 class="member-h1"><?php echo $fila['title']; ?> </h1>
        <p class="news-date">Publicado el 
            <?php echo $fila['news_date'];?> por <?php echo $fila['author']; ?></p>
        <p class="member-p"><?php echo $fila['news_content']; ?></p>
    </div>
</div>

<?php
}
?>

<?php
include 'parts/_footer_main.php'
?>