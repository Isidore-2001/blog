<?php

session_name('synthese_isidore');
session_start();
set_include_path('../..'.PATH_SEPARATOR);
spl_autoload_register(function ($className) {
   include ("php/{$className}.class.php");
});


require_once('php/initDataLayer.php');
session_destroy();
header("Location: ../login.php");

  
  
   


   ?>