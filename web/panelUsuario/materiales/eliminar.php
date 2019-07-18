<?php
include "../../conexion.php";
include "../../variables.php";
include "panelUsuario/functions/sqlQuery.php";
include "../../log/logHandler.php";

////////////////////////
// almafuerte.edu.net
///////////////////////

// Pagina de Cambio de usuario (para los log)
$pagina = "Materiales->eliminarMat";

// Funcion para obtener datos de la db profesores
sqlQuery ("profesores",$_SESSION['documento'],$result);
$subidoPor = $result->nombre." ".$result->apellido;

// Comprobacion de inicio de sesion
/*
if (!isset($_SESSION['idUsuario'])) {
	echo "Se requiere iniciar sesion para acceder a esta seccion<br><br>";
	echo "Serás redireccionado a la pagina principal...";
	echo ("<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=".$url."'>"); // Si el usuario no ya ha iniciado sesion, se lo redirecciona a la pagina principal
} */

// Variables POST recibidas del formulario

$ano = ($_POST['ano']);
$division = ($_POST['division']);
$curso =  ($ano.$division);
$materia = ($_POST['materia']);
$tema = ($_POST['tema']);
$archivo = ($_POST['archivo']);
$confirmacion = $_POST['confirmacion'];

$direccionArchivo = $dir_subidaMateriales. '/' .$curso. '/' .$materia. '/' .$archivo;

if (($curso) and ($materia)) { // Comprueba si estan rellenos o no

    if ($confirmacion == "true") {
    if (file_exists($direccionArchivo)) { // Comprueba que el archivo a eliminar exista
		if (mysqli_query($con,"DELETE FROM recursos WHERE ano = '$ano' AND division = '$division' AND archivo = '$archivo' AND materias_nombre = '$materia' AND tema = '$tema'") && unlink($direccionArchivo) ) {
			$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Archivo eliminado con éxito";
		}else{
			$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Error al eliminar archivo";
		}
	}else{
        $msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El archivo a eliminar no existe";
	}
    }
}else{ // Sino sale
		$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> No se recibieron parametros";
	}
    

///////////////////////////////////////////////////

if(isset($msg)){
  $msgError = "<div class='error' style='font-size: 15px;'><p class='error'>".$msg."</p></div>";
  echo "<h3>Confirmar eliminacion</h3>
  <br>
  ".$msgError."
  <br>
  <button class='button button-rounded button-flat-primary' type=submit onClick=window.location.href='usuario.php?control=materiales'>Volver</button>
  ";
} else {
  echo "<h3>Confirmar eliminacion</h3>

<form enctype='multipart/form-data' action='".htmlentities($_SERVER['PHP_SELF'])."?control=eliminarMat' method='POST'>
<table border='0' align='center' style='
    border-spacing: 10px;

'>
  <tbody><tr>
    <th align='right' valign='top' scope='row'>Archivo:</th>
    <td align='left' valign='top'>".$archivo."</td>
  </tr>

  <tr>
    <th align='right' valign='top' scope='row'>Materia:</th>
    <td align='left' valign='top'>".$materia."</td>
  </tr>

  <tr>
  <th align='right' valign='top' scope='row'>Tema:</th>
  <td align='left' valign='top'>".$tema."</td>
</tr>

<tr>
    <th align='right' valign='top' scope='row'>Curso:</th>
    <td align='left' valign='top' style='
    width: 104px;'>".$ano."º ".$division."º</td>
  </tr>

     <tr>
     <input type='hidden' name='ano' value='".$ano."'>
     <input type='hidden' name='division' value='".$division."'>
     <input type='hidden' name='materia' value='".$materia."'>
     <input type='hidden' name='archivo' value='".$archivo."'>
     <input type='hidden' name='tema' value='".$tema."'>
     <input type='hidden' name='confirmacion' value='true'>
    <th colspan='2' valign='top' scope='row'><br /><button class='button button-rounded button-flat-primary' type=submit>Confirmar</button></form>&nbsp;&nbsp;<a href='usuario.php?control=materiales'><button class='button button-rounded button-flat-primary' form='232'>Cancelar</button></a>
</th>
    </tr>

</tbody></table>
";
}



?>
