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
   if($email === NULL || $password === NULL){
       produceError('<div class="card red">
       <div class="card-content white-text">
       Saississez tous les champs
       </div>
   </div>');
   }

   else if ($email!== NULL && $password !== NULL){
     
       
        $res= $data->get_modo($email);
        if ($res === NULL){
            produceError('<div class="card red">
            <div class="card-content white-text">
            Votre identifiant ne correspond à aucun compter existant
            </div>
        </div>');
        }
        else if ($res['email'] === $email && $res['password'] === $password){
            $_SESSION['identite'] = $email;
            $_SESSION['nom'] = $res['nom'];
            produceResult($_SESSION['identite']);
        }
        else{
            produceError('<div class="card red">
            <div class="card-content white-text">
            Votre identifiant ou mot de passe est incorrect
            </div>
        </div>');
        }
        
       
   }
   


   ?>