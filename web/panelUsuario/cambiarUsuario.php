<?php

$usuarioActual = $_SESSION['user'];
$usuarioNuevo =  ($_POST['usuarioNuevo']);

// Pagina de Cambio de usuario (para los log)
$pagina = "Cambio de Usuario";


if (!isset($_SESSION['idUsuario'])) { // Comprueba si el usuario ha iniciado sesion o no
	echo "Se requiere iniciar sesion para acceder a esta seccion<br><br>";
	echo "Serás redireccionado a la pagina principal...";
	echo ("<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=".$url."'>"); // Si el usuario no ya ha iniciado sesion, se lo redirecciona a la pagina principal
}
if (isset($usuarioNuevo)){ // comprobamos que los campos esten seteados

if ($usuarioNuevo) { // Comprueba si estan rellenos o no

$tabla = "usuario";
$documento = $_SESSION['documento'];
$usuario = $_SESSION['user'];

$usuarioActualDb=mysql_query("SELECT * FROM $tabla WHERE documento = '$documento' AND usuario = '$usuarioActual'");
if(mysql_num_rows($usuarioActualDb)>0) { //Verifica que el usuario actual coincida con el de la DB

	// Comprobamos si el usuario ya esta registrado
	$nuevo_usuario=mysql_query("select usuario from $tabla where usuario='$usuarioNuevo'");
	if(mysql_num_rows($nuevo_usuario)>0) {
	$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El usuario ingresado ya está registrado";
  }else{ // ------------ Si no esta registrado el usuario continua el script

mysql_query("UPDATE $tabla SET `usuario` = '$usuarioNuevo' WHERE documento = $documento");
$_SESSION['user'] = $usuarioNuevo;
$usuario = $usuarioNuevo;
$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Usuario modificado";
reg($pagina,"Usuario: ".$usuario." - Documento: ".$documento." - cambió su usuario a ".$usuarioNuevo.".");
}
}else{
	$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El nombre de usuario actual no es correcto<br>Informanos el error en Secretaria";
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
Cambiar usuario<br><br>

".$msgError."

<form action='".htmlentities($_SERVER['PHP_SELF'])."?control=cambiarUsuario' method='post'>
<table border='0' align='center' style='
    border-spacing: 10px;

'>
  <tbody><tr>
    <th align='right' valign='top' scope='row'>Usuario actual:</th>
    <td align='left' valign='top'>".$_SESSION['user']."</td>
  </tr>
<tr>
    <th align='right' valign='top' scope='row'>Usuario nuevo:</th>
    <td align='left' valign='top' style='
    width: 104px;'><input class='inputUserChange' type='text' name='usuarioNuevo' required maxlength='16'/><font size='2' style='
    line-height: 26px;
    font-size: 77%;
'><br>Max. 16 caracteres</font></input></font></td>
  </tr>
     <tr>
	 <tr>
    <th colspan='2' valign='top' scope='row'><br /><button class='button button-rounded button-flat-primary' type=submit>Confirmar</button></form>&nbsp;&nbsp;<button class='button button-rounded button-flat-primary' type=submit onClick=window.location.href='usuario.php?control=configuracion'>Volver</button>
</th>
    </tr>

</tbody></table>
</form>
";


?>
