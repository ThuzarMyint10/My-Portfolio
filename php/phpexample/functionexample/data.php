<?php
 ini_set('display_errors', 'Off');
 function exception_error_handler($severity, $file, $line){
     throw new Exaception($message, 0, $severity, $file, $line);
 }
 set_error_handler("exception_error_handler");
 try {
     strops();
 } catch (Exception $e) {
     echo "Error!". $e->getMessage();
 }
 echo "End of File";
?>