<?php

class conection{

	function conex(){

	  $dbserver = "localhost";
	  // $dbserver = "127.0.0.1";
	  // $dbserver = "localhost";
	  $dbuser = "root";
	  $password = "qwer1234";
	  // $password = "";
	  $dbname = "movich";
	 
	  $conex = new mysqli($dbserver, $dbuser, $password, $dbname);

	  if($conex->connect_errno) {
	    die("No se pudo conectar a la base de datos");
	  }

	  return $conex;

	}

}