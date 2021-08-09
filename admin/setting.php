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
      <script src="js/fetchUtils.js"> </script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/setting.js"></script>
  <?php 
  include_once("./topbar.php");
  if ($_SESSION['identite'] === NULL){
    header("Location: login.php");
  }

  ?>
<div class="container">
<div class="card-panel">
      <div class="row">
      <div class="row" id='erreur'>
       </div>
<h2>Paramètres</h2>
<div class="row">
        <div class="col m6 s12">
        <h4>Modérateurs</h4>
        <table >
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Validé</th>
                </tr>
                <?php
                set_include_path('..'.PATH_SEPARATOR);
                    spl_autoload_register(function ($className) {
                        include ("php/{$className}.class.php");
                     });
                    
                    
                    require_once('php/initDataLayer.php');
                    $res = $data->get_modo_not_password();
                ?>
                </thead>
                <tbody id="table">
                        
                        <?php foreach($res as $i) { ?>
                        <tr>
                            <td><?php echo $i['nom'] ?></td>
                        <td><?php echo $i['email']?></td>
                        <td><? echo $i['role'] ?></td>
                        <td><i class="material-icons"><?php
                        if ($i['password'] !== NULL){
                        echo "verified_user";
                    }
                        else{
                            echo "schedule";
                        }
                        
                        ?></i></td></tr><?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col m6 s12">
        <form method="post" action ="services/setting.php"  id = "setting">
                <h4>Ajouter un modo</h4>
                <div class="input-field col s12">
                    <input type="text" id="name" name="name"/>
                    <label for="name">Nom</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" id="prenom" name="prenom"/>
                    <label for="name">Prenom</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" id="email" name="email"/>
                    <label for="email">Adresse email</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" id="email1" name="email1"/>
                    <label for="email">Répeté l'email</label>
                </div>
                <center>
                    <button type="submit" class="waves-effect waves-light btn light-blue">
                    <i class="material-icons left">perm_identity</i>
                    Ajouter
                    </button>
                    <br/><br/>
                    

                </center>
                </form>
            </div>

        </div>




</div>
  