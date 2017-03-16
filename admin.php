<?php

require_once "conexion.php";

$conex = new conection();
$result = $conex->conex();

$fecha = $_GET['fecha'];

// if (isset($fecha) {
// 		$fecha = $_GET['fecha'];
// 	} else {
// 		$fecha = date('Y-m-d');
// 	};


$query = mysqli_query($result,"select * from salones");
$res1 = $query->fetch_array(MYSQLI_BOTH);

$query2 = mysqli_query($result,"select * from salon where fecha = '$fecha'");
$res2 = $query2->fetch_array(MYSQLI_BOTH);

$query3 = array_diff($res1,$res2);

$article = '';
$min = 1;
$max = 6;

 while ($row = $query3){

	print_r($row);

 	$article .=	"
				<article class='style" . rand($min, $max) . "'>
					<span class='image'>
						<img src='" . $row['href'] . "' alt=' />
					</span>
					<a href='" . $row['redireccion'] . "'>
						<h2>" . $row['nombre'] . "</h2>
						<div class='content'>
							<p id='estado'>" . $row['detalles'] . "</p>
						</div>
					</a>
				</article>";

 }
 die();
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
								<!-- <li><a href='index.html'>Inicio</a></li> -->
								<li><a href='index.html'>Salones</a></li>
								<li><a href='restaurante.html'>Restaurante</a></li>
								<li><a href='spa.html'>Spa</a></li>
								<li><a href='jardines.html'>Jardines</a></li>
								<li><a href='elements.html'>Elementos</a></li>
							</ul>
						</nav>

					<!-- Main -->
						<div id='main'>
							<div class='inner'>
								<header>
									<h1>Disponibilidad de los salones en el Movich Llanogrande</h1>
									<p>El Hotel Movich Las Lomas cuenta con una excelente infraestructura de 10 salones para conferencias y convenciones con capacidades de 5 y 230 personas. Cuenta también con una zona de piscina para cocteles y reuniones, amplios jardines y se cuenta con todas las ayudas audiovisuales.</p>
									<p><form method='get' action='admin.php'>Disponibilidad: <input type='date' name='fecha'><input type='submit' value='Buscar' id='buscar' class='button small' /></form></p>
								</header>
								<section class='tiles'>
									" . $article . "
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
