
<x-admin.main >

    <div class="container-fluid p-0">
  
        <div class="row">
  
        <div class=" d-md-block col-md-2 side-admin " id="side--bar">
          <x-navbar routeLogout="admin.logout" page="{{route('admin.new_cow')}}"  isAdmin={{1}} />
        </div>
                  
          
  
          
           
   
  
  
     <div class=" col-sm-10  offset-md-2 col-md-8  offset-xxl-2 col-xxl-5 ">
      <div class="p-2">
        <x-navegation_top isAdmin={{1}} />



            
                    
                       <div class="h3 text-align-center overflow-hidden">
                        Cadastrar vaca
                       </div>
                   
                 
                   
                    <form enctype="multipart/form-data" action="{{route('admin.new_cow_action')}}" class=" d-flex flex-column form-custom py-3" method="post">
                        @csrf
                       

                        <label for="name" >Nome:</label>
                        <input class="form-control form-control-md my-2" type="text" id="name" name="name" >

                        <label for="age" >Idade:</label>
                        <input class="form-control form-control-md my-2" type="number" id="age" name="age" >
                
                        <label for="weight" >Peso:</label>
                        
                       
                        <input class="form-control form-control-md my-2" type="number" id="weight" name="weight" >

                        <div class="" style="overflow: hidden;">
                        <label for="user_id" >Creador:</label>
                        <select name="user_id" id="user_id" class="form-select creator"   >
                            
                        
                            @foreach ($farmers as $farmer)
                            <option  value="{{$farmer->id}}">
                                {{$farmer->name}}
                            </option>    
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
                        
                       
                        
                
                       
                        <div>
                            <input type="submit" class="btn-farm mt-3 " value="Enviar">
                            
                        </div>
                
                        
                        
                        
                    
                    </form>


                    
                </div>

                @foreach ($errors->all() as $error)
                        
                <div class="alert alert-danger px-5" role="alert">
                  {{$error}}
                </div>
            @endforeach
            
            
            </div>
        </div>
    </div>






</x-admin.main>