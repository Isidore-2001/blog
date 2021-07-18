
<div class="container">
        <div class="parallax-container">
                <div class="parallax"><img class="materialboxed" src="images/<?php echo $res['image'] ?>"></div>
            </div>


            <div class="card-content black-text">
                <h2><span class="card-title"><?php echo $res['titre']?></span></h2>
            </div>
              
              
            
            <div class="card-reveal">
              
              <p><?php echo  $res['content']?></p>
            </div>


            
    <h3>commentaires</h3>
    <?php
    
    spl_autoload_register(function ($className) {
      include ("php/{$className}.class.php");
   });
  
  set_include_path('..'.PATH_SEPARATOR);
  require_once('php/initDataLayer.php');
  $res = $data->get_comment(intval($_GET['id_post']));
  
    
?>

    <blockquote id="commentaire">
    
              <?php if (!$res){
                echo "Soyez le premier à commenter";
              }
              else{
 
              foreach($res as $i) {?>
              <strong id="name"><?php echo $i['name']?>(<?php echo $i['date'] ?>)<strong>
              <p  id="comment"><?php echo $i['comment']?></p>
              <?php } }?>
    </blockquote>
     
            </div>   
    <script>
   
$(document).ready(function(){
    $('.parallax').parallax();
  });
  $('#textarea1').val('New Text');
  M.textareaAutoResize($('#textarea1'));
    </script>
    <div class="container">
<h3>commenter : </h3>

<script src="js/comment.js"> </script>
<div class="row">
    <form id = "formulaire" class="col s12" method="post" action="">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="name" >
          <label for="first_name">First Name</label>
        </div>
        
      </div>
      
      
    
      <div class="row">
        <div class="input-field col s12">
           <i class="material-icons prefix">contact_mail</i>
          <input id="email" name = "email" type="email" class="validate">
          <label for="email">Email</label>
          
        </div>
      </div>

      
    
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea" name="commentaire"></textarea>
          <label for="icon_prefix2">Commentaire</label>
        </div>
      
  </div>
  <button class="btn waves-effect waves-light" type="submit">Commenter
    <i class="material-icons right">send</i>
  </button>
      

    </form>
    
      <style>
      * label color */
   .input-field label {
     color: #000;
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: #000;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* valid color */
   .input-field input[type=text].valid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* invalid color */
   .input-field input[type=text].invalid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* icon prefix focus color */
   .input-field .prefix.active {
     color: #000;
   }
      </style>

  
  </div>
        
  </div>


