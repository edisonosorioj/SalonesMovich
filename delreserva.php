<?php 
// Version 1.0 of Edison Osorio
require_once "conexion.php";

$conex = new conection();
$result = $conex->conex();

// Trae el ID seleccionado a eliminar
$id = $_GET['id'];

// Realiza la eliminacion del credito enviado. Y genera un mensaje seg[un las respuesta mySql
$query = mysqli_query($result, "delete from salon where id = '$id'");

if($query > 0){
	$msg = 'La reserva fue Eliminada';
}else{
	$msg = 'Error al eliminar la reserva. Intentalo de nuevo';
}

// Se construye el HTML
$html = "<script>
	window.alert('$msg');
	self.location='list.php';
</script>";
	
echo $html;
