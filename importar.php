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
    * procesado del archivo alumnos.csv con los datos de sallenet para generar los archivos del directorio data
    */

include 'alumno.php';

$elalumno = new alumno('');

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
				<a class="navbar-brand" href="index.php">PAUNET - Datos de acceso a la Universidad</a>
			</div>
		</div>
	</nav>

    <div class="container">
    <?php

        if(isset($_FILES['alumnos'])){
            $file_tmp =$_FILES['alumnos']['tmp_name'];
            move_uploaded_file($file_tmp, 'alumnos.csv');
            if (file_exists('alumnos.csv')) {
                $elalumno->importFile('alumnos.csv');
                unlink('alumnos.csv');
            } else {
                echo '<h1>fichero no encontrado</h1>';
            }
        } else {
    ?>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="InputFile">Archivo a importar</label>
                <input type="file" id="InputFile" name="alumnos">
                <p class="help-block">Archivo csv con los datos de los alumnos.</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Importar</button>
            </div>

        </form>
    <?php 
        }
    ?>
    </div><!-- /.container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>