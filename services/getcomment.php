<?php 
session_name('synthese_isidore');
session_start();

spl_autoload_register(function ($className) {
    include ("php/{$className}.class.php");
 });

set_include_path('..'.PATH_SEPARATOR);
require_once('php/initDataLayer.php');
require_once('php/common_service.php');

 
try {
  
  require_once('php/fonctions_parms.php');
   // à compléter

   $mes = "";
   $res = $data->get_comment2(intval($_SESSION['id']));
   
   if ($res !== NULL){
      
      foreach ($res as $k){
      $mes.="
      <strong>".$k['name']."(".$k['date'].")"."</strong>
      <p>".$k['comment']."</p>
      ";
      
   }
}
else{
   $mes.="Soyez les premiers à commenter";
}
   produceResult($mes);


}

   catch(PDOException $e){
       echo $e;
   }

?>