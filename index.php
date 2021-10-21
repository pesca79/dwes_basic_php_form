<?php
// https://www.mclibre.org/consultar/php/ejercicios/con-formularios/controles-formularios-2/controles-formularios-2-14-1.php

include_once "funciones.php";

$titulo = "Formulario de datos personales";
$estilo = "mclibre-php-ejercicios.css";
$tituloCSS = "Color";
$textoh1 = "<h1 class='rojoGrande'>Formulario de datos personales</h1>";

cabecera($titulo, $estilo, $tituloCSS, $textoh1);
?>
<!DOCTYPE html>
<html>
<style>
body { 
background-image: url("images/fondo.jpg"); 
background-position: center 25%; background-size: cover;
font-size: large;
}
.rojo{
color:red;
font-weight:bold;
font-size: x-large;
} 
.rojoGrande{
color:red;
font-weight:bold;
font-size: xx-large;
}
</style>
<head>
<script src="jquery-1.3.2.min.js" type="text/javascript"></script>   
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
<title>Formulario de introduccion de datos personales</title>
</head>
<body>
	<!-- Redirección a la misma página !-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p style='color:cyan;'><b>Escriba los datos siguientes:</b></p>
        <table>
            <tbody>
            <tr>
                <td>
                    <label>
                        <strong>Nombre:</strong><br>
<!-- Si el nombre no ha sido introducido, le damos un valor en blanco,
y si lo fue, le asignamos el último valor introducido para nombre al recargar la página !-->                        
                        <input type="text" name="nombre" size="20" maxlength="20"<?php if(!empty($_POST['nombre'])) echo " value=\"$_POST[nombre]\""; ?>>
                    </label>
                </td>
                <td>
                    <label>
<!-- Idem con los demás campos de tipo texto o number, en este caso el apelido !-->						
                        <strong>Apellidos:</strong><br>
                        <input type="text" name="apellidos" size="20" maxlength="20"<?php if(!empty($_POST['apellidos'])) echo " value=\"$_POST[apellidos]\""; ?>>
                    </label>
                </td>
                <td>
                    <strong>Edad:</strong><br>
<!-- Con un if else u operador ternario, compruebo si el valor para edad fue seleccionado, y si no, lo dejo en blanco!-->                    
                    <select name="edad"<?php (isset($_POST['edad'])) ? $edad = $_POST['edad'] : $edad=''?>>
                        <option>...</option>
<!-- Y si fue elegido, marco el valor como seleccionado, al ser un option value !-->                        
                        <option value="1" <?php if ($edad == 1){echo 'selected="selected"';} ?>>Menos de 20 años</option>
                        <option value="2" <?php if ($edad == 2){echo 'selected="selected"';} ?>>Entre 20 y 39 años</option>
                        <option value="3" <?php if ($edad == 3){echo 'selected="selected"';} ?>>Entre 40 y 59 años</option>
                        <option value="4" <?php if ($edad == 4){echo 'selected="selected"';} ?>>60 años o más</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <strong>Peso:</strong><br>
<!-- Idem con los demás campos de tipo texto o number !-->                        
                        <input type="number" name="peso" min="1" max="250"<?php if(!empty($_POST['peso'])) echo " value=\"$_POST[peso]\""; ?>> kg
                    </label>
                </td>
                <td>
                    <strong>Sexo:</strong><br>
<!-- Operador ternario, para comprobar si el valor de género fue marcado, o dejarlo en blanco si no fue introducido !-->                    
                    <?php (isset($_POST['genero'])) ? $genero_select = $_POST['genero'] : $genero_select=''?>
<!-- Si fue selecionado, marco dicho valor como "chequeado", al ser un radio button !-->                    
                    <label><input type="radio" name="genero" value="hombre" value="hombre" <?php if ($genero_select == "hombre"){echo 'checked="checked"';} ?>>Hombre</label>
                    <label><input type="radio" name="genero" value="mujer" value="mujer" <?php if ($genero_select == "mujer"){echo 'checked="checked"';} ?>>Mujer</label>                                      
                </td>
                <td>
                    <strong>Estado Civil:</strong><br>
<!-- Operador ternario, para comprobar si algun valor para el estado civil fue marcado y dejarlo en blanco si no fue introducido !-->                    
                    <?php (isset($_POST['estadoCivil'])) ? $marital_status = $_POST['estadoCivil'] : $marital_status=''?>
                    <label><input type="radio" name="estadoCivil" value="soltero" <?php if ($marital_status == "soltero"){echo 'checked="checked"';} ?>>Soltero</label>
                    <label><input type="radio" name="estadoCivil" value="casado" <?php if ($marital_status == "casado"){echo 'checked="checked"';} ?>>Casado</label>
                    <label><input type="radio" name="estadoCivil" value="otro" <?php if ($marital_status == "otro"){echo 'checked="checked"';} ?>>Otro</label>           
                </td>
            </tr>
            </tbody>
        </table>

        <table style="border-spacing: 5px;">
            <tbody>
            <tr>
                <td rowspan="2" class="borde"><strong>Aficiones:</strong></td>
<!-- Operador ternario, para comprobar si el valor de cada checkbox fue marcado, o dejarlo en blanco si no fue introducido !-->                
                <?php (isset($_POST['cine'])) ? $cine = $_POST['cine'] : $cine=''?>
<!-- Si fue selecionado, marco dicho valor como "chequeado", al ser un checkbox !-->                
                <td><label><input type="checkbox" name="cine" <?php if ($cine == "on"){echo 'checked="checked"';} ?>>Cine</label></td>
<!-- Y hacemos lo mismo para las opciones restantes !-->                
                <?php (isset($_POST['literatura'])) ? $literatura = $_POST['literatura'] : $literatura=''?>
                <td><label><input type="checkbox" name="literatura" <?php if ($literatura == "on"){echo 'checked="checked"';} ?>>Literatura</label></td>
                <?php (isset($_POST['tebeos'])) ? $tebeos = $_POST['tebeos'] : $tebeos=''?>
                <td><label><input type="checkbox" name="tebeos" <?php if ($tebeos == "on"){echo 'checked="checked"';} ?>>Tebeos</label></td>
            </tr>
            <tr>
				<?php (isset($_POST['deporte'])) ? $deporte = $_POST['deporte'] : $deporte=''?>
                <td><label><input type="checkbox" name="deporte" <?php if ($deporte == "on"){echo 'checked="checked"';} ?>>Deporte</label></td>
                <?php (isset($_POST['musica'])) ? $musica = $_POST['musica'] : $musica=''?>
                <td><label><input type="checkbox" name="musica" <?php if ($musica == "on"){echo 'checked="checked"';} ?>>Música</label></td>
                <?php (isset($_POST['television'])) ? $television = $_POST['television'] : $television=''?>
                <td><label><input type="checkbox" name="television" <?php if ($television == "on"){echo 'checked="checked"';} ?>>Televisión</label></td>                
            </tr>
            </tbody>
        </table>

        <p>
            <input type="submit" class="btn btn-success" value="Enviar">
            <input type="reset" class="btn btn-danger" value="Borrar">
        </p>
    </form>
<?php
include 'datosPersonales-2.php';
echo "\n<p class='rojo'>".$fecha."</p>";
/**
 * Controles en formularios (2) 14-1 - controles-formularios-2-14-1.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2019 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2019-10-24
 * @link      https://www.mclibre.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
</body>
</html>
