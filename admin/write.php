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
      <script type="text/javascript" src="js/write.js"></script>

  <?php 
  include_once("./topbar.php");
  


  if($_SESSION['identite'] === NULL){
        header("Location: login.php");
      }
      
  ?>

    
<div class="container">
<div class="row" id='erreur'>
       </div>
<h4>Postez un article</h4>
<div class="row">

<div class="col s12">

<form action ="services/write.php" method= "post" id="article" enctype="multipart/form-data">
<h5>Titre de l'article</h5>
<div class="row">
        <div class="input-field col s12">
                
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="icon_prefix2" class="materialize-textarea" name ="titre"></textarea>
                <label for="icon_prefix2">Titre de l'article</label>
        </div>
</div>
<div class="row">
            <h5>L'article</h5>
            <br/>
            <div class="col s12"></div>
            <div class="input-field col s12">
                    
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="post"></textarea>
                    <label for="icon_prefix2">Contenu de l'article</label>
            </div>
</div>

<br/>
<div class="row">
<div class="col s12"></div>
            <div class="file-field input-field">
                <div class="btn">
                    <span><input type="file" name="image" ><i class="material-icons">file_upload</i></span>
                    
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
            </div>


</div>

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
</div>

  <div class="col offset-s6"> 
        <button type="submit" class="btn">modifier</button>
  </div>



</form>

</div>
</div>
