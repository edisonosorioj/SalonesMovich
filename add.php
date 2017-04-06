<?php

require_once "conexion.php";

$conex = new conection();
$result = $conex->conex();


	$salon		=	$_POST['salon'];
	$disponible	=	$_POST['disponible'];
	$fecha 		=	$_POST['fecha'];

// Agrega nuevos usuarios según el formulario recibido
	$query = mysqli_query($result,"INSERT INTO salon (nombre, disponible, fecha) VALUES ('$salon', '$disponible', '$fecha');");

//Según la respuesta de la inserción se da una respuesta en un alert 
	if($query > 0){
		$msg = "La reserva del " . $salon . " fue realizada";
	}else{
		$msg = 'Error al agregar la reserva. Intente nuevamente';
	}
		
	$html = "<script>
		window.alert('$msg');
		self.location='reservar.html';
	</script>";
	
echo $html;	