<?php
include "../../conexion.php";
include "../../variables.php";
include "panelUsuario/functions/sqlQuery.php";
include "../../log/logHandler.php";

////////////////////////
// almafuerte.edu.net
///////////////////////

// Pagina de Cambio de usuario (para los log)
$pagina = "Materiales->subirMat";

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

$direccionArchivos = $dir_subidaMateriales. '/' .$curso. '/' .$materia. '/';

if (isset($curso) and isset($materia)) { // comprobamos que los campos esten seteados

if (($curso) and ($materiales)) { // Comprueba si estan rellenos o no

	// Comprobamos que la carpeta exista, en caso de que no, la creamos
	if (!file_exists($direccionArchivos)) {
    mkdir($direccionArchivos, 0777, true);
	}

	// Define el directorio del fichero: /materiales/curso/materia
	$fichero_subido = $direccionArchivos . basename($_FILES['archivo']['name']);

	if (file_exists($fichero_subido)) {
		$fechaActual = date("d")."-".date("m")."-".date("Y"); // Obtiene la fecha actual de subida
		$nombreArchivo = $_FILES['archivo']['name'];
		if (mysql_query("UPDATE `recursos` SET `fechaSubida` = '$fechaActual' WHERE `recursos`.`archivo` = '$nombreArchivo'",$conexion) AND move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
			$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Archivo actualizado con éxito";
		}else{
			$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Error al subir archivo";
		}
	}else{

	if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) { // Comprueba si el archivo esta subido
		 	$fechaActual = date("d")."-".date("m")."-".date("Y"); // Obtiene la fecha actual de subida
			$nombreArchivo = $_FILES['archivo']['name'];
			mysql_query("INSERT INTO `recursos` (`archivo`, `materias_nombre`, `tema`, `ano`, `division`, `fechaSubida`, `subidoPor`) VALUES ('$nombreArchivo', '$materia', '$tema', '$ano', '$division', '$fechaActual', '$subidoPor')");
      $msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Archivo subido con éxito";
	} else {
	   $msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Error al subir archivo";
	}
	}

}else{ // Sino sale
		$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Faltan rellenar campos";
	}
}


///////////////////////////////////////////////////


if(isset($msg)){
  $msgError = "<div class='error' style='font-size: 15px;'><p class='error'>".$msg."</p></div>";
} else {
  $msgError = "<br>";
}

echo "
<br>
".$msgError."

<form enctype='multipart/form-data' action='".htmlentities($_SERVER['PHP_SELF'])."?control=subirMat' method='post'>
<table border='0' align='center' style='
    border-spacing: 10px;

'>
  <tbody><tr>
    <th align='right' valign='top' scope='row'>Curso:</th>
    <td align='left' valign='top'><select name='ano' class='selectMateriales'>
	<option value='1'>1º</option>
	<option value='2'>2º</option>
	<option value='3'>3º</option>
	<option value='4'>4º</option>
	<option value='5'>5º</option>
	<option value='6'>6º</option>
	<option value='7'>7º</option>
</select>
<select name='division' class='selectMateriales'>
	<option value='1'>1º</option>
	<option value='2'>2º</option>
	<option value='3'>3º</option>
	<option value='4'>4º</option>
	<option value='5'>5º</option>
	<option value='6'>6º</option>
	<option value='7'>7º</option>
</select></td>
  </tr>

  <tr>
    <th align='right' valign='top' scope='row'>Materia:</th>
	<td align='left' valign='top'><select name='materia' class='selectMateriales'>
	"; 
	$result = mysqli_query($con,"SELECT nombre FROM materias"); 
	while ($row = mysqli_fetch_array($result)) {   
		echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
	}
	echo "
</select></td>
  </tr>

<tr>
    <th align='right' valign='top' scope='row'>Tema:</th>
    <td align='left' valign='top' style='
    width: 104px;'><input class='selectMateriales' type='text' name='tema' required maxlength='30'/><font size='2' style='
    line-height: 26px;
    font-size: 77%;
'><br>Max. 30 caracteres</font></input></font></td>
  </tr>
     <tr>

     <tr>
		 <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
	 <input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
         <th align='right' valign='top' scope='row'>Archivo:</th>
         <td align='left' valign='top' style='
         width: 104px;'><input type='file' name='archivo' required/><font size='2' style='
         line-height: 26px;
         font-size: 77%;
     '><br>Tamaño máximo de archivo: 8MB</font></input></font></td>
       </tr>
          <tr>

	 <tr>
    <th colspan='2' valign='top' scope='row'><br /><button class='button button-rounded button-flat-primary' type=submit>Confirmar</button></form>&nbsp;&nbsp;<button class='button button-rounded button-flat-primary' type=submit onClick=window.location.href='usuario.php?control=materiales'>Volver</button>
</th>
    </tr>

</tbody></table>
</form>
";

?>
