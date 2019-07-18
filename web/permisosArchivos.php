<?php

//-------------------->
// almafuerte.edu.net
// Funciones de permisos de archivos
//------------------->

// Subir archivos
  $subirArchivos = array(
      'alumno' => false,
      'profesor' => true,
      'directivo' => true,
  );

// Descargar archivos
  $descargarArchivos = array(
      'alumno' => true,
      'profesor' => true,
      'directivo' => true,
  );

// Modificar archivos
  $modificarArchivos = array(
      'alumno' => false,
      'profesor' => true,
      'directivo' => true,
  );


// Subir archivos
function puedeSubirArchivos ($tipoUsuario) {
  global $subirArchivos;
  foreach($subirArchivos as $permisoUsuario=>$valor)
  	{
  	if ($tipoUsuario == $permisoUsuario) {
      return $valor;
    }
  	}
}


// Descargar archivos
function puedeDescargarArchivos ($tipoUsuario) {
  global $descargarArchivos;
  foreach($descargarArchivos as $permisoUsuario=>$valor)
  	{
  	if ($tipoUsuario == $permisoUsuario) {
      return $valor;
    }
  	}
}


// Modificar archivos
function puedeModificarArchivos ($tipoUsuario) {
  global $modificarArchivos;
  foreach($modificarArchivos as $permisoUsuario=>$valor)
  	{
  	if ($tipoUsuario == $permisoUsuario) {
      return $valor;
    }
  	}
}

?>
