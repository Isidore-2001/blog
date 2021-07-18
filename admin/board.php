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
  include_once("services/board.php")

  ?>
  <div class="container">
  <h4>Tableau de Bord</h4>
  <div class="row">
    <div class="col l4 m6 s12">
          <div class="card">
                  <div class="card-content green white-text">
                          <span class="card-title">Publications</span>
                                          
                          <h4><?php echo $res["count"] ?></h4>
                          </div>
                  </div>
          </div>
    <?php include_once("services/get_comment3.php") ?>
          <div class="col l4 m6 s12">
              <div class="card">
                      <div class="card-content blue white-text">
                          <span class="card-title">Commentaires</span>
                                          
                          <h4><?php echo $res["count"] ?></h4>
                      </div>
              </div>
          </div>
    <?php include_once("services/get_admin.php") ?>
    <div class="col l4 m6 s12">
              <div class="card">
                      <div class="card-content red white-text">
                          <span class="card-title">Adminstrateur</span>
                                          
                          <h4><?php echo $res["count"] ?></h4>
                      </div>
              </div>
          </div>
    </div>
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

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>
            
            <a href="" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">done</i></a>
            <a href="" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>
            <a href="" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">list</i></a>
            </td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td><a href="" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">done</i></a>
            <a href="" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>
            <a href="" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">list</i></a></td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td><a href="" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">done</i></a>
            <a href="" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>
            <a href="" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">list</i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
    </div>
    </body>
  </html>
