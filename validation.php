<?php
session_start();

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$validado = 0;

if($nombre == "" || $apellidos == "" || $email == "" || $telefono == ""){

	exit(0);

}

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d H:i:s");
$codigo = getRandomAlphaNumeric();
$servername = "localhost";
$username = "root";
$password = "root";
$databasename = "indioPilsner";
$tablenameInv = "invitaciones";
$tablenameReg = "registrados";

$handle = mysql_connect($servername, $username, $password);
$found = mysql_select_db($databasename, $handle);

if ($found) {

	$queryRegistrados = "SELECT * FROM `". $databasename ."`.`". $tablenameReg ."` WHERE `correo` = '". $email ."' ";
	$resultadoRegistrados = mysql_query($queryRegistrados);
	if(mysql_num_rows($resultadoRegistrados) == 1){
		// El usuario si estaba previamente registrado y se le dará el acceso pertinente
		$validado = 1;
	}

	$queryValidation = "SELECT * FROM `". $databasename ."`.`". $tablenameInv ."` WHERE `email` = '". $email ."' ";
	$resultadoValidation = mysql_query($queryValidation);
	if(mysql_num_rows($resultadoValidation) == 1){
		// El usuario ya se habia registrado anteriormente
		echo 2;
		exit(0);
	}

	$query = "INSERT INTO `". $databasename ."`.`". $tablenameInv ."` (`id`, `nombre`, `apellido`, `email`, `telefono`, `fecha`, `codigo`, `validado`) VALUES (NULL, '". $nombre ."', '". $apellidos ."', '". $email ."', '". $telefono ."', '". $fecha ."', '". $codigo ."', '". $validado ."')";
	$resultado = mysql_query($query);

	if($validado == 1){
		$_SESSION["codigoSrc"] = $codigo;
	}else{
		$_SESSION["codigoSrc"] = "lleno";
	}
	
	echo 1;

}

/*
 * Ingresar los datos y validar con la base de datos si el usuario es de los invitados
 */

function getRandomAlphaNumeric(){

	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$string = '';
	for ($i = 0; $i < 8; $i++) {
		$string .= $characters[rand(0, strlen($characters) - 1)];
	}

	return $string;
}
?>