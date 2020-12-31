<footer class="footer_section" id="contact">
		<div class="container">
			<section class="main-section contact" id="contact">
				<div class="contact_section">
					<h2>Contáctanos</h2>
					<div class="row">
						<div class="col-lg-4">
							<div class="contact_block">
								<div class="contact_block_icon rollIn animated wow"><span><i class="fa-home"></i></span></div>
								<span> Calle 21 #223, col. Santo Niño, <br>
              Chihuahua, Chih., 31000 </span> </div>
						</div>
						<div class="col-lg-4">
							<div class="contact_block">
								<div class="contact_block_icon icon2 rollIn animated wow"><span><i class="fa-phone"></i></span></div>
								<span> 614-120-4456 </span> </div>
						</div>
						<div class="col-lg-4">
							<div class="contact_block">
								<div class="contact_block_icon icon3 rollIn animated wow"><span><i class="fa-pencil"></i></span></div>
								<span> <a href="mailto:info@sgmdg.org"> info@sgmdg.org </a> </span> </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 wow fadeInLeft">
						<div class="contact-info-box address clearfix">
							<h3>Envíanos un mensaje para cualquier duda</h3>
							<p>Contáctanos via e-mail o por nuestras redes sociales, te responderemos lo más rápido posible</p>
							<p></p>
						</div>
						<ul class="social-link">
							<li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa-twitter"></i></a></li>
							<li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="laptop-code"></i></a></li>
							<!--<li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa-pinterest"></i></a></li>
							<li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa-google-plus"></i></a></li>
							<li class="dribbble animated bounceIn wow delay-06s"><a href="javascript:void(0)"><i class="fa-dribbble"></i></a></li>-->
						</ul>
					</div>
					<div class="hidden col-lg-6 wow fadeInUp delay-06s">
						<div class="form">
							<div id="sendmessage">Your message has been sent. Thank you!</div>
							<div id="errormessage"></div>
							<form action="" method="post" role="form" class="contactForm">
								<div class="form-group">
									<input type="text" name="name" class="form-control input-text" id="name" placeholder="Tu nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
									<div class="validation"></div>
								</div>
								<div class="form-group">
									<input type="email" class="form-control input-text" name="email" id="email" placeholder="Tu e-mail (ej: usuario@dominio.com)" data-rule="email" data-msg="Please enter a valid email" />
									<div class="validation"></div>
								</div>
								<div class="form-group">
									<input type="text" class="form-control input-text" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
									<div class="validation"></div>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Escribe tu mensaje"></textarea>
									<div class="validation"></div>
								</div>

								<button type="submit" class="btn input-btn">ENVIAR</button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="container">
			<div class="footer_bottom">
				<div class="credits">
					<!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Butterfly
          -->
					  <p>Desarrollado por: </p>
					  <p><a href="mailto:hectoralmanzagamb@gmail.com" target="_blank">Orlando Almanza</a><br>
					  <a href="mailto:flavio.almanza01@gmail.com" target="_blank">Flavio Almanza</a></p>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		$(document).ready(function(e) {
			$('#header_outer').scrollToFixed();
			$('.res-nav_click').click(function() {
				$('.main-nav').slideToggle();
				return false

			});

		});
	</script>
	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();
		document.getElementById('').onclick = function() {
			var section = document.createElement('section');
			section.className = 'wow fadeInDown';
			section.className = 'wow shake';
			section.className = 'wow zoomIn';
			section.className = 'wow lightSpeedIn';
			this.parentNode.insertBefore(section, this);
		};
	</script>
	<script type="text/javascript">
		$(window).load(function() {

			$('a').bind('click', function(event) {
				var $anchor = $(this);

				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 91
				}, 1500, 'easeInOutExpo');
				/*
				if you don't want to use the easing effects:
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1000);
				*/
				event.preventDefault();
			});
		})
	</script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			// Portfolio Isotope
			var container = $('#portfolio-wrap');


			container.isotope({
				animationEngine: 'best-available',
				animationOptions: {
					duration: 200,
					queue: false
				},
				layoutMode: 'fitRows'
			});

			$('#filters a').click(function() {
				$('#filters a').removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				container.isotope({
					filter: selector
				});
				setProjects();
				return false;
			});


			function splitColumns() {
				var winWidth = $(window).width(),
					columnNumb = 1;


				if (winWidth > 1024) {
					columnNumb = 4;
				} else if (winWidth > 900) {
					columnNumb = 2;
				} else if (winWidth > 479) {
					columnNumb = 2;
				} else if (winWidth < 479) {
					columnNumb = 1;
				}

				return columnNumb;
			}

			function setColumns() {
				var winWidth = $(window).width(),
					columnNumb = splitColumns(),
					postWidth = Math.floor(winWidth / columnNumb);

				container.find('.portfolio-item').each(function() {
					$(this).css({
						width: postWidth + 'px'
					});
				});
			}

			function setProjects() {
				setColumns();
				container.isotope('reLayout');
			}

			container.imagesLoaded(function() {
				setColumns();
			});


			$(window).bind('resize', function() {
				setProjects();
			});

		});
		$(window).load(function() {
			jQuery('#all').click();
			return false;
		});
	</script>
	<script src="contactform/contactform.js"></script>

</body>
</html>
