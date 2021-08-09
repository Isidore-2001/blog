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
   
   $titre = checkString('titre');
   $article = checkString('post');
   $image = $_FILES['image'];

   $email = $_SESSION['identite'];
   $nom = $_SESSION['nom'];
   $post = intval(checkString('poste'));
   
   
   if (isset($titre) && isset($article) && isset($image) && isset($email) && isset($nom) && $image['size'] < 250000){
    
    $img_name = $image['name'];
    $img_type = $image['type'];
   
    $tmp_name = $image['tmp_name'];
    
    $img_explode = explode('.',$img_name);
    $img_ext = end($img_explode);
    
    
    $extensions = ["jpeg", "png", "jpg"];
   if(in_array($img_ext, $extensions) === true ){
         
        $types = ["image/jpeg", "image/jpg", "image/png"];
        
    if( in_array($img_type, $types) === true ){
            $time = time();
            $new_img_name = $time.$img_name;
    if( move_uploaded_file($tmp_name, "../../images/".$new_img_name)){
        $result = $data->insert_post($titre, $post, $new_img_name, $nom, $email, $article);
        if (!$result){
            produceError($result);
        }
        else{
            produceResult($result);
        }
    }


}
   }

   }

else{

    produceError('<div class="card red">
    <div class="card-content white-text">
    Saississez tous les champs et que la taille de l\'image
    soit inférieur à 250000 octets
    </div>
</div>');
}
   
   


