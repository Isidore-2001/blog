


window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/


function initForm(){
  
  /**window.setInterval(,500);**/
  
  //sendForm2();
  const delete1 = document.getElementsByClassName("delete");
  
let i = 0;
while (i < delete1.length){

delete1[i].addEventListener("click", sendForm9) 
    
  i++;

  }
}





function sendForm9(ev){ // form event listener
    ev.preventDefault();
    
    fetchFromJson(this.getAttribute('id'))
   .then(makemessagesItems6)
   
   
   
   
  
  }



  function makemessagesItems6(answer){
      
        
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