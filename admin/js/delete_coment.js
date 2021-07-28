
window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/


function initForm(){
  
  /**window.setInterval(,500);**/
  
  //sendForm2();
  sendForm2();
  
  

  
  //document.forms.form_communes.addEventListener("submit", fetchCommune);
}

function sendForm3(){


const delete1 = document.getElementsByClassName("delete");
const view1 = document.getElementsByClassName("view");
  
let i = 0;
while (i < delete1.length){

delete1[i].addEventListener("click", sendForm4) 
    
  i++;

  }

  let j = 0;
while (j < view1.length){

view1[j].addEventListener("click", sendForm5) 
    
  j++;

  }
  

}
function modal(){
  $(document).ready(function(){
    $('.modal').modal();
  });}


    function sendForm2(){ // form event listener
      
        fetchFromJson('services/get_comment_admin.php')
       .then(makemessagesItems)
       .then(sendForm3)
       .then(modal)
       
       
      
      }

      
      function sendForm5(ev){ // form event listener
      
        ev.preventDefault();
        fetchFromJson(this.getAttribute('id')) 
       .then(makemessagesItems2)
       sendForm2();
      
      }
    

      function sendForm4(ev) {  // form event listener

        ev.preventDefault();
        
        fetchFromJson(this.getAttribute('id'))
        .then(makemessagesItems2);
        sendForm2();
        
        
          }
    function makemessagesItems(answer){
      
        
        let comment = document.getElementById('table');
        
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
      
        
        console.log(answer.status);
        if (answer.status == "ok"){
          
          }
        else
           {
              
            
          }
        
      }

      
      

     
      

      

      