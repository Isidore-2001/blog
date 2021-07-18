<?php 
session_name('synthese_isidore');
session_start();

spl_autoload_register(function ($className) {
    include ("php/{$className}.class.php");
 });

set_include_path('..'.PATH_SEPARATOR);
require_once('php/initDataLayer.php');

 
try {
  
  require_once('php/fonctions_parms.php');
   // à compléter

   $result = intval($_GET['id_post']);
   $res = $data->getposts_id($result);
   $_SESSION['id'] = $result;
}

   catch(PDOException $e){
       echo $e;
   }

?>