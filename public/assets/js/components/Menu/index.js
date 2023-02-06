


 class Menu{

   
    sideBar = document.querySelector('#side--bar')
    buttonTogle = document.querySelector('#button-togle')
  //  navMain = document.querySelector('.side--bar--nav--main--block')

    constructor(){

       this.moveManu()
    }



    getButtonTogle(){
        return this.buttonTogle;
    }


    moveManu(){
      
          window.addEventListener('click',(event)=> {
          if(!this.sideBar.className.includes("togle--side") && event.target.tagName == 'HTML'  ){
            this.sideBar.classList.toggle("togle--side")
           }else if(event.target.id == 'button-togle'){
            this.sideBar.classList.toggle("togle--side")
           }   
        
      })  
         }
   


}

export { Menu }

