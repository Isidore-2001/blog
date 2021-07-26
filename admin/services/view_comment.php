<?php 


set_include_path('../..'.PATH_SEPARATOR);


spl_autoload_register(function ($className) {
    include ("php/{$className}.class.php");
 });


require_once('php/initDataLayer.php');
require_once('php/common_service.php');


 
  
  require_once('php/fonctions_parms.php');
   // à compléter
    $id = $_GET['id'];
   $mes = "";
   $res = $data->view_comment($id);

  produceResult($res);
?>