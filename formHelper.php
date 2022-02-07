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
    * Helper para el formulario.
    * Genera los select con los códigos de asignaturas y paises.
    */


function selectAsignatura($etiqueta, $variable, $valor) {

    $asignaturas =[
        "12" => "Artes Escénicas",
        "08" => "Biología",
        "33" => "Cultura Audiovisual II",
        "19" => "Dibujo Técnico II",
        "13" => "Diseño",
        "15" => "Economía de la Empresa",
        "10" => "Física",
        "31" => "Fundamentos del Arte II",
        "16" => "Geografía",
        "32" => "Geología",
        "24" => "Griego II",
        "01" => "Historia de España",
        "17" => "Historia de la Filosofía",
        "05" => "Historia del Arte",
        "06" => "Latín II",
        "LC" => "Lengua Castellana y Literatura II",
        "09" => "Química",
        "AL" => "Alemán",
        "FR" => "Francés",
        "IN" => "Inglés"
    ];

    $html = '<label for="' . $variable . '">' . $etiqueta . '</label>';
    $html .= '<select class="form-control" name="' . $variable . '" id="' . $variable . '">';
// asignatura vacía
    $html .= '<option value="" ';
    if ($valor=='') {
        $html .= 'selected';
    }
    $html .= '>&nbsp;</option>';
// resto de asignaturas
    foreach ($asignaturas as $clave => $nombre) {
        $html .= '<option value="' . $clave . '" ';
        if ($valor==$clave) {
            $html .= 'selected';
        }
        $html .= '>' . $nombre . '</option>';
    }
    $html .= '</select>';

    return $html;  
}

function selectAsignaturaFaseGeneral($etiqueta, $variable, $valor) {

    $asignaturas =[
        "07" => "Matemáticas aplicadas a las ciencias sociales II",
        "11" => "Matemáticas II"
    ];

    $html = '<label for="' . $variable . '">' . $etiqueta . '</label>';
    $html .= '<select class="form-control" name="' . $variable . '" id="' . $variable . '">';
// asignatura vacía
    $html .= '<option value="" ';
    if ($valor=='') {
        $html .= 'selected';
    }
    $html .= '>&nbsp;</option>';
// resto de asignaturas
    foreach ($asignaturas as $clave => $nombre) {
        $html .= '<option value="' . $clave . '" ';
        if ($valor==$clave) {
            $html .= 'selected';
        }
        $html .= '>' . $nombre . '</option>';
    }
    $html .= '</select>';

    return $html;      
}

function selectPais($etiqueta, $variable, $valor, $paises) {

    $html = '<div class="form-group">';
    $html .= '<label for="' . $variable . '">' . $etiqueta . '</label>';
    $html .= '<select class="form-control" name="' . $variable . '" id="' . $variable . '">';
 
    foreach ($paises as $key => $codigo) {
        $html .= '<option value="' . $codigo['code'] . '" ';
        if ($valor==$codigo['code']) {
            $html .= 'selected';
        }
        $html .= '>' . $codigo['pais'] . '</option>';
    }

    $html .= '</select></div>';

    return $html;    
}

function selectNacionalidad($etiqueta, $variable, $valor, $paises) {

    $html = '<div class="form-group">';
    $html .= '<label for="' . $variable . '">' . $etiqueta . '</label>';
    $html .= '<select class="form-control" name="' . $variable . '" id="' . $variable . '">';

    foreach ($paises as $key => $codigo) {
        $html .= '<option value="' . $codigo['code'] . '" ';
        if ($valor==$codigo['code']) {
            $html .= 'selected';
        }
        $html .= '>' . $codigo['nacionalidad'] . '</option>';
    }

    $html .= '</select></div>';

    return $html;    
}

function selectIdioma($etiqueta, $variable, $valor) {

    $html = '<div class="form-group">';
    $html .= '<label for="' . $variable . '">' . $etiqueta . '</label>';
    $html .= '<select class="form-control" name="' . $variable . '" id="' . $variable . '">';

    // idioma
        $html .= '<option value="IN" ';
        if ($valor=='IN') {
            $html .= 'selected';
        }
        $html .= '>Inglés</option>';
    // idioma
        $html .= '<option value="FR" ';
        if ($valor=='FR') {
            $html .= 'selected';
        }
        $html .= ' disabled>Francés</option>';
    // idioma
        $html .= '<option value="AL" ';
        if ($valor=='AL') {
            $html .= 'selected';
        }
        $html .= ' disabled>Alemán</option>';
    $html .= '</select></div>';

    return $html;    
}

  ?>
