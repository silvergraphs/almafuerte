<?php
// ------------------
// almafuerte.edu.net
// ------------------

$arrayPublicidades = array(
      'Publicidad 1' => 'images/publicidad/Publicidad1.png',
      'Publicidad 2' => 'images/publicidad/Publicidad2.png',
      'Publicidad 3' => 'images/publicidad/Publicidad3.png',
  );

  shuffle ($arrayPublicidades);

  foreach($arrayPublicidades as $nombrePublicidad=>$urlPublicidad)
    	{
        echo "<img src='".$urlPublicidad."' style='padding-top:7px;max-width:100%;width:auto;height:auto;'></img>";
        break;
    	}
?>
