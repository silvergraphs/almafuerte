<?php

// almafuerte.edu.net


include "../../conexion.php";
include "../../variables.php";

function sqlQuery($tabla,$documento,&$result)
    {
    if (!$tabla or !isset ($tabla)) {
      break;
    }

		if ($tabla == "alumnos") {
			$doc = "docAlumno";
		}

    if ($tabla == "directivo") {
      $doc = "docDirectivo";
    }

    if ($tabla == "profesores") {
      $doc = "docProfesor";
    }

    if ($tabla == "usuario") {
			$doc = "documento";
		}
        $sql = "SELECT * FROM $tabla WHERE $doc = '$documento'";
        $rec = mysql_query($sql);
        $count = 0;
        while($row = mysql_fetch_object($rec))
        {
            $count++;
            $result = $row;
        }
    }


 ?>
