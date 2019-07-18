<?php
////////////////////////
// almafuerte.edu.net
///////////////////////

include "../conexion.php";
include "../variables.php";
include '../../variables.php'; // Required vars
require "functions/sqlQuery.php"; // Required function to obtain user data
require "functions/permisosArchivos.php"; // Required function to obtain user permissions

$tipoUsuario = $_SESSION['tipoUsuario'];

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


}elseif ($tipoUsuario == "Profesor") {
	sqlQuery ("profesores",$_SESSION['documento'],$result);
	$doc = $result->docProfesor;
	$nombre = $result->nombre;
	$apellido = $result->apellido;
}

	$anoRecib = ($_GET['ano']);
	$divisionRecib = ($_GET['division']);

/////////////////
// Functions
////////////////

function cargarCurso () {
	if ($anoRecib and !$divisionRecib) {
		$ano = $anoRecib;
		$division = $divisionRecib;
	}
}

function printControles ($tipoControl) {
	if ($tipoControl == "Subir") {
	global $tipoUsuario;
	if (puedeSubirArchivos($tipoUsuario)) {
		return "<br>
		<br /><a href=".$url."".$usuario."?control=subirMat><button class='button button-rounded button-flat-primary'>Subir nuevo material</button></a>&nbsp;&nbsp;";
	}
}

if ($tipoControl == "Eliminar") {
	global $tipoUsuario;
	if (puedeModificarArchivos($tipoUsuario)) {
		return "<button class='button button-rounded button-flat-primary' type=submit>Eliminar material</button>";
	}
	}
}

function printMateriales () {
	global $ano,$division,$especialidad,$tipoUsuario,$nombre,$apellido;

	if ($tipoUsuario == "Alumno") {
	return "para ".$ano."º ".$division."º - <font style='text-transform: capitalize;'>".$especialidad."</font>";
}

	if ($tipoUsuario == "Profesor") {
		return "subidos por <font style='text-transform: capitalize;'>".$nombre." ".$apellido."</font>";
	}

}

function getMaterialesUser() {
	global $con,$ano,$division,$especialidad,$tipoUsuario,$nombre,$apellido;

	if ($tipoUsuario == "Alumno") {
		$query = mysqli_query($con,"SELECT archivo,materias_nombre,tema,fechaSubida,subidoPor FROM recursos WHERE ano='$ano' and division='$division'"); 
		return $query;
	}

	if ($tipoUsuario == "Profesor") {
		$query = mysqli_query($con,"SELECT archivo,materias_nombre,tema,fechaSubida,ano,division,subidoPor FROM recursos WHERE subidoPor='$nombre $apellido'"); 
		return $query;
	}

}

/////////////////
// Front-end
////////////////

$result = getMaterialesUser();

	echo "
Mostrando materiales ".printMateriales()."<br>
<br>";


if ($tipoUsuario == "Alumno") {
	if ($row = mysqli_fetch_array($result)){ 
		echo "<table class='tablaResp' border='1' align='center' cellspacing='5' cellpadding='10'>  \n"; 
		   echo "<tr class='tablaRespTr'><td class='tablaRespTd'>Materia</td><td class='tablaRespTd'>Tema</td><td class='tablaRespTd'>Subido</td><td class='tablaRespTd'>Material</td></tr> \n"; 
		   do { 
			echo "<form method=POST action='".$urlDescargas."'>";
			  echo "<tr class='tablaRespTr'><td style='text-transform:capitalize;'>".$row["materias_nombre"]."</td><td class='tablaRespTd'>".$row["tema"]."</td><td class='tablaRespTd'>Por ".$row["subidoPor"]." el ".$row["fechaSubida"]."</td><td class='tablaRespTd'><input type='hidden' name='materia' value='".$row["materias_nombre"]."'><input type='hidden' name='ano' value='".$ano."'><input type='hidden' name='division' value='".$division."'><button class='button button-rounded button-flat-primary' name='archivo' value='".$row["archivo"]."' type=submit>Descargar</button></input></td></tr> \n";
			  echo "</form>"; 
		   } while ($row = mysqli_fetch_array($result)); 
			 echo "</table>"; 
			 
			} else {
				echo "<br><div align=center>No se encontraron materiales subidos.</div>";
			}
			echo printControles('Subir').printControles('Eliminar');
}elseif ($tipoUsuario == "Profesor") {
	if ($row = mysqli_fetch_array($result)){ 
		echo "<table class='tablaResp' border='1' align='center' cellspacing='5' cellpadding='10'>  \n"; 
		   echo "<tr class='tablaRespTr'><td class='tablaRespTd'>Materia</td><td class='tablaRespTd'>Tema</td><td class='tablaRespTd'>Curso</td><td class='tablaRespTd'>Subido</td><td class='tablaRespTd'>Opciones</td></tr> \n"; 
		   do { 
			echo "<form method=POST action='".$urlDescargas."'>";
			  echo "<tr class='tablaRespTr'><td style='text-transform:capitalize;'>".$row["materias_nombre"]."</td><td class='tablaRespTd'>".$row["tema"]."</td><td class='tablaRespTd'>".$row["ano"]."º ".$row["division"]."º</td><td class='tablaRespTd'>".$row["fechaSubida"]."</td><td class='tablaRespTd'><input type='hidden' name='ano' value='".$row["ano"]."'><input type='hidden' name='division' value='".$row["division"]."'><input type='hidden' name='materia' value='".$row["materias_nombre"]."'><button class='button button-rounded button-flat-primary' name='archivo' value='".$row["archivo"]."' type=submit>Descargar</button></input></form>  <form method=POST action='".$usuario."?control=eliminarMat' style='display: unset'><input type='hidden' name='tema' value='".$row["tema"]."'><input type='hidden' name='materia' value='".$row["materias_nombre"]."'><input type='hidden' name='ano' value='".$row["ano"]."'><input type='hidden' name='division' value='".$row["division"]."'><button class='button button-rounded button-flat-primary' name='archivo' value='".$row["archivo"]."' type=submit>Eliminar</button></td></tr></form> \n";
		   } while ($row = mysqli_fetch_array($result)); 
			 echo "</table>"; 
			 
			} else {
				echo "<br><div align=center>No se encontraron materiales subidos.</div>";
			}
			echo printControles('Subir')/*.printControles('Eliminar')*/;
}
	
	
	?>

