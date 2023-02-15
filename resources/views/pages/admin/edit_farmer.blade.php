
<x-admin.main >

    <div class="container-fluid p-0">
  
        <div class="row">
  
        <div class=" d-md-block col-md-2 side-admin " id="side--bar">
          <x-navbar routeLogout="admin.logout" page="{{route('admin.new_cow')}}"  isAdmin={{1}} />
        </div>
                  
          
  
          
           
   
  
  
     <div class=" col-sm-10 offset-md-2 col-md-8  offset-xxl-2 col-xxl-5 ">
      <div class="p-2">
        <x-navegation_top isAdmin={{1}} />



            
                    
                   
                    <form enctype="multipart/form-data" action="{{route('admin.edit_farmer_action')}}" class=" d-flex flex-column form-custom py-3 " method="post">
                        @csrf
                       
                        <label for="name" >Nome:</label>
                            
                        
                       
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
            <div class="col-sm-10 my-5 offset-md-2 col-md-8  offset-xxl-2 col-xxl-5">
           
           
                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Vacinada</th>
                            <th>Quantidade de donos</th>
                            <th></th>
                            
                            
                        </tr>
                    </thead>
                    <tbody id="body-table">
                       @foreach($user->cows_group as $cow)
                        
                        <tr>
                            <td>{{$cow->name}} </td>
                            <td> {{$cow->is_vaccinated  ? 'Sim' : 'não'}}       </td>
                            <td>  {{ count($cow->users)}}      </td>

                            <td>
                                
                             
                        
                       


                        <a class="btn btn-danger remove" data-token="{{csrf_token()}}" data-remove-cow="{{$cow->id}}" >
                              
                               - Remover    
                             </a>   
                        </td>

           
                        </tr>

                        @endforeach


                         @foreach($cows_not_from_user as $cow)
                        
                        <tr>
                            <td>{{$cow->name}} </td>
                            <td> {{$cow->is_vaccinated  ? 'Sim' : 'não'}}       </td>
                            <td>  {{ count($cow->users)}}      </td>

                            <td>
                                
                             
                        
                       


                        <a class=" btn btn-success add" data-route={{route('cows_from_users_or_not')}} data-token="{{csrf_token()}}" data-user="{{$user->id}}" data-cow="{{$cow->id}}"  >
                            +  Adicionar   
                        </a>   
                        </td>

           
                        </tr>

                        @endforeach
 

                      
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Quantidade de Vacas</th>
                          <th></th>
                            
                          
                        </tr>
                    </tfoot>
                </table>
            </div>
          
        </div>
            




        </div>
    </div>



    





</x-admin.main>