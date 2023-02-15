
<x-admin.main >





        
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar dados da Vaca</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('client.edit_cows_action')}}" enctype="multipart/form-data" class=" d-flex flex-column  py-3" id="form_edit_cow" method="post">
                    @csrf

                    @method('PUT')
                   
                    <input type="hidden" name="id" id="id-cow" >

                    <label for="name" >Nome:</label>
                    
                   
                    <input class="form-control form-control-md my-2" type="text" id="name" name="name" >

                    <label for="age" >Idade:</label>
                    
                   
                    <input class="form-control form-control-md my-2" type="number" id="age" name="age" >
            
                    <label for="weight" >Peso:</label>
                    
                   
                    <input class="form-control form-control-md my-2" type="number" id="weight" name="weight" >

                   
                   

                    <div class="my-2">
                        <label for="image" >foto da vaca</label>

                       <input class="form-control form-control-md " type="file" id="image" name="image" >


                    </div>

                       


                       <div class="my-2">


                       <label for="vaccinated" >Vacinada</label>

                       <input class="form-check-input" type="checkbox" id="vaccinated" name="vaccinated" >
                    </div>
                    
                   
                    
            
                
                    
                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >cancelar</button>
              <input type="submit" class="btn btn-success" form="form_edit_cow"  value="atualizar" />
            </div>
          </div>
        </div>
      </div>




    <div class="container-fluid p-0">
  
        <div class="row">
  
        <div class="  col-md-4 col-xxl-2 side-admin p-0 " id="side--bar">
          <x-navbar routeLogout="client.logout" page="{{route('client.cows') ?? ''}}"  isAdmin={{$is_admin}} />
        </div>
                  
          
  
          
           
   
  
  
     <div  class=" col-sx-12   offset-lg-1  col-lg-10 offset-xxl-2 col-xxl-8  col-md-12 "  >
      <div class="p-2">
        <div class=" mx-xxl-5 px-xxl-5">
            <x-navegation_top isAdmin={{$is_admin}} />
        </div>
        
                 

           
                 

               <div class="container overflow-hidden ">
                <div>
                    <h2 class="overflow-hidden">Vacas</h2>
                </div>
                
                <div class="row d-flex justify-content-start my-3   ">

                    @foreach ($cows as $cow)



                  
                 <div class=" col-xs-12  col-lg-6 col-xxl-4 flex-wrap my-5">
    
                  <div class="card " style="width: 18rem;">
                     <img src="/assets/images/cows/{{$cow->image_path}}"  class="card-img-top" style="width: 300px; height: 200px; object-fit: contain" alt="...">
                     <div class="card-body ">
                      
                     
                       <div class="row mb-2 card-content  "> 
                         <h5 class="card-title overflow-hidden d-flex " style="color: #6C6C6C; font-weight: 500;padding-left: 15px;">Nome: {{$cow->name}}</h5>
                         <div class="d-flex justify-content-around">
                         
                             <div>
                             <p class="card-text">Idade: {{$cow->age}} anos</p>
                        
                             <p class="card-text">Peso: {{$cow->weight}} Kg</p>
                             </div>
                      
                         <div>
                             <p class="card-text">Vacinada: {{$cow->is_vaccinated ? 'sim' : 'não' }}</p>
                           @if ($is_admin)
                           <p class="card-text"> Criador: {{-- {{ $userOwner ?? '' }} --}}</p>   
                           @endif
                            
                             
                         </div>
                         
                         </div>
             
             
                      
             
                        
                      
                       
                   
                       <div class="d-flex justify-content-around mt-3">
                         
                       
                         <div class="">
                             
             
                             <a  class="btn btn-success"  href="{{route('admin.edit_cow',$cow->id)}}"   {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" --}}>
                                 <span>
                                     <img src="/assets/images/edit_svg.svg"  alt="">
                                     editar    
                                 </span> </a> 
                         </div>
             
                         <div class="">
                             <a class="btn btn-danger" href="{{route('delete_cow_action',$cow->id)}}">
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

                      
                     @endforeach
                   

                       
                    
                </div>    


              
                
            </div> 
            </div>     
          

             




                    
                </div>
            
            
            </div>
        </div>
    </div>

    
</x-admin.main >