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
      <script type="text/javascript" src="js/materialize.js"></script>
  <?php 
  include_once("./topbar.php");
  

  ?>

    

<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
      
      <div class="card-panel">
      <div class="row">
      <div class="col s6 offset-s3">
            <img src="image/images.png" alt="Administrateur" width="100%"/>
            <h4 class="center-align">Choisir un Mot de Passe</h4>
            
      </div>
      
    
   
   <form method="post" action="services/login_after_new.php">
        <div class="input-field col s12">
            <input type="password" id="password" name="password"/>
            <label for="password">Mot de passe</label>
          </div>
          <div class="input-field col s12">
              <input type="password" id="password1" name="password1"/>
              <label for="password">Répété le Mot de passe</label>
          </div>
          <center>
              <button type="submit" class="waves-effect waves-light btn light-blue">
              <i class="material-icons left">perm_identity</i>
              Se connecter
              </button>
              

          </center>
   </form>
  
  </div>

</div>
</div>

</body>
  </html>