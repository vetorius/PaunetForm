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
    * Genera el formulario con los datos que ya tenemos.
    */

	include 'alumno.php';
	include 'formHelper.php';

	$elalumno = new alumno($_POST['dni']);

	if ($elalumno->existe == FALSE) {
		header("Location: index.php");
		die();

	}

	// cargar los datos de los códigos de paises y nacionalidades
	$intCodes = 'codigos/codpais.csv';

	$codigos = array();
	if (($fichero = fopen($intCodes, "r")) !== FALSE) {
	    // Lee los nombres de los campos
	    $nombres_campos = fgetcsv($fichero, 0, ";");
	    $num_campos = count($nombres_campos);
	    // Lee los registros
	    while (($datos = fgetcsv($fichero, 0, ";")) !== FALSE) {
	        // Crea un array asociativo con los nombres y valores de los campos
	        for ($icampo = 0; $icampo < $num_campos; $icampo++) {
	            $registro[$nombres_campos[$icampo]] = $datos[$icampo];
	        }
	        // Añade el registro leido al array de registros
	        $codigos[] = $registro;
	    }
	    fclose($fichero);
	}

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>formulario de entrada de datos</title>
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
		<?php if ($elalumno->existe){?>

		<h2>Datos para el alumno <?php echo $elalumno->nom . ' ' . $elalumno->ap1 . ' ' . $elalumno->ap2; ?> </h2>

		<?php } else { ?>

		<h2>Datos para el alumno con dni <?php echo $elalumno->dni; ?> </h2>

		<?php } ?>

		<form role="form" action="procesar.php" method="POST">

			<input type="hidden" name="dni" value="<?php echo $elalumno->dni; ?>">

			<div class="row">
				<div class="form-group col-xs-4">
					<label for="nom">Nombre</label>
					<input type="text" class="form-control" id="nom" name="nom"
						value="<?php echo $elalumno->nom; ?>" required autofocus>
				</div>
				<div class="form-group col-xs-4">
					<label for="ap1">Primer apellido</label>
					<input type="text" class="form-control" id="ap1" name="ap1"
						value="<?php echo $elalumno->ap1; ?>" required>
				</div>
				<div class="form-group col-xs-4">
					<label for="ap2">Segundo apellido</label>
					<input type="text" class="form-control" id="ap2" name="ap2"
						value="<?php echo $elalumno->ap2; ?>">
				</div>
			</div>

			<div class="row">
				<div class="form-group  col-xs-4">
					<label for="fnac">Fecha de nacimiento (dd/mm/aaaa)</label>
					<input type="text" class="form-control" id="fnac" name="fnac"
						value="<?php echo $elalumno->fnac; ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
				</div>

				<div class="form-group col-xs-3">
					<label>Sexo</label><br>
					<label for="sex_1" class="radio-inline">hombre</label>
					<input type="radio" name="sex" id="sex_1" value="M" <?php echo ($elalumno->sex == 'M') ? 'checked' : ''; ?> >
					
					<label for="sex_2" class="radio-inline">mujer</label>
					<input type="radio" name="sex" id="sex_2" value="F" <?php echo ($elalumno->sex == 'F') ? 'checked' : ''; ?>>
				</div>

				<div class="form-group col-xs-2">
					<label>Letra de la clase</label><br>
					<label for="gru_1" class="radio-inline">A</label>
					<input type="radio" name="gru" id="gru_1" value="A" <?php echo ($elalumno->gru == 'A') ? 'checked' : ''; ?> >
					
					<label for="gru_2" class="radio-inline">B</label>
					<input type="radio" name="gru" id="gru_2" value="B" <?php echo ($elalumno->gru == 'B') ? 'checked' : ''; ?>>
				</div>
				<div class="form-group col-xs-3">
					<label for="tel">Teléfono (sin espacios)</label>
					<input type="text" class="form-control" id="tel" name="tel"
						value="<?php echo $elalumno->tel; ?>" pattern="[0-9]{9}" required>
				</div>				
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="dom">Dirección</label>
					<input type="text" class="form-control" id="dom" name="dom"
						value="<?php echo $elalumno->dom; ?>" required>
				</div>
				<div class="form-group col-xs-3">
					<label for="loc">Localidad</label>
					<input type="text" class="form-control" id="loc" name="loc"
						value="<?php echo $elalumno->loc; ?>" required>
				</div>
				<div class="form-group col-xs-3">
					<label for="cp">Código postal</label>
					<input type="text" class="form-control" id="cp" name="cp"
						value="<?php echo $elalumno->cp; ?>" pattern="[0-9]{5}" required>
				</div>
			</div>

			<div class="row">

				<div class="form-group col-xs-4">
					<!-- pais de nacimiento -->
					<?php echo selectPais('País de nacimiento', 'pais' , $elalumno->pais, $codigos); ?>
				</div>

				<div class="form-group col-xs-4">
					<label for="locnac">Localidad de nacimiento</label>
					<input type="text" class="form-control" id="locnac" name="locnac"
						value="<?php echo $elalumno->locnac; ?>">
				</div>

				<div class="form-group col-xs-4">
					<!-- pais de nacionalidad -->
					<?php echo selectNacionalidad('Nacionalidad', 'nac' , $elalumno->nac, $codigos); ?>

				</div>

			</div>


			<div class="row">
				<div class="form-group col-xs-6">
					<label for="clase">Clase de matrícula</label>
					<select class="form-control" name="clase" id="clase">
					  <option value="0" <?php echo ($elalumno->clase == '0') ? 'selected' : ''; ?> >normal</option>
					  <option value="1" <?php echo ($elalumno->clase == '1') ? 'selected' : ''; ?> >Familia numerosa general</option>
					  <option value="2" <?php echo ($elalumno->clase == '2') ? 'selected' : ''; ?> >Familia numerosa especial</option>
					  <option value="3" <?php echo ($elalumno->clase == '3') ? 'selected' : ''; ?> >Discapacitado</option>
					  <option value="4" <?php echo ($elalumno->clase == '4') ? 'selected' : ''; ?> >Víctima del terrorismo</option>
					  <option value="5" <?php echo ($elalumno->clase == '5') ? 'selected' : ''; ?> >Víctima de violencia de género</option>
					  <option value="6" <?php echo ($elalumno->clase == '6') ? 'selected' : ''; ?> >Víctima en operaciones internacionales de paz y seguridad</option>
					</select>
				</div>
				<div class="form-group col-xs-6">
					<label for="email">Correo electrónico</label>
					<input type="email" class="form-control" id="email" name="email"
						value="<?php echo $elalumno->email; ?>">
				</div>
			</div>

			<div class="panel panel-danger" id="famnum">
				<div class="panel-heading">
				<h3 class="panel-title">Rellenar sólo miembros de familia numerosa</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-xs-3">
							<label for="cfnNum">Número del carnet de familia numerosa</label>
							<input type="text" class="form-control" id="cfnNum" name="cfnNum"
								value="<?php echo $elalumno->cfnNum; ?>">
						</div>
						<div class="form-group col-xs-3">
							<label for="cfnExp">Fecha de expedición del carnet de familia numerosa</label>
							<input type="text" class="form-control" id="cfnExp" name="cfnExp"
								value="<?php echo $elalumno->cfnExp; ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
						</div>
						<div class="form-group col-xs-3">
							<label for="cfnCad">Fecha de caducidad del carnet de familia numerosa</label>
							<input type="text" class="form-control" id="cfnCad" name="cfnCad"
							value="<?php echo $elalumno->cfnCad; ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
						</div>
						<div class="form-group col-xs-3">
							<label for="cfnHij">Número de hijos incluidos en el carnet de familia numerosa</label>
							<input type="text" class="form-control" id="cfnHij" name="cfnHij"
								value="<?php echo $elalumno->cfnHij; ?>" pattern="[1-9]{1}">
						</div>
					</div>
				</div>
			</div>



<!-- Datos de modalidad y opciones PAU -->
			<div class="row">
				<div class="form-group col-xs-3">
					<label for="mod">Modalidad de bachillerato</label>
					<select class="form-control" name="mod" id="mod">
					  <option value="A" <?php echo ($elalumno->mod == 'A') ? 'selected' : ''; ?> disabled >Artes</option>
					  <option value="C" <?php echo ($elalumno->mod == 'C') ? 'selected' : ''; ?> >Ciencias</option>
					  <option value="HU" <?php echo ($elalumno->mod == 'HU') ? 'selected' : ''; ?> disabled >Humanidades</option>
					  <option value="CS" <?php echo ($elalumno->mod == 'CS') ? 'selected' : ''; ?> >Ciencias sociales</option>
					</select>
				</div>

				<div class="form-group col-xs-2">
					<?php echo selectIdioma('Idioma', 'idi' , $elalumno->idi); ?>
				</div>

				<div class="form-group col-xs-2">
					<label for="opt">Optativa común</label>
					<select class="form-control" name="opt" id="opt">
					  <option value="01" <?php echo ($elalumno->opt == '01') ? 'selected' : ''; ?> >Historia de España</option>
					  <option value="17" <?php echo ($elalumno->opt == '17') ? 'selected' : ''; ?> >Historia de la Filosofía</option>
					</select>
				</div>
				
				<div class="form-group col-xs-5">
					<?php echo selectAsignaturaFaseGeneral('Materia de modalidad (fase general)', 'matMod' , $elalumno->matMod); ?>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-xs-3">
					<?php echo selectAsignatura('Materia voluntaria 1', 'esp1' , $elalumno->esp1); ?>
				</div>
				<div class="form-group col-xs-3">
					<?php echo selectAsignatura('Materia voluntaria 2', 'esp2' , $elalumno->esp2); ?>
				</div>
				<div class="form-group col-xs-3">
					<?php echo selectAsignatura('Materia voluntaria 3', 'esp3' , $elalumno->esp3); ?>
				</div>
				<div class="form-group col-xs-3">
					<?php echo selectAsignatura('Materia voluntaria 4', 'esp4' , $elalumno->esp4); ?>
				</div>
			</div>

			<button type="submit" class="btn btn-success">Enviar</button>
		</form>


	</div><!-- /.container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript">
		$(document).on('ready',(function(){

			if ($('#clase option:selected').attr('value')=='1') {
				$('#famnum').show();
			} else if ($('#clase option:selected').attr('value')=='2'){
				$('#famnum').show();
			} else {
				$('#famnum').hide();
			}
			
			$('#clase').change(function(){
				if ($('#clase option:selected').attr('value')=='1') {
					$('#famnum').show();
				} else if ($('#clase option:selected').attr('value')=='2'){
					$('#famnum').show();
				} else {
					$('#famnum').hide();
				}
			});

		}));
	</script>
</body>
</html>
