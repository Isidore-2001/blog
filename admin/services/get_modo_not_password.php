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
   
   $email = checkString('email');
   $password = checkString('password');
   if($email === NULL && $password === NULL){
       produceError("Saississez tous les champs");
   }

   else{
     $result = $data->get_modo($email);
       if ($password === $result['token'] && $email === $result['email']){
           $_SESSION['ident'] = $email;
           produceResult($_SESSION['ident']);
           
       }

       else{
        produceError("le mot de passe ou l'email est incorrect");
       }
   }
   


   ?>