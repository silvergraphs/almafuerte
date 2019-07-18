<?php
session_start(); //session_start() crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie
require_once "log/logHandler.php";
require_once "conexion.php";
/*Función verificar_login() --> verificar_login, esta se encargara de hacer una consulta a la base de datos para saber si el usuario ingresado es correcto o no.*/

function cargarAlumno($documento,&$result)
    {
        $sql = "SELECT * FROM alumnos WHERE docAlumno = '$documento'";
        $rec = mysql_query($sql);
        $count = 0;
        while($row = mysql_fetch_object($rec))
        {
            $count++;
            $result = $row;
        }
    }



function verificar_login($user,$password,&$result)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = '$user' and clave = '$password'";
        $rec = mysql_query($sql);
        $count = 0;
        while($row = mysql_fetch_object($rec))
        {
            $count++;
            $result = $row;
        }
        if($count == 1)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


function anadirIntentoSesion () {
	setcookie("contadorSesion", 0, time() + (60*2) );  // Crea una Cookie con un tiempo de vida de 2 minutos
	$_COOKIE["contadorSesion"]++; // Añade un intento de sesion a la Cookie
}


    if ($_SESSION['tipoUsuario'] == "Alumno") {
        $accSubTitle = $_SESSION['año']."º ".$_SESSION['division']."º ".$_SESSION['especialidad'];
    }elseif ($_SESSION['tipoUsuario'] == "Profesor") {
        $accSubTitle = $_SESSION['tipoUsuario'];
    }

/*Luego haremos una serie de condicionales que identificaran el momento en el boton de login es presionado y cuando este sea presionado llamaremos a la función verificar_login() pasandole los parámetros ingresados:*/

// Proteccion contra inyecciones SQL
$usuario = mysqli_real_escape_string($con,$_POST['user']);
$clave = $_POST['password'];
// Encriptacion de la clave
$sha1_pass = sha1($clave);
// Proteccion contra ataques de fuerza bruta
$intentosSesion = 3; // Define la cantidad de intentos de inicio de sesion permitidos

if(!isset($_SESSION['idUsuario'])) //para saber si existe o no ya la variable de sesión que se va a crear cuando el usuario se logee
{
    if(isset($_POST['login'])) //Si la primera condición no pasa, haremos otra preguntando si el boton de login fue presionado
    {
        if(verificar_login($usuario,$sha1_pass,$result) == 1) //Si el boton fue presionado llamamos a la función verificar_login() dentro de otra condición preguntando si resulta verdadero y le pasamos los valores ingresados como parámetros.
        {
            /*Si el login fue correcto, registramos las variables de sesión y al mismo tiempo refrescamos la pagina index.php.*/
            $_SESSION['idUsuario'] = $result->idUsuario;
			$_SESSION['user'] = $usuario;
			$_SESSION['documento'] = $result->documento;
			$_SESSION['tipoUsuario'] = $result->tipoUsuario;
			$result = null;
			cargarAlumno($_SESSION['documento'],$result);
			$_SESSION['especialidad'] = $result->especialidad;
			$_SESSION['año'] = $result->ano;
			$_SESSION['division'] = $result->division;
            reg("Login",$_SESSION['user']." inició sesión."); // Registramos que el usuario inicio sesion llamando a la funcion reg()
            header("location:".$_SERVER['PHP_SELF']);
        }
        else
        {
		anadirIntentoSesion();
		if ($_COOKIE["contadorSesion"] >= $intentosSesion) {
			$errLogin = "<i class='fa fa-exclamation-triangle fa-1x' aria-hidden='true'></i> <font size=2px>&nbsp; Llegaste al maximo de inicios de sesion permitidos</font>";
		}
            if ((!empty($_POST['user'])) and (!empty($_POST['password']))) {
			$errLogin = "<i class='fa fa-exclamation-triangle fa-1x' aria-hidden='true'></i> <font size=2px>&nbsp; Usuario o clave incorrecta</font>";
			//$errLogin = $_COOKIE["contadorSesion"];
			} else {
			$errLogin = "<i class='fa fa-exclamation-triangle fa-1x' aria-hidden='true'></i> <font size=2px>&nbsp; Introduce el usuario y la clave</font>";
			};
        } //Si la función verificar_login() no pasa, que se muestre un mensaje de error.
    }
	 } else {
    // Si la variable de sesión 'idUsuario' ya existe, que muestre el mensaje de saludo.
    $loggedIn = "<td valign='top'>
<div align=center>
<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
<table width='300' height='0' border='0' align=center class=login>
  <tr>
    <th height='0' colspan='2' align=center valign='top' class=boxtitulo scope='row'>Panel de Usuario</th>
    </tr>
    <tr>
    <th height='0' colspan='2' align=center valign='top' class=space scope='row'><i class='fa fa-user-circle fa-2x' aria-hidden='true'></i></th>
    </tr>
	  <tr>
    <th width='93' align=center valign='top' scope='row' class='panelUsuario'>".$_SESSION['user']."</th>
  </tr>
  <tr>
    <th width='93' align=center valign='top' scope='row' class='panelUsuarioDivision'>".$accSubTitle."</th>
  </tr>
  <tr>
    <th height='0' colspan='2' align=center valign='top' class=space scope='row'></th>
    </tr>
  <tr>
    <th width='93' align=center valign='top' scope='row' class='panelUsuario'><a href='/usuario.php?control=misdatos'>Mis datos</a></th>
  </tr>
  <tr>
    <th width='93' align=center valign='top' scope='row' class='panelUsuario'><a href='/usuario.php?control=materiales'>Material escolar</a></th>
  </tr>
  <tr>
    <th width='93' align=center valign='top' scope='row' class='panelUsuario'><a href='/usuario.php?control=configuracion'>Configuración</a></th>
  </tr>
  <tr>
    <th width='93' align=center valign='top' scope='row' class='panelUsuario'><a href='logout.php'>Cerrar sesión</a></th>
  </tr>
</table>
</div>";
}
?>
