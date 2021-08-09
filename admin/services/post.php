<?php 
session_name('synthese_isidore');
session_start();

set_include_path('../..'.PATH_SEPARATOR);
spl_autoload_register(function ($className) {
   include ("php/{$className}.class.php");
});


require_once('php/initDataLayer.php');
require_once('php/common_service.php');

  
  require_once('php/fonctions_parms.php');
   // à compléter
    $id =  $_SESSION['id'];

    
    $titre = $_POST['titre'];
    
    $post = $_POST['post'];
    
    $posted = intval($_POST['poste']);
   
   
   
   $res = $data->update_content($id, $post, $titre, $posted);

  produceResult($res);
?>