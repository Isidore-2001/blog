<?php 
session_name('synthese_isidore');
session_start();



spl_autoload_register(function ($className) {
    include ("php/{$className}.class.php");
 });
 
set_include_path('..'.PATH_SEPARATOR);
require_once('php/initDataLayer.php');
require_once('php/common_service.php');


 

  require_once('php/fonctions_parms.php');
   // à compléter

   $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
   
    $name = $_POST['name'];
    
    $comment = $_POST['commentaire'];
    
    if($email !==NULL && $name !== NULL && $comment !==NULL){
   $res = $data->insert_comment($email, $name, $comment, $_SESSION['id']);
   produceResult($res);
    }
   



?>