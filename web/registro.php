<?php
require_once "variables.php";
require_once "login.php";
require_once "log/logHandler.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E.E.S.T Nº8 Almafuerte</title>



<!-- Favicon -->
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<meta name="theme-color" content="#ffffff">
<!-- Favicon -->

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/botones.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="ism/css/my-slider.css"/>
<script src="js/verificacion_campos.js" type="text/javascript"></script>
<script src="ism/js/ism-2.2.min.js"></script>
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
</head>

<body class=fondo>

<!-- LOGO --><!-- LOGO -->

<table width="300" border="0" align=center>
  <tr>
    <td height="129" align=center><img src="images/logo.png" alt="" width=50% /></td>
    <td align="center" valign="top"><br /><span class="titulo">Escuela de Educación Superior Técnica Nº8</span><br />
    <br /><span class="lema">"Hacia el desarrollo en salud de nuestra juventud, el avance intelectual por el ejercicio del pensamiento, y la formación integral del hombre por la maduración de sus sentimientos."</span><br /></td>
  </tr>
  <tr>
<!-- LOGIN -->
<?php 
if(!isset($_SESSION['idUsuario'])) {
echo "<td valign='top'>
<div align=center>
<table width='300' height='0' border='0' align=center class=login><form action='' method='post'>
  <tr>
    <th height='0' colspan='2' align=center valign='top' class=boxtitulo scope='row'>Iniciar sesión</th>
    </tr>
    <tr>
    <th height='0' colspan='2' align=center valign='top' class=errLogin scope='row'>".$errLogin."</th>
    </tr>
  <tr>
    <th width='93' align=left valign='top' scope='row'><i class='fa fa-user' aria-hidden='true' style='
    padding-left: 12.68px;'></i>&nbsp;Usuario</th>
    <td width='197' align=center valign='top'><input class='inputLogin' type='text' name='user' maxlength='16'/></td>
  </tr>
  <tr>
    <th align=left valign='top' scope='row'><i class='fa fa-unlock-alt' aria-hidden='true' style='
    padding-left: 13.8px;'></i>&nbsp;Clave</th>
    <td align=center valign='top'><input class='inputLogin' name='password' type='password' maxlength='16'/></td>
  </tr>
    <tr>
    <th colspan='2' valign='top' scope='row'><br /><button class='button button-rounded button-flat-primary' name='login' type='submit' >Iniciar sesión</button></form> <button class='button button-rounded button-flat-primary' onClick=window.location.href='$registro'>Registro</button></th>
    </tr>
</table>
</div>";
} else {
	echo $loggedIn;
}

?>
<!-- LOGIN -->
<br />
<!-- FBFEED -->
<div align=center>
<table width="300" height="0" border="0" align=center class=boxcircular>
  <tr>
    <th height="0" colspan="2" align=center scope="row" class=boxtitulo>Nuestro Facebook</th>
    </tr>
    
    <tr>
    <th colspan="2" scope="row"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FEscuela-Tecnica-8-Almafuerte-136023523209070%2F&tabs=timeline&width=280&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId" width="280" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></th>
    </tr>
    <tr>
      <th colspan="2" scope="row"></th>
    </tr>
</table>
</div>
<!-- FBFEED -->
<br />
<!-- PUBLICIDAD -->
<div align=center>
<table width="300" height="0" border="0" align=center class=boxcircular>
  <tr>
    <th height="0" colspan="2" align=center scope="row" class=boxtitulo>Publicidad</th>
    </tr>

    <tr>
    <th colspan="2" scope="row"><?php include $publicidad; ?></th>
    </tr>
    <tr>
      <th colspan="2" scope="row"></th>
    </tr>
</table>
</div>
<!-- FIN PUBLICIDAD -->
</td>


    
     <td valign="top"><!-- NAVBAR -->
<table width="888" height="35" border="0">
  <tr>
    <th scope="col"><div id='cssmenu'>
<ul>
   <li ><a href='<?php echo $index; ?>'><i class="fas fa-home"></i> <span>Inicio</span></a></li>
   <li><a href='<?php echo $cde; ?>'><i class="fas fa-graduation-cap"></i> <span>CDE</span></a>
   </li>
   <li><a href='<?php echo $historias; ?>'><i class="fas fa-newspaper"></i></i> <span>Historias</span></a>
   </li>
    <li><a href='<?php echo $galeria; ?>'><i class="fas fa-camera"></i> <span>Galeria</span></a>
   </li>
   <li><a href='<?php echo $noticias; ?>'><i class="fas fa-flag"></i> <span>Noticias</span></a></li>
   <li><a href='<?php echo $eventos; ?>'><i class="fas fa-calendar-alt"></i> <span>Eventos</span></a></li>
   <li><a href='<?php echo $contacto; ?>'><i class="fab fa-connectdevelop"></i> <span>Contacto</span></a></li>
</ul>
</div>
</th>
<!-- NAVBAR -->

<!-- Registro -->

<?php
include "conexion.php";
include "variables.php";
 include "funciones.php";

$doc = ($_POST['doc']);
$usuario =  ($_POST['usuario']);
$clave =  ($_POST['clave']);
$clave2 =  ($_POST['clave2']);
$email =  ($_POST['email']);
$mensaje = null;


// Pagina de Registro (para los log)
$pagina = "Registro";

if (isset($_SESSION['idUsuario'])) { // Comprueba si el usuario ha iniciado sesion o no
echo ("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=".$url."'>"); // Si el usuario ya ha iniciado sesion, se lo redirecciona a la pagina principal
}
if (isset($doc) or isset($usuario) or isset($clave) or isset($clave2) or isset($email)){ // comprobamos que los campos esten seteados
if ($doc and $usuario and $clave and $clave2 and $email) { // Comprueba si estan rellenos o no 
	if ($clave == $clave2) { // Si las claves coinciden entra al if :V
			$tabla = "usuario";
	// Comprobamos si el usuario esta registrado 

$nuevo_usuario=mysql_query("select usuario from $tabla where usuario='$usuario'"); 
if(mysql_num_rows($nuevo_usuario)>0) { 
$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El usuario ingresado ya está registrado";
} 
// ------------ Si no esta registrado el usuario continua el script 
else { 
// ============================================== 
// Comprobamos si el email esta registrado 

$nuevo_email=mysql_query("select email from $tabla where email='$email'"); 
if(mysql_num_rows($nuevo_email)>0) { 
$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El email ingresado ya está registrado";
} 
// ------------ Si no esta registrado el e-mail continua el script 
else { 
// ============================================== 
// Comprobamos si el documento esta registrado 

$nuevo_doc=mysql_query("select documento from $tabla where documento='$doc'"); 
if(mysql_num_rows($nuevo_doc)>0) { 
$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> El DNI ingresado ya está registrado";
} 
// ------------ Si no esta registrado el DNI continua el script 

else { 
// ============================================== 
// Comprobamos si el documento esta registrado en las tablas Alumnos/Profesores/Directivos para determinar el tipoUsuario

$nuevo_doc=mysql_query("SELECT docAlumno FROM alumnos WHERE docAlumno='$doc'"); 
if(mysql_num_rows($nuevo_doc)>0) { 
$tipoUsuario = "Alumno";
$hash = sha1($clave); // Aca lo registra
mysql_query("INSERT INTO $tabla  
(documento, usuario, clave, email, tipoUsuario) VALUES ('".mysqli_real_escape_string($con,$doc)."','".mysqli_real_escape_string($con,$usuario)."','".$hash."','".mysqli_real_escape_string($con,$email)."','".$tipoUsuario."')", $conexion);
$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Registrado con éxito";
reg("Registro","Usuario: ".$usuario." - Documento: ".$doc." - Email: ".$email." - Tipo de usuario: ".$tipoUsuario."");
}else{
$nuevo_doc=mysql_query("SELECT docProfesor FROM profesores WHERE docProfesor='$doc'"); 
if(mysql_num_rows($nuevo_doc)>0) { 
$tipoUsuario = "Profesor";
$hash = sha1($clave); // Aca lo registra
mysql_query("INSERT INTO $tabla  
(documento, usuario, clave, email, tipoUsuario) VALUES ('".mysqli_real_escape_string($con,$doc)."','".mysqli_real_escape_string($con,$usuario)."','".$hash."','".mysqli_real_escape_string($con,$email)."','".$tipoUsuario."')", $conexion);
$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Registrado con éxito";
reg("Registro","Usuario: ".$usuario." - Documento: ".$doc." - Email: ".$email." - Tipo de usuario: ".$tipoUsuario."");
}else{
$nuevo_doc=mysql_query("SELECT docDirectivo FROM directivo WHERE docDirectivo='$doc'"); 
if(mysql_num_rows($nuevo_doc)>0) { 
$tipoUsuario = "Directivo";
$hash = sha1($clave); // Aca lo registra
mysql_query("INSERT INTO $tabla  
(documento, usuario, clave, email, tipoUsuario) VALUES ('".mysqli_real_escape_string($con,$doc)."','".mysqli_real_escape_string($con,$usuario)."','".$hash."','".mysqli_real_escape_string($con,$email)."','".$tipoUsuario."')", $conexion);
$msg = "<i class='fa fa-check-circle' aria-hidden='true'></i> Registrado con éxito";
reg("Registro","Usuario: ".$usuario." - Documento: ".$doc." - Email: ".$email." - Tipo de usuario: ".$tipoUsuario."");
}else{
$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Por favor registrarse en Secretaria"; // ------------ Si no esta registrado el DNI dice que se registren en Secretaria
}
}
}
}
}
}
	
}else{ // Las claves no coinciden
	$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Las claves no coinciden";
}  
}else{ // Sino sale
		$msg = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Faltan rellenar campos";
	}
}	

	
?>

<div align=center>
<table width="880" height="0" align=center class=boxcircular>
  <tr>
  <br />
    <th height="0" colspan="2"  align=center scope="row" class=boxtitulo>Registro</th>
    </tr>
    <tr>
    <th colspan="2" scope="row">

	<?php 
	if(isset($msg)){
  echo "<div class='error' style='font-size: 15px;'><p class='error'>".$msg."</p></div>";
} else {
	echo "<br>";
}
?><form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
  <tr>  
    <th width="153" align=right valign="top" scope="row">DNI</th>
    <td width="17" align=left valign="top"><input type="text" name="doc" class="input" maxlength="8" pattern=".{8,8}" required onkeypress="return valida(event)"/><font size=2>&nbsp;Sin guiones</input></font></td>
  </tr>
  <tr>  
    <th width="153" align=right valign="top" scope="row">Usuario</th>
    <td width="17" align=left valign="top"><input type="text" name="usuario" class="input" required maxlength="16" /><font size=2>&nbsp;Max. 16 caracteres</input></font></td>
  </tr>
  <tr>
    <th align=right valign="top" scope="row">Clave</th>
    <td align=left valign="top"><input class="input" type="password" name="clave" required maxlength="16"/><font size=2>&nbsp;Max. 16 caracteres</input></font></td>
  </tr>
   <tr>
    <th align=right valign="top" scope="row">Repetir Clave</th>
    <td align=left valign="top"><input class="input" type="password" name="clave2" required maxlength="16"/><font size=2>&nbsp;Max. 16 caracteres</input></font></td>
  </tr>
    <tr>
    <th align=right valign="top" scope="row">Email</th>
    <td align=left valign="top"><input class="input" type="email" name="email" required maxlength="64"/><font size=2>&nbsp;ejemplo@ejemplo.com</input></font></td> 
  </tr>
   <tr>
    <th colspan="2" valign="top" scope="row"><br />[reCAPTCHA]
</th>
    <tr>
	 <tr>
    <th colspan="2" valign="top" scope="row"><br /><button class="button button-rounded button-flat-primary" type=submit>Registrarme</button></form>&nbsp;&nbsp;<button class="button button-rounded button-flat-primary" type=submit onClick="window.history.back();">Volver</button>	
</th>
    </tr>
     <tr>
    <th colspan="2" scope="row">
  <tr>
</table>
</div> </th>
    </tr>
    <tr>
      <th colspan="2" scope="row"></th>
    </tr>

</div>
<!-- Registro -->

  </tr>
  
 
</table>

<div align=center class=footer>
<hr>
<br>
<table width="300" border="0">
  <tr>
    <td align=center><script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var f=new Date();
document.write("[&nbsp; " + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
</script><?php


$fecha=time(); 
$movhoras = 1; 
$fecha = $fecha+($movhoras * 60 * 60);  
$fecha = date(" H:i", $fecha ); 

echo $fecha;


?> &nbsp;]<br /><br /><font size=1>E.E.S.T Nº 8 Almafuerte © 2018</font></td>
  </tr>
</table>
</div>

</body>
</html>
