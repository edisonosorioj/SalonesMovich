<?php

require_once "conexion.php";

$conex = new conection();
$result = $conex->conex();

$fecha = $_GET['fecha'];

$array1 = array();

$query = mysqli_query($result,"select * from salones");
// $res1 = $query->fetch_array(MYSQLI_BOTH);
// $res1 = $query->fetch_array(MYSQLI_BOTH);
	// print_r(mysqli_fetch_assoc($query));

$ristra = array();                                        
while( $row = mysqli_fetch_assoc($query) ){

    $ristra['nombre'][] = $row["nombre"];
    $ristra['href'][] = $row["href"];
    $ristra['redireccion'][] = $row["redireccion"];
    $ristra['detalles'][] = $row["detalles"];
}
// $ristra = preg_replace("/, $/", "", $ristra);

print_r($ristra);
// $query2 = mysqli_query($result,"select * from salon where fecha = $fecha");
$query2 = mysqli_query($result,"select * from salon where fecha = '2017-03-10'");
	
$ristra2 = array();                                        
while( $row2 = mysqli_fetch_assoc($query2) ){

    $ristra2['nombre'][] = $row2["nombre"];
    $ristra2['href'][] = $row2["href"];
    $ristra2['redireccion'][] = $row2["redireccion"];
    $ristra2['detalles'][] = $row2["detalles"];
}

print_r($ristra2);


$array3 = array_diff_assoc($ristra['nombre'], $ristra2['nombre']);


print_r($array3);

die();
$article = '';
$min = 1;
$max = 6;



 while ($row3 = $query->fetch_array(MYSQLI_BOTH)){
 // while ($row3 = mysqli_fetch_array($result, MYSQLI_BOTH)){

 	printf($row3['nombre']. '<br />');
 	print_r($result['nombre'] . '<br />');

 	$article .=	"
				<article class='style" . rand($min, $max) . "'>
					<span class='image'>
						<img src='" . $row3['href'] . "' alt=' />
					</span>
					<a href='" . $row3['redireccion'] . "'>
						<h2>" . $row3['nombre'] . "</h2>
						<div class='content'>
							<p id='estado'>" . $row3['detalles'] . "</p>
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
