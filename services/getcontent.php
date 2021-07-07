<?php 


spl_autoload_register(function ($className) {
    include ("php/{$className}.class.php");
 });
session_name('synthese_isidore');
session_start();
set_include_path('..'.PATH_SEPARATOR);
require_once('php/initDataLayer.php');

 
try {
  
  require_once('php/fonctions_parms.php');
   // à compléter

   
   $res = $data->getcontent();

}

   catch(PDOException $e){
       echo $e;
   }

?>