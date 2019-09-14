<?php
include "./parts/_header.php";
?>

<?php
    include './admin/php/conexion.php';
    $id=$_GET['id'];
    $resultado=$mysqli->query("select * from Members where id='$id'")or die($mysqli->error);
        while ($fila=mysqli_fetch_array($resultado)){
?>

<div class="container ">
    <img class="img-thumbnail center-block  img-responsive member-img" src="./img/img_members/<?php echo $fila['url_img']; ?>" alt="">
    <div class="gray-lighter ">
        <h1 class="member-h1"> <?php echo $fila['name']; ?> </h1>
        <h1 class="member-h2"><?php echo $fila['resume']; ?></h1>
        <p class="member-p"><?php echo $fila['content']; ?></p>
    </div>
</div>

<?php
}
?>

<?php
include 'parts/_footer_main.php'
?>