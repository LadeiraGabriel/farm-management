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

const buttonSelector = document.querySelectorAll(".selector");


const removeCow = document.querySelectorAll(".remove");


const addCow = document.querySelectorAll(".add");

const bodyTable = document.querySelector(".b-table");

const itemCard = document.querySelectorAll(".parent-card");


const updateCowsUsers = async (route, token, user_id, cow_id) => {
    const update = await fetch(route, {
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




buttonSelector.forEach(button => {
    button.addEventListener("click", async event => {


        const { cow, user, token, routeRemove, routeAdd } = event.target.dataset

        console.log(cow)



        if (event.target.innerText == '- Remover') {
            event.target.classList.add("btn-success")

            event.target.classList.remove("btn-danger")
            event.target.innerText = '+ Adicionar'
            console.log(event.target.innerText)
            console.log(event.target.dataset)

            const response = await updateCowsUsers(routeRemove, token, user, cow);

            console.log(response)

            console.log('removeu')
        } else {

            event.target.classList.remove("btn-success")
            event.target.classList.add("btn-danger")
            event.target.innerText = '- Remover'
            const response = await updateCowsUsers(routeAdd, token, user, cow);
            console.log(response)
            console.log('adicionou')
        }






    })
})




removeCow.forEach(button => {
    button.addEventListener("click", async event => {


        const { cow, user, token, routeRemove } = event.target.dataset


        const response = await updateCowsUsers(routeRemove, token, user, cow);

        console.log(bodyTable.removeChild(button.closest('tr')))

       







    })
})




addCow.forEach(button => {
    button.addEventListener("click", async event => {


        const { cow, user, token, routeAdd } = event.target.dataset


        const response = await updateCowsUsers(routeAdd, token, user, cow);

       

        

        itemCard.forEach(card => {
            card.removeChild(button.closest('.section-card'));

            console.log(card.children)
           
        })

       // itemCard.removeChild(button.closest('.parent-card'));






    })
})


//select2
$(document).ready(function () {
    $('.creator').select2({
        theme: "classic",
        width: 'resolve',



    });

});




$(document).ready(function () {
    $('.edit').select2({
        theme: "classic",
        width: 'resolve',



    });

});






//data table
$(document).ready(function () {
    $('#datatable').DataTable();
});



