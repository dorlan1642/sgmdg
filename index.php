<?php
include './parts/_header_main.php'
?>
	<!--Top_content-->
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
								<p> Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper. Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum. </p>
								<a href="#service" class="learn_more2">Learn more</a> </div>
						</div>
						<div class="col-lg-7 col-sm-5"> </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Top_content-->

	<!--Service-->
	<section id="service">
		<div class="container">
			<h2>Services</h2>
			<div class="service_area">
				<div class="row">
					<div class="col-lg-4">
						<div class="service_block">
							<div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa-flash"></i></span> </div>
							<h3 class="animated fadeInUp wow">Quick TurnAround</h3>
							<p class="animated fadeInDown wow">Proin iaculis purus consequat sem cure digni. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i class="fa-comments"></i></span> </div>
							<h3 class="animated fadeInUp wow">Friendly Support</h3>
							<p class="animated fadeInDown wow">Proin iaculis purus consequat sem cure digni. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa-shield"></i></span> </div>
							<h3 class="animated fadeInUp wow">top Security</h3>
							<p class="animated fadeInDown wow">Proin iaculis purus consequat sem cure digni. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Service-->

	<section id="work_outer">
		<!--main-section-start-->
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
							<div class="work_bottom"> <span>Ready to take the plunge?</span> <a href="#contact" class="contact_btn">Contact Us</a> </div>
						</div>
						<figure class="col-lg-6 col-sm-6  text-right wow fadeInUp delay-02s"> </figure>
					</div>
				</div>
			</div>
			<!--<div class="work_pic"><img src="img/dashboard_pic.png" alt=""></div>-->
		</div>
	</section>

	<section id="Members" class="events padding">

		<div class="container portfolio-title">
			<div class="section-title">
				<h2 style="text-align: center;">Miembros</h2>
			</div>
		</div>

		<div class="portfolio-top"></div>

		<div class="container">

			<div class="container">
				<div class="col-md-4">
					<a href="./members.php">
						<h3 class="members_all">&rArr;Mostrar todos los miembros...</h3>
					</a>
				</div>
			</div>
			
			<div class="container">
				<div class="row">
					<?php 
						include "./admin/php/conexion.php";
						$resultado=$mysqli->query("select * from Members limit 6")or die ($mysqli->error);
							while ($fila= mysqli_fetch_array($resultado)) {
					?>
					<div class="gray-lighter ">
						<div class=" col-xs-12 col-sm-6 col-md-4 ">
							<a href="./member.php?id=<?php echo $fila['id']; ?>">
								<img class="img-thumbnail center-block  img-responsive marg-img image-focus" src="./img/img_events/<?php echo $fila['url_img']; ?>" alt="">
								<div>
									<h4 class="index-h4"><?php echo $fila['name']; ?></h4>
									<p class="index-p"><?php echo $fila['resume']; ?> </p>
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
							<div>
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
							<div>
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


	<section class="main-section" id="client_outer">
		<!--main-section client-part-start-->
		<h2>Happy Clients</h2>
		<div class="client_area ">
			<div class="client_section animated  fadeInUp wow">
				<div class="client_profile">
					<div class="client_profile_pic"><img src="img/client-pic1.jpg" alt=""></div>
					<h3>Saul Goodman</h3>
					<span>Lawless Inc</span> </div>
				<div class="quote_section">
					<div class="quote_arrow"></div>
					<p><b><img src="img/quote_sign_left.png" alt=""></b> Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper. <small><img src="img/quote_sign_right.png" alt=""></small>						</p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="client_section animated  fadeInDown wow">
				<div class="client_profile flt">
					<div class="client_profile_pic"><img src="img/client-pic2.jpg" alt=""></div>
					<h3>Marie Schrader</h3>
					<span>DEA Foundation</span> </div>
				<div class="quote_section flt">
					<div class="quote_arrow2"></div>
					<p><b><img src="img/quote_sign_left.png" alt=""></b> Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper. <small><img src="img/quote_sign_right.png" alt=""></small>						</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section>
	<!--main-section client-part-end-->

	<div class="c-logo-part">
		<!--c-logo-part-start-->
		<div class="container">
			<ul class="delay-06s animated  bounce wow">
				<li><a href="javascript:void(0)"><img src="img/c-liogo1.png" alt=""></a></li>
				<li><a href="javascript:void(0)"><img src="img/c-liogo2.png" alt=""></a></li>
				<li><a href="javascript:void(0)"><img src="img/c-liogo3.png" alt=""></a></li>
				<li><a href="javascript:void(0)"><img src="img/c-liogo5.png" alt=""></a></li>
			</ul>
		</div>
	</div>
	<!--c-logo-part-end-->
	<section class="main-section team" id="team">
		<!--main-section team-start-->
		<div class="container">
			<h2>Amazing Team</h2>
			<h6>Take a closer look into our amazing team. We won’t bite.</h6>
			<div class="team-leader-block clearfix">
				<div class="team-leader-box">
					<div class="team-leader wow fadeInDown delay-03s">
						<div class="team-leader-shadow"><a href="javascript:void(0)"></a></div>
						<img src="img/team-leader-pic1.jpg" alt="">
						<ul>
							<li><a href="javascript:void(0)" class="fa-twitter"></a></li>
							<li><a href="javascript:void(0)" class="fa-facebook"></a></li>
							<li><a href="javascript:void(0)" class="fa-pinterest"></a></li>
							<li><a href="javascript:void(0)" class="fa-google-plus"></a></li>
						</ul>
					</div>
					<h3 class="wow fadeInDown delay-03s">Walter White</h3>
					<span class="wow fadeInDown delay-03s">Chief Executive Officer</span>
					<p class="wow fadeInDown delay-03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
				</div>
				<div class="team-leader-box">
					<div class="team-leader  wow fadeInDown delay-06s">
						<div class="team-leader-shadow"><a href="javascript:void(0)"></a></div>
						<img src="img/team-leader-pic2.jpg" alt="">
						<ul>
							<li><a href="javascript:void(0)" class="fa-twitter"></a></li>
							<li><a href="javascript:void(0)" class="fa-facebook"></a></li>
							<li><a href="javascript:void(0)" class="fa-pinterest"></a></li>
							<li><a href="javascript:void(0)" class="fa-google-plus"></a></li>
						</ul>
					</div>
					<h3 class="wow fadeInDown delay-06s">Jesse Pinkman</h3>
					<span class="wow fadeInDown delay-06s">Product Manager</span>
					<p class="wow fadeInDown delay-06s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
				</div>
				<div class="team-leader-box">
					<div class="team-leader wow fadeInDown delay-09s">
						<div class="team-leader-shadow"><a href="javascript:void(0)"></a></div>
						<img src="img/team-leader-pic3.jpg" alt="">
						<ul>
							<li><a href="javascript:void(0)" class="fa-twitter"></a></li>
							<li><a href="javascript:void(0)" class="fa-facebook"></a></li>
							<li><a href="javascript:void(0)" class="fa-pinterest"></a></li>
							<li><a href="javascript:void(0)" class="fa-google-plus"></a></li>
						</ul>
					</div>
					<h3 class="wow fadeInDown delay-09s">Skyler white</h3>
					<span class="wow fadeInDown delay-09s">Accountant</span>
					<p class="wow fadeInDown delay-09s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
				</div>
			</div>
		</div>
	</section>
	<!--main-section team-end-->

	<section class="twitter-feed">
		<!--twitter-feed-->
		<div class="container  animated fadeInDown delay-07s wow">
			<div class="twitter_bird"><span><i class="fa-twitter"></i></span></div>
			<p> When you're the underdog, your only option is to make #waves if you want to succeed. How much <br> and how often should you be drinking coffee?</p>
			<span>About 28 mins ago</span> </div>
	</section>
	<!--twitter-feed-end-->

<?php
include './parts/_footer_main.php'
?>