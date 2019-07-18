<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);


$host = "";
$user = "";
$pass = "";
$db = "";

$errorMsgDb = '
<style>
.divError {
	font-size: 19px;
    font-family: sans-serif;
	padding-top: 100px;
}
</style>
<br>
<div class=divError align=center>Error en la base de datos
<br>
<br>
Por favor informar el error en Secretaria</div><br>
<br>
<strong>
<div align="center" style="
    font-size: 11px;
    font-family: sans-serif;
    text-transform: uppercase;
">E.E.S.T N°8 Almafuerte</div></strong>';


$conexion = mysql_connect($host, $user, $pass)
    or die($errorMsgDb);
// Conectado a la base de datos
mysql_select_db($db) or die($errorMsgDb);

define('DB_SERVER',''); 
define('DB_NAME',''); 
define('DB_USER',''); 
define('DB_PASS',''); 

$con=@mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die($errorMsgDb);
    }
    if (@mysqli_connect_errno()) {
        die($errorMsgDb);
    }
?>