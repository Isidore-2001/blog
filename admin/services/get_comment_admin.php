<?php 

set_include_path('../..'.PATH_SEPARATOR);
spl_autoload_register(function ($className) {
   include ("php/{$className}.class.php");
});


require_once('php/initDataLayer.php');
require_once('php/common_service.php');

  
  require_once('php/fonctions_parms.php');
   // à compléter
  
   $mes = "";
   $res = $data->get_comment4();
   
   foreach ($res as $i) {
    
   $mes.='
          <tr>
            <td>'.$i['titre'].'</td>
            <td>'.$i['comment'].'</td>
            <td>
            
            <a href="#" id="services/view_comment.php?id='.$i['id_commentaires'].'" class="btn-floating btn-large waves-effect waves-light view green"  ><i class="material-icons">done</i></a>
            <a href="#" id="services/delete_comment.php?id='.$i['id_commentaires'].'" class="btn-floating btn-large waves-effect waves-light delete red"  ><i class="material-icons">delete</i></a>  

            <a  href = "#modal_'.$i['id_commentaires'].'" class="btn-floating btn-large waves-effect waves-light blue modal-trigger"><i class="material-icons">list</i></a>
                <div id="modal_'.$i['id_commentaires'].'" class="modal">
                      <div class="modal-content">
                        <h4>'.$i['titre'].'</h4>
                        <p>'.$i['comment'].'</p>
                        <footer>'.'Ecrit par '.$i['name'].' le '.$i['date'].'</footer>
                      </div>
                      <div class="modal-footer">
                      <a href="#!"  id="services/view_comment.php?id='.$i['id_commentaires'].'" class="btn-floating btn-small waves-effect waves-light view modal-close blue" type="button"><i class="material-icons">done</i></a>
                      <a href="#" id="services/delete_comment.php?id='.$i['id_commentaires'].'" class="btn-floating btn-small waves-effect waves-light delete modal-close red"  ><i class="material-icons">delete</i></a>
                      </div>
                </div>
            </td>
          </tr>
         
        ';
      }
 produceResult($mes);
?>