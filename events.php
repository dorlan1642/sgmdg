

<?php
include './parts/_header.php'
?>
<div class="container">
	<div class="row">
	<?php 
							include "./php/conexion.php";
							$resultado=$mysqli->query("select * from Events")or die ($mysqli->error);
								while ($fila= mysqli_fetch_array($resultado)) {
	
									
						 ?>
		<div class="gray-lighter ">
			<div class=" col-xs-12 col-sm-6 col-md-4  ">
				<a href="./event.php?id=<?php echo $fila['id']; ?>">
					<img class="img-thumbnail center-block  img-responsive marg-img " src="./img/img_events/<?php echo $fila['url_img']; ?>" alt="">
				<div>
					<h3>
					<?php echo $fila['date_event']; ?>
					</h3>
					<h5> <?php echo $fila['resume']; ?> </h5>
				</div>
				</a>
			

			</div>
		</div>
		<?php 

} 
?>
		
		
	</div>


</div>

</div>
</div>

</div>
</div>


<?php
include './parts/_footer_main.php'
?>