<?php
include './parts/_header_main.php'
?>
<!--Top_content-->


<!--
<section id="top_content" class="top_cont_outer">
	<div class="top_cont_inner">
		<div class="container">
			<div class="top_content">
				<div class="row">
					<div class="col-lg-5 col-sm-7">
						<div class="top_left_cont flipInY wow animated">
							<h3>Colourful &amp; sexy!</h3>
							<h2>creating websites that
								make you stop &amp; stare</h2>
							<p> Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen
								aliquam, risus at semper. Proin iaculis purus consequat sem cure digni ssim. Donec
								porttitora entum. </p>
							<a href="#service" class="learn_more2">Learn more</a>
						</div>
					</div>
					<div class="col-lg-7 col-sm-5"> </div>
				</div>
			</div>
		</div>
	</div>
</section>
-->
<!--Top_content-->

<br>
<br>	
<div class="container">
<div class="center-block  iframe-container">
<iframe src="https://www.youtube.com/embed/rZ6j3MprxLI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

</div>

<!--Service-->
<!--
<section id="service">
	<div class="container">
		<h2>Services</h2>
		<div class="service_area">
			<div class="row">
				<div class="col-lg-4">
					<div class="service_block">
						<div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa-flash"></i></span>
						</div>
						<h3 class="animated fadeInUp wow">Quick TurnAround</h3>
						<p class="animated fadeInDown wow">Proin iaculis purus consequat sem cure digni. Donec
							porttitora entum suscipit aenean rhoncus posuere odio in tincidunt.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="service_block">
						<div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i
									class="fa-comments"></i></span> </div>
						<h3 class="animated fadeInUp wow">Friendly Support</h3>
						<p class="animated fadeInDown wow">Proin iaculis purus consequat sem cure digni. Donec
							porttitora entum suscipit aenean rhoncus posuere odio in tincidunt.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="service_block">
						<div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i
									class="fa-shield"></i></span> </div>
						<h3 class="animated fadeInUp wow">top Security</h3>
						<p class="animated fadeInDown wow">Proin iaculis purus consequat sem cure digni. Donec
							porttitora entum suscipit aenean rhoncus posuere odio in tincidunt.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
-->
<!--Service-->

<!--

	<div class="top_cont_latest">
		<div class="container">
			<h2>Latest Work</h2>
			<div class="work_section">
				<div class="row">
					<div class="col-lg-6 col-sm-6 wow fadeInLeft delay-05s">
						<div class="service-list">
							<div class="service-list-col1"> <i class="icon-doc"></i> </div>
							<div class="service-list-col2">
								<h3>Process Walkthrough</h3>
								<p>Proin iaculis purus digni consequat sem digni ssim. Donec entum digni ssim.</p>
							</div>
						</div>
						<div class="service-list">
							<div class="service-list-col1"> <i class="icon-comment"></i> </div>
							<div class="service-list-col2">
								<h3>24/7 support</h3>
								<p>Proin iaculis purus consequat sem digni ssim. Digni ssim porttitora .</p>
							</div>
						</div>
						<div class="service-list">
							<div class="service-list-col1"> <i class="icon-database"></i> </div>
							<div class="service-list-col2">
								<h3>Hosting & Storage</h3>
								<p>Proin iaculis purus consequat digni sem digni ssim. Purus donec porttitora entum.</p>
							</div>
						</div>
						<div class="service-list">
							<div class="service-list-col1"> <i class="icon-cog"></i> </div>
							<div class="service-list-col2">
								<h3>Customization options</h3>
								<p>Proin iaculis purus consequat sem digni ssim. Sem porttitora entum.</p>
							</div>
						</div>
						<div class="work_bottom"> <span>Ready to take the plunge?</span> <a href="#contact"
								class="contact_btn">Contact Us</a> </div>
					</div>
					<figure class="col-lg-6 col-sm-6  text-right wow fadeInUp delay-02s"> </figure>
				</div>
			</div>
		</div>
		-->
		<!--<div class="work_pic"><img src="img/dashboard_pic.png" alt=""></div>-->
	</div>
</section>
<br>
<br>

<section id="Members" class="events padding">

	<div class="container portfolio-title">
		<div class="section-title">
			<h2 style="text-align: center;">Miembros</h2>
		</div>
	</div>

	<div class="container">
		<div class="col-md-4">
			<a href="./members.php">
				<h3 class="members_all">&rArr;Mostrar todos los miembros...</h3>
			</a>
		</div>
	</div>


	<div class="client_area ">
		<!--miembros-->
		<div class="client_area ">
			<?php 
				include "./admin/php/conexion.php";
				$resultado=$mysqli->query("select * from Members ORDER BY FIELD (id,8) DESC limit 3")or die ($mysqli->error);
				$flag=false;
					while ($fila= mysqli_fetch_array($resultado)) {
						if($flag == true){$class="flt"; $arrow="quote_arrow2";} else {$class=""; $arrow="quote_arrow";}
			?>

			<div class="client_section animated  fadeInUp wow">
				<div class="client_profile <?php echo $class ?>">
					<a href="./member.php?id=<?php echo $fila['id']; ?>">
						<div class="client_profile_pic"><img class="image-focus"
								src="./img/img_members/<?php echo $fila['url_img']; ?>" alt="">
						</div>
						<h3><?php echo $fila['name']; ?></h3>
						<span><?php echo $fila['title']; ?></span>
				</div>
				<div class="quote_section <?php echo $class ?>">
					<div class="<?php echo $arrow ?>"></div>
					<p><b><img src="img/quote_sign_left.png" alt=""></b> <?php echo $fila['resume']; ?> <small><img
								src="img/quote_sign_right.png" alt=""></small> </p>
				</div>
				</a>
				<div class="clear"></div>
			</div>

			<?php 
				$flag = ! $flag;
				} 
			?>

		</div>
	</div>
</section>

<section id="Events" class="events padding">
	<div class="container events-title">
		<div class="section-title center">
			<h2 style="text-align">Eventos</h2>
		</div>
	</div>
	<div class="container">
		<div class="col-md-4">
			<a href="./events.php">
				<h3 class="members_all">&rArr;Mostrar todos los eventos...</h3>
			</a>
		</div>
	</div>
	<div class="container">
		<div class="row ">
			<?php 
					include "./admin/php/conexion.php";
					$resultado=$mysqli->query("select * from Events limit 6")or die ($mysqli->error);
						while ($fila= mysqli_fetch_array($resultado)) {
				?>
			<div class="gray-lighter ">
				<div class=" col-xs-12 col-sm-6 col-md-4 ">
					<a href="./event.php?id=<?php echo $fila['id']; ?>">
						<img class="img-thumbnail center-block img-responsive marg-img image-focus"
							src="./img/img_events/<?php echo $fila['url_img']; ?>" alt="">
						<div style="text-align: center;">
							<h4 class="index-h4"><?php echo $fila['name']; ?></h4>
							<p class="index-p"><?php echo $fila['date_event']; ?> </p>
						</div>
					</a>
				</div>
			</div>
			<?php 
				}
				?>
		</div>
	</div>
</section>

<section id="News" class="events padding">
	<div class="container events-title">
		<div class="section-title center">
			<h2 style="text-align">Noticias</h2>
		</div>
	</div>
	<div class="container">
		<div class="col-md-4">
			<a href="./news-all.php">
				<h3 class="members_all">&rArr;Mostrar todas las noticias...</h3>
			</a>
		</div>
	</div>
	<div class="container">
		<div class="row ">
			<?php 
					include "./admin/php/conexion.php";
					$resultado=$mysqli->query("select id, title, news_content, DATE_FORMAT(news_date,'%d/%m/%Y') 
					as news_date, url_img, author from News limit 6")or die ($mysqli->error);
						while ($fila= mysqli_fetch_array($resultado)) {
				?>
			<div class="gray-lighter ">
				<div class=" col-xs-12 col-sm-6 col-md-4 ">
					<a href="./news.php?id=<?php echo $fila['id']; ?>">
						<img class="img-thumbnail center-block img-responsive marg-img image-focus"
							src="./img/img_news/<?php echo $fila['url_img']; ?>" alt="">
						<div style="text-align: center;">
							<h4 class="index-h4"><?php echo $fila['title']; ?></h4>
							<p class="index-p">Publicado el <?php echo $fila['news_date']; ?></p>
						</div>
					</a>
				</div>
			</div>
			<?php 
				}
				?>
		</div>
	</div>
</section>

<?php
include './parts/_footer_main.php'
?>