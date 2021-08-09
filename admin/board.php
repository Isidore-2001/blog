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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      
      
  <?php 
  session_name('synthese_isidore');
  session_start();
  
  
  

  if ($_SESSION['identite'] === NULL){
    header("Location: login.php");
  }
  

  include_once("./topbar.php");
  include_once("services/board.php");
  ?>


  <div class="container">
  <h4>Tableau de Bord</h4>
  <div class="row">
    <div class="col l4 m6 s12">
          <div class="card">
                  <div class="card-content green white-text">
                          <span class="card-title">Publications</span>
                                          
                          <h4><?php echo $res['count(id_post)'] ?></h4>
                          </div>
                  </div>
          </div>
    <?php include_once("services/get_comment3.php") ?>
          <div class="col l4 m6 s12">
              <div class="card">
                      <div class="card-content blue white-text">
                          <span class="card-title">Commentaires</span>
                                          
                          <h4><?php echo $res["count(id_commentaires)"] ?></h4>
                      </div>
              </div>
          </div>
    <?php include_once("services/get_admin.php") ?>
    <div class="col l4 m6 s12">
              <div class="card">
                      <div class="card-content red white-text">
                          <span class="card-title">Adminstrateur</span>
                                          
                          <h4><?php echo $res["count(id_admin)"] ?></h4>
                      </div>
              </div>
          </div>
    </div>
    <?php spl_autoload_register(function ($className) {
    include ("php/{$className}.class.php");
 });

set_include_path('..'.PATH_SEPARATOR);
require_once('php/initDataLayer.php');


 
  
  require_once('php/fonctions_parms.php');
   // à compléter

   $mes = "";
   $res = $data->get_comment4();
   
  ?>

    <h5>Commentaires non lu </h5>
    <div class="row">
    <div class="col s12">
    <table >
        <thead>
          <tr>
              <th>Article</th>
              <th>Commentaire</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody id="table">
        
      
        
        </tbody>
      </table>
    </div>
    </div>
    <script src="js/fetchUtils.js"> </script>
    <script type="text/javascript" src="js/delete_coment.js"></script>
    
     
    </div>
    </body>
  </html>
