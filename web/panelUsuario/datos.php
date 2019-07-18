<?php
include "../conexion.php";
include "../variables.php";
require "functions/sqlQuery.php";

sqlQuery ("usuario",$_SESSION['documento'],$result);

$tipoUsuario = $result->tipoUsuario;

if ($tipoUsuario == "Alumno") {
	sqlQuery ("alumnos",$_SESSION['documento'],$result);

	$doc = $result->docAlumno;
	$nombre = $result->nombre;
	$apellido = $result->apellido;
	$especialidad = $result->especialidad;
	$ano = $result->ano;
	$division = $result->division;
	$faltas = $result->faltas;
	$preceptores = $result->preceptores;
	$delegado = $result->delegado;
	$parteDelCentroDeEstudiantes = $result->parteDelCentroDeEstudiantes;

	printData ($tipoUsuario);

}elseif ($tipoUsuario == "Profesor") {
	sqlQuery ("profesores",$_SESSION['documento'],$result);
	$doc = $result->docProfesor;
	$nombre = $result->nombre;
	$apellido = $result->apellido;
	printData ($tipoUsuario);
}


	function printDelegado ($delegado) {
		if ($delegado == 1) {
			return ' - <font class=highlightText size=2>Delegado</font>';
		}
	}

	function printParte ($parteDelCentroDeEstudiantes) {
		if ($parteDelCentroDeEstudiantes == 1) {
			return ' - <font class=highlightText size=2>Parte del CDE</font>';
		}
	}


function printData ($tipoUsuario) {

	global $nombre,$apellido,$doc,$especialidad,$delegado,$parteDelCentroDeEstudiantes,$ano,$division,$faltas,$preceptores;

if ($tipoUsuario == "Alumno") {
	echo "<font class=userCpNombreAlumno size=3>".$nombre." ".$apellido."</font><br>
	<br>
	<font class=highlightText size=2>DNI ".$doc."</font> -
	<font class=highlightText size=2>".$especialidad."</font>
	".printDelegado($delegado)."
	".printParte($parteDelCentroDeEstudiantes)."
	<br>
	<br>
	<table border='0' align='center' style='
		border-spacing: 6px 10px;
	   border-color: #ff634700;
	
	'>
	  <tbody>
	   <tr>
		<th align='right' valign='top' scope='row'>Tipo de cuenta:</th>
		<td  align='left'valign='top'>".$tipoUsuario."</td>
	  </tr>
	   <tr>
		<th align='right' valign='top' scope='row'>Año/Division:</th>
		<td  align='left'valign='top'>".$ano."º - ".$division."º</td>
	  </tr>
		<tr>
		<th align='right' valign='top' scope='row'>Faltas:</th>
		<td align='left' valign='top'>".$faltas."</td>
	  </tr>
	  </tr>
		<tr>
		<th align='right' valign='top' scope='row'>Preceptores:</th>
		<td align='left'valign='top'><div style='text-transform: capitalize;'>".$preceptores."</div></td>
	  </tr>
	
	
	</tbody></table>
	
	<br>
	<br>Si hay algún dato incorrecto, por favor informarlo en Secretaria.
	";
}elseif ($tipoUsuario == "Profesor") {
	echo "<font class=userCpNombreAlumno size=3>".$nombre." ".$apellido."</font><br>
	<br>
	<font class=highlightText size=2>DNI ".$doc."</font> -
	<font class=highlightText size=2>".$tipoUsuario."</font>
	<br>
	<br>
	<table border='0' align='center' style='
		border-spacing: 6px 10px;
	   border-color: #ff634700;
	
	'>
	  <tbody>
	   <tr>
		<th align='right' valign='top' scope='row'>Tipo de cuenta:</th>
		<td  align='left'valign='top'>".$tipoUsuario."</td>
	  </tr>
	
	</tbody></table>
	
	<br>
	<br>Si hay algún dato incorrecto, por favor informarlo en Secretaria.
	";
}
}
?>
