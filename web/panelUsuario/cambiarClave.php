<?php

$claveActual = ($_POST['claveActual']);
$claveNueva1 =  ($_POST['claveNueva1']);
$claveNueva2 =  ($_POST['claveNueva2']);

// Pagina de Cambio de clave (para los log)
$pagina = "Cambio de Clave";


if (!isset($_SESSION['idUsuario'])) { // Comprueba si el usuario ha iniciado sesion o no
	echo "Se requiere iniciar sesion para acceder a esta seccion<br><br>";
	echo "Serás redireccionado a la pagina principal...";
	echo ("<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=".$url."'>"); // Si el usuario no ya ha iniciado sesion, se lo redirecciona a la pagina principal
}
if (isset($claveActual) or isset($claveNueva1) and isset($claveNueva2)){ // comprobamos que los campos esten seteados

if ($claveActual and $claveNueva1 and $claveNueva2) { // Comprueba si estan rellenos o no

// Encriptacion de las claves
$claveActual = sha1($claveActual);
$claveNueva1 = sha1($claveNueva1);
$claveNueva2 = sha1($claveNueva2);

$tabla = "usuario";
$documento = $_SESSION['documento'];
$usuario = $_SESSION['user'];

$claveActualDb=mysql_query("SELECT * FROM $tabla WHERE documento = '$documento' AND clave = '$claveActual'");
if(mysql_num_rows($claveActualDb)>0) { //Verifica que la clave actual introducida coincida con la de la DB
if ($claveNueva1 == $claveNueva2) { // Si las claves NUEVAS coinciden cambia la clave


mysql_query("UPDATE $tabla SET `clave` = '$claveNueva2' WHERE documento = $documento");
$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Clave modificada";
reg($pagina,"Usuario: ".$usuario." - Documento: ".$documento." - cambió su clave.");

}else{ // Las claves no coinciden
	$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Las claves no coinciden";
}
}else{
	$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> La clave actual no es correcta";
}
}else{ // Sino sale
		$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Faltan rellenar campos";
	}
}


if(isset($msg)){
  $msgError = "<div class='error' style='font-size: 15px;'><p class='error'>".$msg."</p></div>";
} else {
  $msgError = "<br>";
}

echo "
Cambiar clave<br><br>

".$msgError."

<form action='".htmlentities($_SERVER['PHP_SELF'])."?control=cambiarClave' method='post'>
<table border=0 align=center>
  <tr>
    <th align=right valign='top' scope='row'>Clave actual:</th>
    <td align=left valign='top'><input class='inputUserCp' type='password' name='claveActual' required maxlength='16'/></input></td>
  </tr>
   <tr>
    <th align='right' valign='top' scope='row' style='width: 265px;'>Clave nueva:</th>
    <td align=left valign='top'><input class='inputUserCp' type='password' name='claveNueva1' required maxlength='16'/><font size=2 class=textoReducido>&nbsp;&nbsp;Max. 16 caracteres</input></font></td>
  </tr>
   <tr>
    <th align=right valign='top' scope='row'>Repetir clave nueva:</th>
    <td align=left valign='top'><input class='inputUserCp' type='password' name='claveNueva2' required maxlength='16'/><font size=2 class=textoReducido>&nbsp;&nbsp;Max. 16 caracteres</input></font></td>
  </tr>
   <tr>
	 <tr>
    <th colspan='2' valign='top' scope='row'><br /><button class='button button-rounded button-flat-primary' type=submit>Confirmar</button></form>&nbsp;&nbsp;<button class='button button-rounded button-flat-primary' type=submit onClick=window.location.href='usuario.php?control=configuracion'>Volver</button>	
</th>
    </tr>
</table>
</form>
";


?>
