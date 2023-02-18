
<x-admin.main >





        
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar dados do Fazendeiro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('client.change_password_action')}}" id="form-change-password" class=" d-flex flex-column  py-3"  method="post">
                    @csrf
                   

                  


                    <label for="password" >Senha:</label>
        
                    <span class="box--eye" >
                      <input class="form-control form-control-md my-2 px-2" type="password" id="password" name="password" >
      
                      <img class="eye" src="/assets/images/eye_no_visibility.png" alt="">
                       </span>

                    
                    
                   
                   
            
                    <label for="password_confirmation">Confirmar Senha:</label>
                    <span class="box--eye" >
                      <input type="password" class="form-control form-control-md my-2 px-2" name="password_confirmation" id="password_confirmation">
        
                        <img class="eye " src="/assets/images/eye_no_visibility.png" alt="">
                         </span>
            
                
            
                    
                    
                    
                
                </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >cancelar</button>
              <input type="submit" class="btn btn-success" form="form-change-password"  value="atualizar" />
            </div>
          </div>
        </div>
      </div>





    <div class="container-fluid p-0">
  
        <div class="row">
  
        <div class="  col-md-4 col-xxl-2 side-admin p-0 " id="side--bar">
          <x-navbar routeLogout="client.logout" page="{{route('client.cows') ?? ''}}"  isAdmin={{$is_admin}} />
        </div>
                  
          
  
          
           
   
  
  
     <div  class=" col-sm-12  col-md-12  col-xxl-8 offset-xxl-2 "  style="padding: 0 ">
      <div class="p-2">
        <div class=" mx-xxl-5 px-xxl-5" style="padding: 0 10px">
            <x-navegation_top isAdmin={{$is_admin}} />
        </div>
        
                 

           
                 

               <div class="container-fluid overflow-hidden ">
               
                
                <div class="row d-flex justify-content-start my-3   ">

                  <div class="col-sx-12  col-md-10  col-xxl-10 offset-xxl-1  ">

                    <div >
                      <h2 class="overflow-hidden">Minha Conta</h2>
                  </div>
                  <table class="table">
                    <thead>
                      <tr >
                        <th class="header-min" scope="col">#</th>
                        <th class="header-min" scope="col">Nome</th>
                        <th class="header-min" scope="col">Email</th>
                        <th  class="header-min" scope="col">Quantidade de Vacas</th>
                        <th class="header-min" scope="col"></th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th  class="body-min" scope="row">1</th>
                        <td class="body-min">{{$user->name}}</td>
                        <td class="body-min">{{$user->email}}</td>
                        <td class="body-min">{{ count( $user->cows) + count($user->cows_group)}} </td>
                        <td>
                          <a class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#exampleModal">
                              
                            <span class="body-min">
                                <img class="icon-min" src="/assets/images/edit_svg.svg"  alt="">
                                Trocar senha    
                            </span> 
                        </a>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>

                

                  
                    @foreach ($errors->all() as $error)
                        
                        <div class="alert alert-danger" role="alert">
                          {{$error}}
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