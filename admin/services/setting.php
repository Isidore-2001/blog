<?php 

set_include_path('../..'.PATH_SEPARATOR);
spl_autoload_register(function ($className) {
   include ("php/{$className}.class.php");
});


require_once('php/initDataLayer.php');
require_once('php/common_service.php');

  
  require_once('php/fonctions_parms.php');
   // à compléter
   
   $nom = checkString('name');
   $prenom = checkString('prenom');
   $email = checkString('email');
   $email_2 = checkString('email1');
   if ($nom === NULL && $prenom === NULL && 
   $email === NULL && $email_2 === NULL){
      produceError('<div class="card red">
       <div class="card-content white-text">
       Saississez tous les champs
       </div>
   </div>');
   }
   else{
      if($email === $email_2){
      $token = $data->token();
      $result = $data->add_modo($email, $nom , $prenom, $token);
      
      $to  = $email; // notez la virgule

     // Sujet
     $subject = 'Identifiants de connexion';

     // message
     $message = '
     <html>
      <head>
       <title>Identifiants de connexion</title>
      </head>
      <body>
       <p>Voici les identifiants de connexion</p>
       <table>
        <tr>
         <th>Identifiants</th>
         <th>Mot de passe :</th>
         
        </tr>
        <tr>
         <td>'.$to.'</td>
         <td>'.$token.'</td>
        </tr>
        
       </table>
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
     $headers[] = 'To: '.$nom.'<'.$email.'>';
     $headers[] = 'From: Isidore <amevigbe41@example.com>';
     

     // Envoi
     mail($to, $subject, $message, implode("\r\n", $headers));
      produceResult($result);
      }
      else{

         produceError('<div class="card red">
       <div class="card-content white-text">
       Le second Email ne correspond pas
       </div>
   </div>');
      }
   }
   
?>