
<x-admin.main >


    

   


    <div class="container-fluid p-0">
  
        <div class="row">
  
        <div class="col-md-4 col-xxl-2 side-admin p-0 " id="side--bar">
          <x-navbar routeLogout="admin.logout" page="{{route('admin.home') ?? ''}}"  isAdmin={{$is_admin}} />
        </div>
                  
          
  
          
           
   
  
  
     <div class=" col-sx-12   offset-lg-1  col-lg-10 offset-xxl-2 col-xxl-8  col-md-12  ">
      <div class="p-2">
        <x-navegation_top isAdmin={{$is_admin}} />
                 

           
                 

               <div class="container overflow-hidden ">
                <div class="d-flex justify-content-between">
                    <h2 class="overflow-hidden">Vacas</h2>


              


                </div>
                
                <div class="row d-flex justify-content-start my-3   ">
                    
                  <div>
                    
                  </div>
                 @foreach ($cows as $cow)
                
                 <div class=" col-xs-12  col-lg-6 col-xxl-4 flex-wrap my-5">
    
                  <div class="card " style="width: 18rem;">
                     <img src="/assets/images/cows/{{$cow->image_path}}"  class="card-img-top " style="width: 300px; height: 200px; " alt="...">
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
                           <p class="card-text"> Donos:  {{count($cow->users) + 1}} </p>   
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
                             <a class="btn btn-danger" href="{{route('admin.delete_cow_action',$cow->id)}}">
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