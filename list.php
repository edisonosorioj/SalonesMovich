<?php

require_once "conexion.php";

$conex = new conection();
$result = $conex->conex();

$query = mysqli_query($result,"select * from salon");
	
$tr = '';

 while ($row = $query->fetch_array(MYSQLI_BOTH)){

 	$tr .=	"<tr class='rows' id='rows'>
				<td>" . $row['id'] 				. "</td>
				<td>" . $row['nombre'] 				. "</td>
				<td>" . $row['disponible'] 			. "</td>
				<td>" . $row['fecha'] 				. "</td>
				<td><a href='delreserva.php?id=" . $row['id'] . "'>Eliminar</a>
				</td>
			</tr>";

 }

$html = "<!DOCTYPE HTML>
	<html>
		<head>
			<title>Movich Salones</title>
			<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
			<meta name='viewport' content='width=device-width, initial-scale=1' />
			<link rel='stylesheet' href='assets/css/main.css' />
		</head>
		<body>
			<!-- Wrapper -->
				<div id='wrapper'>

					<!-- Header -->
						<header id='header'>
							<div class='inner'>

								<!-- Logo -->
									<a href='index.html' class='logo'>
										<span class='symbol'><img src='images/logo2.png' alt=' /></span><span class='title'>Movich Salones</span>
									</a>

								<!-- Nav -->
									<nav>
										<ul>
											<li><a href='#menu'>Menu</a></li>
										</ul>
									</nav>

							</div>
						</header>

					<!-- Menu -->
						<nav id='menu'>
							<h2>Menu</h2>
							<ul>
								<li><a href='index.html'>Salones Vista Cliente</a></li>
								<li><a href='reservar.html'>Reservas</a></li>
								<li><a href='list.php'>Listado de reservas</a></li>
							</ul>
						</nav>

					<!-- Main -->
						<div id='main'>
							<div class='inner'>
								<header>
									<h1>Disponibilidad de los salones en el Movich Llanogrande</h1>
								</header>
								<section class='tiles'>
									<table class='table_result' id='table_result'>
										<tr class='name_list'>
											<td width='5%'>ID.</td>
											<td width='20%'>Nombre</td>
											<td width='10%'>Rutas</td>
											<td width='10%'>Fecha</td>
											<td width='10%'>Acciones</td>
										</tr>"
									 . $tr . 
									 "</table>
								</section>
							</div>
						</div>

					<!-- Footer -->
						<footer id='footer'>
							<div class='inner'>
								<section>
									<h2>Haz tu reserva:</h2>
									<form method='post' action='#'>
										<div class='field half first'>
											<input type='text' name='name' id='name' placeholder='Name' />
										</div>
										<div class='field half'>
											<input type='email' name='email' id='email' placeholder='Email' />
										</div>
										<div class='field'>
											<textarea name='message' id='message' placeholder='Message'></textarea>
										</div>
										<ul class='actions'>
											<li><input type='submit' value='Send' class='special' /></li>
										</ul>
									</form>
								</section>
								<section>
									<h2>Buscanos en:</h2>
									<ul class='icons'>
										<li><a href='#' class='icon style2 fa-twitter'><span class='label'>Twitter</span></a></li>
										<li><a href='#' class='icon style2 fa-facebook'><span class='label'>Facebook</span></a></li>
										<li><a href='#' class='icon style2 fa-instagram'><span class='label'>Instagram</span></a></li>
									</ul>
								</section>
								<ul class='copyright'>
									<li>&copy; AlDía. All rights reserved</li><li>Design: <a href='www.edisonosorioj.com'>Edison Osorio</a></li>
								</ul>
							</div>
						</footer>

				</div>

			<!-- Scripts -->
				<script src='assets/js/jquery.min.js'></script>
				<script src='assets/js/skel.min.js'></script>
				<script src='assets/js/util.js'></script>
				<!--[if lte IE 8]><script src='assets/js/ie/respond.min.js'></script><![endif]-->
				<script src='assets/js/main.js'></script>

		</body>
	</html>";


echo $html;
