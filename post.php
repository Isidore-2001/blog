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
  include_once("services/getposts_id.php")
  ?>




    <div class="parallax-container">
        <div class="parallax"><img src="images/<?php echo $res['image'] ?>"></div>
    </div>


        <div class="card-content black-text">
                    <h5><span class="card-title"><?php echo $res['titre']?></span></h5>
        </div>
      
      
    
    <div class="card-reveal">
      
      <p><?php echo  $res['content']?></p>
    </div>


  
  
  
  
  

  
 
    </body>
  </html>
