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
  include_once("services/getcontent.php");
  


  ?>
<div class="container"><h1>Dernier Post</h1>

<div class="row">
<?php
foreach($res as $i){
?>

<div class="col s12 m6 l6 ">
  
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="images/<?php echo $i['image']?>"> 
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?php echo $i['titre']?><i class="material-icons right">more_vert</i></span>

      <div class="footer">
            <?php echo $i['date'] ?> par <?php echo $i['name'] ?>
          </div>
      <p><a href="post.php?id_post=<?php echo $i['id_post'] ?>" class="waves-effect waves-light btn">Voir l'article</a></p>
      
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?php echo $i['titre']?><i class="material-icons right">close</i></span>
      <p><?php echo substr($i['content'], 0, 1200);?>...</p>
    </div>
  </div>
  </div>
  
  
  
<?php } ?>
</div>
</div>    
 
    </body>
  </html>
