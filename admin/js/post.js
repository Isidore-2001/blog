

window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/


function initForm(){
  
  /**window.setInterval(,500);**/
  
  //sendForm2();
  document.forms.post.addEventListener("submit", sendForm8);
  //document.forms.form_communes.addEventListener("submit", fetchCommune);
}





function sendForm8(ev){ // form event listener
    ev.preventDefault();
    let args = new FormData(this);
    fetchFromJson('services/post.php', {method:'post',body:args})
   .then(makemessagesItems5)
   
   
   
   
  
  }



  function makemessagesItems5(answer){
      
        
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