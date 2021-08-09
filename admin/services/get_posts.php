<?php 
set_include_path('..'.PATH_SEPARATOR);

spl_autoload_register(function ($className) {
    include ("php/{$className}.class.php");
 });


require_once('php/initDataLayer.php');

 
try {
  
  require_once('php/fonctions_parms.php');
   // à compléter

   
   $res = $data->getposts_admin();
   
}

   catch(PDOException $e){
        $e->getMessage();
   }

?>