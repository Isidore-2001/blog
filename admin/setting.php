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
  include_once("./topbar.php");
  

  ?>
<div class="container">

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
                </thead>
                <tbody id="table">
                        <td>AMEVIGBE Yao Isidore</td>
                        <td>amevigbe41@gmail.com</td>
                        <td>admin</td>
                        <td><i class="material-icons">verified_user</i></td>
                </tbody>
            </table>
        </div>
        <div class="col m6 s12">
        <form method="post">
                <h4>Ajouter un modo</h4>
                <div class="input-field col s12">
                    <input type="email" id="name" name="name"/>
                    <label for="name">Nom</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" id="prenom" name="prenom"/>
                    <label for="name">Prenom</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" id="email" name="email"/>
                    <label for="email">Adresse email</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" id="email" name="email"/>
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
  