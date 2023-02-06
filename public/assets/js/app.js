import { Menu } from './components/Menu/index.js';
import { Form } from './components/Form/index.js';


    if(!document.URL.includes('/login')){
        const menu = new Menu();
    }
    
  
    const inputPassword = new Form("eye","password");

     
    
     

     

        const tag = document.querySelectorAll("a");
        const getIdFarmerEdit = document.querySelector("#id-farmer") ;

        const getIdCowEdit = document.querySelector("#id-cow") ;
        
   
        tag.forEach(element => {
           
   
           element.addEventListener("click",()=>{
            if(getIdFarmerEdit){
                getIdFarmerEdit.value = element.dataset.idFarmer
               console.log( getIdFarmerEdit.value)
            }
               
            if(getIdCowEdit){
                getIdCowEdit.value = element.dataset.idCow;
                console.log( getIdCowEdit.value);
            }
             

           })
   
   
        });
     

    