<?php 
function reg($pagina,$texto){ 
if ((!empty($pagina)) and (!empty($texto))) {
$ddf = fopen('log/registros.log','a'); 
fwrite($ddf,"[".date("r")."] LOG [$pagina]: $texto\r\n"); 
fclose($ddf); 
}
}
?>