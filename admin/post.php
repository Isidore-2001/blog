<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <!--JavaScript at end of body for optimized loading-->
      <script src="js/fetchUtils.js"> </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/post.js"></script>

  <?php 
  include_once("./topbar.php");
  session_name('synthese_isidore');
  session_start();
  
  if($_SESSION['identite'] === NULL){
    header("Location: login.php");
  }
  include_once("../services/getposts_id.php");
  

  ?>

<div class="container">
<div class="row" id='erreur'>
       </div>
            

<div class="parallax-container">
    <div class="parallax"><img class="materialboxed" src="../images/<?php echo $res['image'] ?>"></div>
</div>

<div class="col s12">

<form action ="services/post.php" method= "post" enctype="multipart/form-data" id="post">
<h5>Titre de l'article</h5>
<div class="row">
        <div class="input-field col s12">
                
                <i class="material-icons prefix">mode_edit</i>
                
                <textarea id="icon_prefix2" class="materialize-textarea" name ="titre"><?php echo $res['titre'] ?></textarea>
                <label for="icon_prefix2">Titre de l'article</label>
        </div>
</div>
<div class="row">
            <h5>L'article</h5>
            <br/>
            <div class="col s12"></div>
            <div class="input-field col s12">
                    
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="post"><?php echo $res['content'] ?></textarea>
                    <label for="icon_prefix2">Contenu de l'article</label>
            </div>
</div>

<br/>


Public
<br/><br/>
<div class="row">
        <div class="col m6 s6">
                <div class="switch">
                    <label>
                    Non
                    <input type="checkbox" value="1" name="poste">
                    <span class="lever"></span>
                    Oui
                    </label>
                </div>
        </div>
        <div class="col offset-s6"> 
        <button type="submit" class="btn">modifier</button>
  </div>
</div>

  

  <script>
   
   $(document).ready(function(){
       $('.parallax').parallax();
     });
     $('#textarea1').val('New Text');
     M.textareaAutoResize($('#textarea1'));
       </script>

</form>

</div>
