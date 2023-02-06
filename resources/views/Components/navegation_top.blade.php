
<div class="d-flex align-items-center">

<div class="container-toggle" >
    <img id="button-togle" src="/assets/images/menu.png" style="cursor: pointer" alt="">
</div>

    
        <ul class="d-flex m-0 p-0 " style="list-style-type: none">
            @if ($isAdmin)
            <li class="mx-4">
               <a href="{{route('admin.home')}}" class="text-decoration-none text-black"> Fazendeiros </a>
            </li>
            <li>
               <a href="{{route('admin.cows')}}" class="text-decoration-none text-black">Vacas</a> 
            </li>
            @else
            <li class="mx-3">
                <a href="{{route('client.cows')}}" class="text-decoration-none text-black">Vacas</a> 
             </li>

             <li class="mx-3">
                <a href="{{route('client.account_farmer')}}" class="text-decoration-none text-black">Minha conta</a> 
             </li>
            
            @endif
           
        </ul>

    </div>





    <hr class="mb-5">