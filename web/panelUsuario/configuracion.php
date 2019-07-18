<?php
include "../conexion.php";
include "../variables.php";
require "functions/sqlQuery.php";

	sqlQuery ("usuario",$_SESSION['documento'],$result);
	
	$emailUser = $result->email;
	$tipoUsuario = $result->tipoUsuario;

if(isset($_SESSION['idUsuario'])) {

echo "<table border='0' align='center' style='
    border-spacing: 10px;
    border-color: #ff634700;
'>
  <tbody><tr>
    <th align='right' valign='top' scope='row'>Usuario web:</th>
    <td align='left' valign='top' style='
    width: 98px;'>".$_SESSION['user']."</td>
  </tr>
<tr>
    <th align='right' valign='top' scope='row'>Tipo de cuenta:</th>
    <td align='left' valign='top' style='
    width: 98px;'>".$tipoUsuario."</td>
  </tr>
   <tr>
    <th align='right' valign='top' scope='row'>Email:</th>
    <td align='left' valign='top'>".$emailUser."</td>
  </tr>
</tbody></table>";

echo "<br>";
echo "<a href='/usuario.php?control=cambiarUsuario'><button class='button button-rounded button-flat-primary' type=submit>Cambiar usuario</button></a> - ";
echo "<a href='/usuario.php?control=cambiarClave'><button class='button button-rounded button-flat-primary' type=submit>Cambiar clave</button></a> - ";
echo "<a href='/usuario.php?control=cambiarEmail'><button class='button button-rounded button-flat-primary' type=submit>Cambiar email</button></a>";

}else{

		echo "Se requiere iniciar sesion para acceder a esta seccion<br><br>";
		echo "Serás redireccionado a la pagina principal...";
		echo ("<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=".$url."'>");
}

?>
