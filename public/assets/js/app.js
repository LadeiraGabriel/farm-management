import { Menu } from './components/Menu/index.js';
import { Form } from './components/Form/index.js';


if (!document.URL.includes('/login')) {
    const menu = new Menu();
}


const inputPassword = new Form("eye", "password");







const tag = document.querySelectorAll("a");
const getIdFarmerEdit = document.querySelector("#id-farmer");

const getIdCowEdit = document.querySelector("#id-cow");

const formCow = document.querySelector("#form_edit_cow");

const buttonAdd = document.querySelectorAll(".add");
const buttonRemove = document.querySelectorAll(".remove");



    const updateCowsUsers = async (route,token,user_id, cow_id) => {
        const update = await fetch(route,{
            method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'accept': 'application/json'
                    },
                    body: JSON.stringify({
                        _token: token,
                        user_id,
                        cow_id
                    })
                  });

                  let result = await update.json();

                  return {
                    result
                  }

                }
      



        buttonAdd.forEach(button => {
        button.addEventListener("click",async event => {


            const {cow, user, token,route } = event.target.dataset

            

          const response = await  updateCowsUsers(route,token,user, cow);

          console.log(response)



        })
    })


    buttonRemove.forEach(button => {
        button.addEventListener("click",event => {


            console.log("item removido da lista")




        })
    })









//select2
$(document).ready(function() {
    $('.creator').select2({
        theme: "classic",
        width: 'resolve',
        
       
       
    });
    
});


 

$(document).ready(function() {
    $('.edit').select2({
        theme: "classic",
        width: 'resolve',
       
     
       
    });
    
});



   


//data table
$(document).ready(function () {
    $('#datatable').DataTable();
});



