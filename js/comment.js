
window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/

function initForm(){
  
  /**window.setInterval(,500);**/
  sendForm2();
  document.forms.formulaire.addEventListener("submit", sendForm1);
  

  
  //document.forms.form_communes.addEventListener("submit", fetchCommune);
  
  

}

function sendForm1(ev){ // form event listener
    
  ev.preventDefault();
  let args= new FormData(this);
  fetchFromJson('services/insertcomment.php',{method:'post',body:args})
  .then(makemessagesItems2);
  
    
    }


    function sendForm2(){ // form event listener
      
        
        fetchFromJson('services/getcomment.php') 
       .then(makemessagesItems);
      
      
      }
    


    function makemessagesItems(answer){
      
        
        let comment = document.getElementById('commentaire');
        
        console.log(answer.status);
        if (answer.status == "ok"){
          
          comment.innerHTML =  answer.result;
          }
        else
           {
              errorText.style.display = "block";
              errorText.textContent = answer.message;
            
          }
        
      }

      function makemessagesItems2(answer){
      
        let name = document.getElementById('first_name');
        let comment = document.getElementById('email');
        let commentaire = document.getElementById('icon_prefix2');
        console.log(answer.status);
        if (answer.status == "ok"){
          name.value = "";
          comment.value = "";
          commentaire.value = "";
          sendForm2();
          }
        else
           {
              
            
          }
        
      }

      
      

     
      

      

      