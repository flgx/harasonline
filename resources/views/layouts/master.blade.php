<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>Compra tu caballo de carrera aca | Harasonline</title>

	<meta name="description" content="Compra pura sangre" />

	<meta name="keywords" content="" />

	<meta name="author" content="Codedoors.com" />

	<!-- Favicons (created with http://realfavicongenerator.net/)-->

	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/favicons/apple-touch-icon-57x57.png')}}">

	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/favicons/apple-touch-icon-60x60.png')}}">

	<link rel="icon" type="image/png" href="{{asset('img/favicons/favicon-32x32.png')}}" sizes="32x32">

	<link rel="icon" type="image/png" href="{{asset('img/favicons/favicon-16x16.png')}}" sizes="16x16">

	<link rel="manifest" href="{{asset('img/favicons/manifest.json')}}">

	<link rel="shortcut icon" href="{{asset('img/favicons/favicon.ico')}}">

	<meta name="msapplication-TileColor" content="#00a8ff">

	<meta name="msapplication-config" content="{{asset('img/favicons/browserconfig.xml')}}">

	<meta name="theme-color" content="#ffffff">

	<!-- Normalize -->

	<!-- Bootstrap -->

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

	<!-- Owl -->

	<link rel="stylesheet" type="text/css" href="{{asset('css/owl.css')}}">

	<!-- Animate.css -->

	<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">

	<!-- Font Awesome -->

	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.1.0/css/font-awesome.min.css')}}">

	<!-- Elegant Icons -->

	<link rel="stylesheet" type="text/css" href="{{asset('fonts/eleganticons/et-icons.css')}}">

	<!-- Main style -->

	<link rel="stylesheet" type="text/css" href="{{asset('css/cardio.css')}}">

<style type="text/css">
	.ui-loader{
		display: none !important;
	}
	.ui-mobile{
		margin-top: -20px !important;
	}
</style>


<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/579f4bbdd2d8e3987f8c98d3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>



<body data-role="page" id="harasonline">

@yield('nav')

@yield('content')

@include('layouts.partials.footer')

<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>

<script src="{{asset('js/owl.carousel.min.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/wow.min.js')}}"></script>

<script src="{{asset('js/typewriter.js')}}"></script>

<script src="{{asset('js/jquery.onepagenav.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
<script>
$(document).ready( function() {
    $(".ui-loader").hide();
});
</script>
<script src="{{asset('js/jquery.mobile-1.4.5.min.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->

<script>
	

	var token = $('meta[name="csrf-token"]').attr('content');
	$(document).on("pagecreate","#harasonline",function(){
		$('.buttonTest').on('tap',function(){
			alert('a');
		});
	$('.enviarForm').on('tap',function(){
		$('.enviarForm').html("Enviando...<img src='{{asset('img/loading-form.gif')}}'' alt=''>");	
		$.ajax({

			method: 'POST',			

			url:'{{ url('/sendEmail') }}',

			data: { 

		        'email': $('#email').val(), 

		        'phone': $('#phone').val(),

		        'consulta':$('#consulta').val(),

		        '_token':token

    		},	

            success: function(msg) {

                if(msg['message'] == 'success'){

                	$('.enviarForm').html("Enviado");

                	$('#email').val(''); 

		        	$('#phone').val('');

		        	$('#consulta').val('');

                	$.notify({

						// options

						message: 'Su consulta fue enviada. Dentro de 24hs le responderemos a tu email o teléfono. Muchas gracias.' 

					},{

						// settings

						type: 'success',

						placement: {

							from: 'bottom',

							align: 'center'

						}

					});

                }else{

                	$('.enviarForm').html("Enviar consulta");

                	$.notify({

						// options

						message: 'Error: Por favor complete todos los campos e intente nuevamente.' 

					},{

						// settings

						type: 'danger',

						placement: {

							from: 'bottom',

							align: 'center'

						}

					});

                }

            }		

        });
	});
	});


</script>

 <script>

  $('#myCarousel').carousel({

   interval: 10000

  });

 </script> 

 @yield('front-js')