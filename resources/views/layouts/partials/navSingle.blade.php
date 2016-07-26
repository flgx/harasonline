	<div class="preloader">
		<img src="{{asset('img/loader.gif')}}" alt="Preloader image">
	</div>
		<nav class="navbar-single navbar-fixed-top"">
			<div class="container container-single">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="{{asset('img/horse.png')}}" data-active-url="{{asset('img/horse.png')}}" alt=""></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right main-nav">
						<li><a id="test" class="nav-item" href="{{url('/')}}" >Inicio</a></li>
						<li><a class="nav-item"  href="{{url('/#productos')}}" >Productos</a></li>
						<li><a class="nav-item"  href="{{url('/#nosotros')}}" >Nosotros</a></li>
						<li><a class="nav-item"  href="#contacto" >Contacto</a></li>
				<!--><li><a class="nav-item" href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Socios</a></li><!-->
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>