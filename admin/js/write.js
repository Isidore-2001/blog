

window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/


function initForm(){
  
  /**window.setInterval(,500);**/
  
  //sendForm2();
  document.forms.article.addEventListener("submit", sendForm7);
  //document.forms.form_communes.addEventListener("submit", fetchCommune);
}





function sendForm7(ev){ // form event listener
    ev.preventDefault();
    let args = new FormData(this);
    fetchFromJson('services/write.php', {method:'post',body:args})
   .then(makemessagesItems4)
   
   
   
   
  
  }



  function makemessagesItems4(answer){
      
        
    let errorText = document.getElementById('erreur');
    
    console.log(answer.status);
    if (answer.status == "ok"){
      location.href = "posts.php"
      
      }
    else
       {
         
          errorText.innerHTML = answer.message;
        
      }
    
  }