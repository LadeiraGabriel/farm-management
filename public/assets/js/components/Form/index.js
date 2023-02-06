

class Form{

    eye;
    input;
    constructor(component,selector){
        this.eye = document.querySelectorAll(`.${component}`)
        this.input = document.querySelector(`#${selector}`); 
        this.togleMoveEye();
    }


     handleInputType(){

        console.log(this.input)

           if(this.input.type == "password"){
              this.input.type = 'text'
           }else{
              this.input.type = 'password'
           }
       }
     
        togleMoveEye(){

        this.eye.forEach(elemet => {
         elemet.addEventListener("click",(event) => {

            
            this.handleInputType();

            if(event.target.src == "http://127.0.0.1:8000/assets/images/eye_no_visibility.png"){
                event.target.src = "http://127.0.0.1:8000/assets/images/eye_visibility.png"
                 
             }else{
                event.target.src = "http://127.0.0.1:8000/assets/images/eye_no_visibility.png"
             }
        })
        })
     
    
      


       }    



}


export {Form};