<?php

require_once "conexion.php";

$conex = new conection();
$result = $conex->conex();


	$salon		=	$_POST['salon'];
	$disponible	=	$_POST['disponible'];
	$fecha 		=	$_POST['fecha'];
	$usuario 	=	$_POST['usuario'];
	$tel 		=	$_POST['tel'];

// Agrega nuevos usuarios según el formulario recibido
	$query = mysqli_query($result,"INSERT INTO salon (nombre, disponible, fecha, usuario, tel) VALUES ('$salon', '$disponible', '$fecha', '$usuario', '$tel');");

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