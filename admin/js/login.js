window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/


function initForm(){
  
  /**window.setInterval(,500);**/
  
  //sendForm2();
  document.forms.login.addEventListener("submit", sendForm2);
  
  

  
  //document.forms.form_communes.addEventListener("submit", fetchCommune);
}




    function sendForm2(ev){ // form event listener
        ev.preventDefault();
        let args= new FormData(this);
        fetchFromJson('services/login.php',{method:'post',body:args})
       .then(makemessagesItems)
       
      
      }

      
      
    function makemessagesItems(answer){
      
        
        let errorText = document.getElementById('erreur');
        
        console.log(answer.status);
        if (answer.status == "ok"){
          
          location.href = "board.php"
          }
        else
           {
              
              errorText.innerHTML = answer.message;
            
          }
        
      }

      
        
      

      