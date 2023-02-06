
<x-admin.main >

    <div class="container-fluid p-0">
  
        <div class="row">
  
        <div class=" d-md-block col-md-2 side-admin " id="side--bar">
          <x-navbar routeLogout="admin.logout" page="{{route('admin.new_farmer')}}"  isAdmin={{1}} />
        </div>
                  
          
  
          
           
   
  
  
     <div class=" col-sm-12  offset-md-2 col-md-8   offset-xxl-2 col-xxl-6 ">
      <div class="p-2">
        <x-navegation_top isAdmin={{1}} />
        
           
                        <div class="h3 text-align-center overflow-hidden px-3">
                            Cadastrar fazendeiro
                           </div>
                       
                     
                       
                        <form action="{{route('admin.new_farmer_action')}}" class=" d-flex flex-column form-custom p-3 me-5" method="post">
                            @csrf
                           
    
                            <label for="name" >Nome:</label>
                            
                           
                            <input class="form-control form-control-md my-2" type="text" id="name" name="name" >
    
                            <label for="email" >E-mail:</label>
                            
                           
                            <input class="form-control form-control-md my-2" type="email" id="email" name="email" >
                    
                            <label for="password">Senha:</label>
                            <span class="box--eye" >
                                <input class="form-control form-control-md my-2" type="password" id="password" name="password" >
                
                                <img class="eye" src="/assets/images/eye_no_visibility.png" alt="">
                                 </span>
                    
                           
                            <div>
                                <input type="submit" class="btn-farm mt-3 " value="Entrar">
                                
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