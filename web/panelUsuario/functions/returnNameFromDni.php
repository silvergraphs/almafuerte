<?php

//-------------------->
// almafuerte.edu.net
// Funcion de retornar Nombre y Apellido recibiendo DNI
//------------------->

// No completada********
include "../../conexion.php";

function returnProfesorNameFromDNI ($tipoUsuario,$dni) {
  $sql = "SELECT nombre,apellido FROM `$tipoUsuario` WHERE dni='$dni'";
          $rec = mysql_query($sql);
          $count = 0;
          while($row = mysql_fetch_object($rec))
          {
              $count++;
              $result = $row;
          }
          return $result;
}



?>
