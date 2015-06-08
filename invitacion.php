<?php
session_start();
if(isset($_SESSION["codigoSrc"])){
	$codigo = $_SESSION["codigoSrc"];

	function sendEmail(){



		return;
	}

}else{ $codigo = "XXXXXX"; }

?>

<!DOCTYPE html>
<html lang="es">
	<head>

	<!-- Meta -->
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Css -->
	<link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
	<link type="text/css" rel="stylesheet" href="css/main.css"/>
	
	<!-- Icons -->

	<!-- Title Web Site -->
	<title>Fiesta una en un mill&oacute;n</title>
	</head>
	<body>

	<!-- Boostrap Template -->
	<section id="body" class="body">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img class="logo" src="img/logo.png" alt="Logo Indio"/>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-12">
					<img src="img/titleForm.png" class="header" alt="titleForm"/>
					<h2 class="text confirm">Confirmación de asistencia</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">	
				<?php

				if($_SESSION["codigoSrc"] == "lleno"){

				?>
					<p class="text">Lo sentimos, se ha llenado el cupo para el evento.</p>
					<p class="text">Te invitamos a seguir al pendiente de nuestros próximos eventos.</p>
				<?php	

				}else{

				?>
					<pre class="text pre">
Con este código de asistencia <b class="codigo"><?php echo $codigo; ?></b>
serás parte de la historia.
No olvides presentarlo el día del evento,
será tu llave de acceso.

27 de Junio
De 11:00 a 23:00 hrs
Hotel flor de mayo
Matamoros 49, 62000
Cuernavaca, Morélos, Mor.
</pre>
				<?php
				}
				?>
				</div>
			</div>
		</div>

	</section>
	
	<footer>
		<img src="img/tornillo.png" width="20" height="20" class="leftT"/>
		<img src="img/tornillo.png" width="20" height="20" class="leftB"/>
		<img src="img/tornillo.png" width="20" height="20" class="rightT"/>
		<img src="img/tornillo.png" width="20" height="20" class="rightB"/>
		<div class="container">
			<div class="row">
				<div clas="col-md-12">
					<img class="footerImg" src="img/ingredientes.png" alt="Footer"/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<span class="copyright">Cuauht&eacute;moc Moctezuma 2015. Todos los derechos reservados.</span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">		
					<span class="aviso">
						<a class="ref" href="http://www.cuamoc.com/es/content/aviso-de-privacidad" target="_blank">Aviso de privacidad</a>&nbsp;l
					</span>
					<span class="terminos">
						<a class="ref" href="http://www.cuamoc.com/es/content/terminos-y-condiciones-de-uso-del-sitio-web-de-cuauhtemoc-moctezuma" target="_blank">T&eacute;rminos y condiciones</a>
					</span>
				</div>
			</div>
		</div>
	</footer>

	<!-- Javascript Init -->
	<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	</body>
</html>
<?php

//session_destroy();

?>