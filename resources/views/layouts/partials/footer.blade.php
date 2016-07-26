
	<footer id="contacto">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 text-center-mobile">
					<h3 class="white">Tenes alguna duda?</h3>
					<h5 class="light regular color-blue">Contactate con nosotros.</h5>
					
						<div class="form-group">
							<label for="phone" class="white">Dejanos tu telefono (requerido)</label>
							<input type="text" class="form-control col-md-4" id="phone" placeholder="(011)155-500-500" name="phone" required>
						</div>
						<div class="form-group">
							<label for="phone" class="white">Tu email (requerido)</label>
							<input type="text" class="form-control" placeholder="tuemail@ejemplo" id="email" name="email" required>

						</div>
						<div class="form-group">
							<label for="phone" class="white">Consulta (requerido)</label>
							<textarea name="consulta" class="form-control" id="consulta" cols="30" rows="5" placeholder="Dejanos tu consulta"></textarea>

						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button class="btn btn-blue ripple trial-button enviarForm col-xs-12">Enviar</button>

				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Estamos online <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Lun - Vie</h5>
							<h3 class="regular white">9:00 - 22:00</h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Sab - Dom</h5>
							<h3 class="regular white">10:00 - 18:00</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p class="footer-text">&copy; 2016 Todos los derechos reservados. Creador por <a href="http://www.codedoors.com/">Codedoors.com</a></p>
				</div>
				<!--
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div> -->
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>