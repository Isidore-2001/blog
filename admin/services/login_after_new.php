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
   
   $password1 = checkString('password1');
   $password = checkString('password');
   if($password1 === NULL || $password === NULL){
       produceError("Saississez tous les champs");
   }

   else if ($password1 !== NULL && $password !== NULL){
     
       if ($password != $password1){
        produceError("Saississez tous les champs correctement");
           
           
       }
       else{
        $res= $data->update_password($_SESSION['ident'], $password );
        $_SESSION['password'] = $password;
        produceResult($res);
       }

       
   }
   


   ?>