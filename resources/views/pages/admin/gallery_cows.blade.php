
<x-admin.main >


    

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar dados da Vaca</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.edit_cows_action')}}" enctype="multipart/form-data" class=" d-flex flex-column  py-3" id="form_edit_cow" method="post">
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
                      <label for="user_id" >Pertence à:</label>

                    
                     
                      <select name="user_id" id="user_id" class="form-select ">
                        @foreach ($farmers as $farmer) 
                        <option value="{{$farmer->id}}">{{$farmer->name}}</option>
             
                        @endforeach
                        
                       </select>
                       
                    </div>
                   
           
                   

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
  
        <div class="col-md-4 col-xxl-2 side-admin p-0 " id="side--bar">
          <x-navbar routeLogout="admin.logout" page="{{route('admin.home') ?? ''}}"  isAdmin={{$is_admin}} />
        </div>
                  
          
  
          
           
   
  
  
     <div class=" col-sm-12  offset-md-2 col-md-8 ">
      <div class="p-2">
        <x-navegation_top isAdmin={{$is_admin}} />
                 

           
                 

               <div class="container overflow-hidden ">
                <div>
                    <h2 class="overflow-hidden">Vacas</h2>
                </div>
                
                <div class="row d-flex justify-content-start my-3   ">
                    

                 @foreach ($cows as $cow)
                 <x-card_info_cow name="{{$cow->name}}" id="{{$cow->id}}" routeDelete="{{'delete_cow_action'}}" age="{{$cow->age}}" isAdmin="{{$is_admin}}"   image="{{$cow->image_path}}" weight="{{$cow->weight}}"  isVaccinated="{{$cow->is_vaccinated}}" userOwner="{{$cow->user['name']}}" />
                 @endforeach




                     

                      

                       
                    
                </div>    


              
                
            </div> 
            </div>     
          

             




                    
                </div>
            
            
            </div>
        </div>
    </div>

    
</x-admin.main >