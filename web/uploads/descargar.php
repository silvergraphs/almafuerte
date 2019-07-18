<?php
include '../variables.php'; // Required vars
include '../log/logHandler.php'; // Required file for logs

//Si la variable archivo que pasamos por URL no esta 
//establecida acabamos la ejecucion del script.
if (!isset($_POST['archivo']) || empty($_POST['archivo']) || !isset($_POST['materia']) || empty($_POST['materia'])) {
   exit();
}

$pagina = "Descargas->Materiales";
session_start();

if (isset($_SESSION['idUsuario'])) {
//Utilizamos basename por seguridad, devuelve el 
//nombre del archivo eliminando cualquier ruta. 
$ano = $_POST['ano'];
$division = $_POST['division'];
$materia = $_POST['materia'];
$archivo = basename($_POST['archivo']);
$ruta = $url_subidaMateriales."/".$ano.$division."/".$materia."/".$archivo;

if (is_file($ruta))
{
   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$archivo);
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: '.filesize($ruta));
   readfile($ruta);
   reg ($pagina, $_SESSION['idUsuario']." descargo el material ".$archivo);
}else{
	echo "Se ha producido un error, contacta con Secretaria.";
	reg ($pagina, "Error al descargar ".$archivo." - Usuario: ".$_SESSION['idUsuario']." - Ruta completa: '".$ruta."'");
	exit();
}
}else{
    echo 'No tienes permiso para la descarga';
}
?>