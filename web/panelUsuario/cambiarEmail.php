<?php
require ("functions/sqlQuery.php");

sqlQuery ("usuario",$_SESSION['documento'],$result);

$emailActual = $result->email;
$emailNuevo =  ($_POST['emailNuevo']);

// Pagina de Cambio de email (para los log)
$pagina = "Cambio de Email";


if (!isset($_SESSION['idUsuario'])) { // Comprueba si el usuario ha iniciado sesion o no
	echo "Se requiere iniciar sesion para acceder a esta seccion<br><br>";
	echo "Serás redireccionado a la pagina principal...";
	echo ("<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=".$url."'>"); // Si el usuario no ya ha iniciado sesion, se lo redirecciona a la pagina principal
}
if (isset($emailNuevo)){ // comprobamos que los campos esten seteados

if ($emailNuevo) { // Comprueba si estan rellenos o no

$tabla = "usuario";
$documento = $_SESSION['documento'];
$usuario = $_SESSION['user'];

$emailActualDb=mysql_query("SELECT * FROM $tabla WHERE documento = '$documento' AND email = '$emailActual'");
if(mysql_num_rows($emailActualDb)>0) { //Verifica que el usuario actual coincida con el de la DB

	// Comprobamos si el email esta registrado

	$nuevo_email=mysql_query("select email from $tabla where email='$emailNuevo'"); 
	if(mysql_num_rows($nuevo_email)>0) {
	$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El email ingresado ya está registrado";
}else{ // Si el email no esta registrado continua el script
mysql_query("UPDATE $tabla SET `email` = '$emailNuevo' WHERE documento = $documento");
$emailActual = $emailNuevo;
$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Email modificado";
reg($pagina,"Usuario: ".$usuario." - Documento: ".$documento." - cambió su email a ".$emailNuevo.".");
}
}else{
	$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El email actual no es correcto<br>Informanos el error en Secretaria";
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
Cambiar email<br><br>

".$msgError."

<form action='".htmlentities($_SERVER['PHP_SELF'])."?control=cambiarEmail' method='post'>
<table border='0' align='center' style='
    border-spacing: 10px;

'>
  <tbody><tr>
    <th align='right' valign='top' scope='row'>Email actual:</th>
    <td align='left' valign='top'>".$emailActual."</td>
  </tr>
<tr>
    <th align='right' valign='top' scope='row'>Email nuevo:</th>
    <td align='left' valign='top' style='
    width: 104px;'><input class='inputUserChange' type='email' name='emailNuevo' required maxlength='64'/></td>
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
