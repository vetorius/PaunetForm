<?php
 /**
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
    * Procesa el formulario y guarda los datos en el archivo del directorio data
    */
 
if (isset($_POST['dni']) == FALSE) {

	header("Location: index.php");
	die();

} else {

	include 'alumno.php';

	// setlocale(LC_CTYPE, 'es_ES.UTF8');

	$elalumno = new alumno($_POST['dni']);

// chequear variables post y añadirlas al objeto alumno
	// $elalumno->dni = $_POST['dni'];  lo hace el constructor
	$elalumno->nom = mb_strtoupper($_POST['nom'], 'UTF8');
	$elalumno->ap1 = mb_strtoupper($_POST['ap1'], 'UTF8');
	$elalumno->ap2 = mb_strtoupper($_POST['ap2'], 'UTF8');
	$elalumno->fnac = $_POST['fnac'];
	$elalumno->sex = $_POST['sex'];
	$elalumno->gru = $_POST['gru'];
	$elalumno->tel = $_POST['tel'];
	$elalumno->dom = mb_strtoupper($_POST['dom'], 'UTF8');
	$elalumno->loc = mb_strtoupper($_POST['loc'], 'UTF8');
	$elalumno->cp = $_POST['cp'];
	$elalumno->pais = $_POST['pais'];
	$elalumno->locnac = mb_strtoupper($_POST['locnac'], 'UTF8');
	$elalumno->nac = $_POST['nac'];
	$elalumno->clase = $_POST['clase'];
	$elalumno->cfnNum = $_POST['cfnNum'];
	$elalumno->cfnExp = $_POST['cfnExp'];
	$elalumno->cfnCad = $_POST['cfnCad'];
	$elalumno->cfnHij = $_POST['cfnHij'];
	$elalumno->email = $_POST['email'];
	$elalumno->mod = $_POST['mod'];
	$elalumno->idi = $_POST['idi'];
	$elalumno->opt = $_POST['opt'];
	$elalumno->matMod = $_POST['matMod'];
	$elalumno->esp1 = $_POST['esp1'];
	$elalumno->esp2 = $_POST['esp2'];
	$elalumno->esp3 = $_POST['esp3'];
	$elalumno->esp4 = $_POST['esp4'];

	$resultado = $elalumno->saveFile();

	if ($resultado == FALSE) {
		$mensaje = 'Error al procesar los datos del alumno' . $elalumno->dni . '. Vuelva a intentarlo.';
	} else {
		$mensaje = 'Los datos del alumno ' . $elalumno->dni . ' se han guardado correctamente.';
	}

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>proceso de datos</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Global site template -->
    <link href="css/global.css" rel="stylesheet">

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
			<h2><?php echo $mensaje; ?> </h2>
			<p class="lead">Puedes volver a la página inicial pulsando <a href="index.php">aquí</a></p>
		</div>
	</div><!-- /.container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>