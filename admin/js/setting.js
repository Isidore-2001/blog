


window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/


function initForm(){
  
  /**window.setInterval(,500);**/
  
  //sendForm2();
  document.forms.setting.addEventListener("submit", sendForm6);
  //document.forms.form_communes.addEventListener("submit", fetchCommune);
}





function sendForm6(ev){ // form event listener
    ev.preventDefault();
    let args = new FormData(this);
    fetchFromJson('services/setting.php', {method:'post',body:args})
   .then(makemessagesItems3)
   
   
   
   
  
  }



  function makemessagesItems3(answer){
      
        
    let errorText = document.getElementById('erreur');
    
    console.log(answer.status);
    if (answer.status == "ok"){
      location.href = "setting.php"
      
      }
    else
       {
         
          errorText.innerHTML = answer.message;
        
      }
    
  }