<?php 
 /**
    * Página de entrada
    * @package paunet-LSFGV
	* @author  Víctor Manuel Sánchez <vetorius@gmail.com>
    * @copyright (C) Víctor Manuel Sánchez
    * @license GNU/GPL, see license.txt
    *
    * paunet-LSFGV is free software; you can redistribute it and/or
    * modify it under the terms of the GNU General Public License 2
    * as published by the Free Software Foundation.
    *
    * paunet-LSFGV is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU General Public License for more details.
    *
    * You should have received a copy of the GNU General Public License
    * along with paunet-LSFGV; if not, write to the Free Software
    * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
    * or see http://www.gnu.org/licenses/.
    *
    * Página de entrada
    */
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bienvenido a Paunet</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Global site template -->
    <link href="css/global.css" rel="stylesheet">

    <!-- Custom styles for signin form -->
    <link rel="stylesheet" href="css/signin.css">

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">PAUNET - Datos de acceso a la Universidad</a>
			</div>
		</div>
	</nav>

    <div class="container">
		<div class="starter-template">
			<h2>Entra para completar los datos de acceso a la universidad</h2>
			<p class="lead">Necesitamos que verifiques tus datos y elijas las materias
			 a las que vas a presentarte en la prueba de acceso.<br>
			Para acceder escribe tu DNI o tarjeta de residencia (las letras en mayúsculas y sin espacios).</p>
		</div>
    </div><!-- /.container -->

	<div class="container">
		<form class="form-signin" action="formulario.php" method="POST">
			<label for="dni" class="sr-only">DNI</label>
			<input type="text" pattern="[0-9A-Z]{1}[0-9]{6,7}[0-9A-Z]{1}" id="dni" class="form-control" name="dni" placeholder="número de identificación" required autofocus>
 
			<button class="btn btn-lg btn-success btn-block" type="submit">Acceder</button>
		</form>
	</div> <!-- /container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>