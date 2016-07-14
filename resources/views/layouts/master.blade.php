<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
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

	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>

<body>
@include('layouts.partials.navSingle')
@yield('content')
@include('layouts.partials.footer')
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/typewriter.js')}}"></script>
<script src="{{asset('js/jquery.onepagenav.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
