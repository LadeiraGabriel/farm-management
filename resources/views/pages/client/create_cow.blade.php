
<x-admin.main >

    <div class="container-fluid p-0">
  
        <div class="row">
  
        <div class=" d-md-block col-md-2 side-admin " id="side--bar">
          <x-navbar routeLogout="client.logout" page="{{route('client.new_cow') ?? ''}}"  isAdmin={{$is_admin}} />
        </div>
                  
          
  
          
           
   
  
  
     <div  class=" col-sm-12  col-md-12  " style="padding: 0 20%" >
      <div class="p-2">
        <x-navegation_top isAdmin={{$is_admin}} />



            
                    
                       <div class="h3 text-align-center overflow-hidden">
                        Cadastrar vaca
                       </div>
                   
                 
                   
                    <form enctype="multipart/form-data" action="{{route('client.new_cow_action')}}" class=" d-flex flex-column form-custom py-3" method="post">
                        @csrf
                       

                        <label for="name" >Nome:</label>
                        <input class="form-control form-control-md my-2" type="text" id="name" name="name" >

                        <label for="age" >Idade:</label>
                        <input class="form-control form-control-md my-2" type="number" id="age" name="age" >
                
                        <label for="weight" >Peso:</label>
                        
                       
                        <input class="form-control form-control-md my-2" type="number" id="weight" name="weight" >

                       

                        <div class="my-2">
                            <label for="image" >foto da vaca:</label>
                           <input class="form-control form-control-md " type="file" id="image" name="image" >


                        </div>

                           


                           <div class="my-2">


                           <label for="vaccinated" >Vacinada</label>

                           <input class="form-check-input" type="checkbox" id="vaccinated" name="vaccinated" >
                        </div>
                        
                       
                        
                
                       
                        <div>
                            <input type="submit" class="btn-farm mt-3 " value="Entrar">
                            
                        </div>
                
                        
                        
                        
                    
                    </form>




                    
                </div>
            
            
            </div>
        </div>
    </div>






</x-admin.main>