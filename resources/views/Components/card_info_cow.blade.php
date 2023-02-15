





      <div class=" col-xs-12  col-lg-6 col-xxl-4 flex-wrap my-5">
    
     <div class="card " style="width: 18rem;">
        <img src="/assets/images/cows/{{$image}}"  class="card-img-top" style="width: 300px; height: 200px; object-fit: contain" alt="...">
        <div class="card-body ">
         
        
          <div class="row mb-2 card-content  "> 
            <h5 class="card-title overflow-hidden d-flex " style="color: #6C6C6C; font-weight: 500;padding-left: 15px;">Nome: {{$name}}</h5>
            <div class="d-flex justify-content-around">
            
                <div>
                <p class="card-text">Idade: {{$age}} anos</p>
           
                <p class="card-text">Peso: {{$weight}} Kg</p>
                </div>
         
            <div>
                <p class="card-text">Vacinada: {{$isVaccinated ? 'sim' : 'não' }}</p>
              @if ($isAdmin)
              <p class="card-text"> Criador: {{ $userOwner ?? '' }}</p>   
              @endif
               
                
            </div>
            
            </div>


         

           
         
          
      
          <div class="d-flex justify-content-around mt-3">
            
          
            <div class="">
                

                <a  class="btn btn-success" data-id-cow="{{$id}}"   data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span>
                        <img src="/assets/images/edit_svg.svg"  alt="">
                        editar    
                    </span> </a> 
            </div>

            <div class="">
                <a class="btn btn-danger" href="{{route($routeDelete,$id)}}">
                    <span>
                        <img src="/assets/images/delete_svg.svg" class="object-fit-contain"   alt="">
                        Deletar    
                    </span> </a> 
            </div>
            
          </div>

        </div>

          
         
        </div>
      </div> 

     

</div>