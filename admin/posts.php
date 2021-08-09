<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <!--JavaScript at end of body for optimized loading-->
      <script src="js/fetchUtils.js"> </script>
      <script src="js/delete.js"> </script>
      <script type="text/javascript" src="js/materialize.js"></script>
  <?php 

session_name('synthese_isidore');
session_start();
  include_once("./topbar.php");

  
  
 
  
  
  include_once("services/board.php");
  

  if($_SESSION['identite'] === NULL){
    header("Location: login.php");
  }
  
  ?>
  <div class="container">
<h2>Blog</h2>
</div>
<?php 
include_once("services/get_posts.php") ;

?>
<?php
foreach($res as $i){
  
?>
<div class="container">
<div class="row">

            <div class="col s12 m12 l12">
              
                <div class="card-content black-text">
                  <h5><span class="card-title"><?php 
                  echo $i['titre']; ?>      
                    <i class="material-icons"><?php 
                    
                    if($i['posted'] === "0"){
                      
                    echo "lock";
                }
                  ?></i>
                  </span></h5>
                </div>
                
                  <div class="row">
                  
                          <div class="col s12 m6 l8">
                              <p class="fow-text">
                                  <?php echo substr($i['content'], 0, 1200);?>...
                          
                              </p>
                          </div>
                    
                      <div class="col s12 m6 l4">
                      
                        <img class="circle materialboxed" width="450" src="../images/<?php echo $i['image']?>"> 
                        <script>
                        $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
                        </script>
                        <a href="post.php?id_post=<?php echo $i['id_post'] ?>" class="waves-effect waves-light btn">Voir l'article</a>
                        <button id="services/delete.php?id_post=<?php echo $i['id_post'] ?>" class="btn-floating btn-large waves-effect waves-light delete"><i class="material-icons">delete</i></button>
                      
                      </div>
                  </div>
                  
             </div>
  </div>

      
      </div>
    
    
  
  
<?php } ?>


</body>
  </html>
