<?php
require_once "login.php";
include "variables.php";
include "funciones.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E.E.S.T Nº8 Almafuerte - Inicio</title>



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
</head>

<body class="fondo">

<!-- LOGO --><!-- LOGO -->

<table width="300" border="0" align="center">
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

<!-- Historias -->
<div align=center>
<table width="880" height="0" align=center border="0" class=boxcircular>
  <tr>
  <br />
    <th height="0" colspan="2"  align=center scope="row" class=boxtitulo>Historias</th>
    </tr>
    <tr>
    <th colspan="2" scope="row">
    <div class=boxcontent>
    <br>
    
<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fmedia%2Fset%2F%3Fset%3Da.560159464128805.1073741840.136023523209070%26type%3D1%26l%3D093eae7d2b&width=700&show_text=true&height=816&appId" width="700" height="916" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
<br>
<br>
Mira éstas historias completas en nuestro Facebook, <a href="https://www.facebook.com/media/set/?set=a.560159464128805.1073741840.136023523209070&type=3">click aquí</a>.
</table>
</div>
<!-- Historias -->

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