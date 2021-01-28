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

    $html = '<label for="' . $variable . '">' . $etiqueta . '</label>';
    $html .= '<select class="form-control" name="' . $variable . '" id="' . $variable . '">';
// asignatura
    $html .= '<option value="" ';
    if ($valor=='') {
        $html .= 'selected';
    }
    $html .= '>&nbsp;</option>';
// asignatura
    $html .= '<option value="05" ';
    if ($valor=='05') {
        $html .= 'selected';
    }
    $html .= '>Historia del arte</option>';
// asignatura
    $html .= '<option value="07" ';
    if ($valor=='07') {
        $html .= 'selected';
    }
    $html .= '>Matemáticas aplicadas a las ciencias sociales II</option>\n';
// asignatura
    $html .= '<option value="08" ';
    if ($valor=='08') {
        $html .= 'selected';
    }
    $html .= '>Biología</option>';
// asignatura
    $html .= '<option value="17" ';
    if ($valor=='17') {
        $html .= 'selected';
    }
    $html .= '>Historia de la Filosofía</option>';
// asignatura
    $html .= '<option value="09" ';
    if ($valor=='09') {
        $html .= 'selected';
    }
    $html .= '>Química</option>';
// asignatura
    $html .= '<option value="10" ';
    if ($valor=='10') {
        $html .= 'selected';
    }
    $html .= '>Física</option>';
// asignatura
    $html .= '<option value="11" ';
    if ($valor=='11') {
        $html .= 'selected';
    }
    $html .= '>Matemáticas II</option>';
// asignatura
    $html .= '<option value="15" ';
    if ($valor=='15') {
        $html .= 'selected';
    }
    $html .= '>Economía de la empresa</option>';
// asignatura
    $html .= '<option value="16" ';
    if ($valor=='16') {
        $html .= 'selected';
    }
    $html .= '>Geografía</option>';
// asignatura
    $html .= '<option value="19" ';
    if ($valor=='19') {
        $html .= 'selected';
    }
    $html .= '>Dibujo Técnico II</option>';
// asignatura
    $html .= '<option value="FR" ';
    if ($valor=='FR') {
        $html .= 'selected';
    }
    $html .= '>Francés</option>';

    $html .= '</select>';

    return $html;    
}

function selectAsignaturaFaseGeneral($etiqueta, $variable, $valor) {

    $html = '<label for="' . $variable . '">' . $etiqueta . '</label>';
    $html .= '<select class="form-control" name="' . $variable . '" id="' . $variable . '">';
// asignatura
    $html .= '<option value="" ';
    if ($valor=='') {
        $html .= 'selected';
    }
    $html .= '>&nbsp;</option>';
// asignatura
    $html .= '<option value="07" ';
    if ($valor=='07') {
        $html .= 'selected';
    }
    $html .= '>Matemáticas aplicadas a las ciencias sociales II</option>\n';
// asignatura
    $html .= '<option value="11" ';
    if ($valor=='11') {
        $html .= 'selected';
    }
    $html .= '>Matemáticas II</option>';

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
