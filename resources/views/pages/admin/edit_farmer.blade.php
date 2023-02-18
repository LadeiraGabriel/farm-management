
<x-admin.main >

    <div class="container-fluid p-0">
  
        <div class="row">


            <div class="container  ">
                <div class="row">
                    <div class="col-md-10 offset-lg-2 pt-2  col-xxl-8 offset-xxl-2 " > 
        
                        <x-navegation_top isAdmin={{1}}  />
                    </div>
                </div>
        
            </div>
  
        <div class=" d-md-block col-md-2 side-admin " id="side--bar">
          <x-navbar routeLogout="admin.logout" page="{{route('admin.home')}}"  isAdmin={{1}} />
        </div>
                  
          
  
          
           
   
  
  
     <div class=" col-sm-10 offset-md-2 col-md-4">
      <div class="p-2">
       



            
                    
                   
                    <form enctype="multipart/form-data" action="{{route('admin.edit_farmer_action')}}" class=" d-flex flex-column form-custom py-3 " method="post">
                        @csrf
                       

                        <input type="hidden"  name="id" value="{{$user->id}}"> 


                        <label for="name" >Nome:</label>
                            
                        
                       
                        <input class="form-control form-control-md my-2" type="name" placeholder="{{$user->name}}" id="name" name="name" >
                
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
            <div class="col-sm-10  col-md-4" style="">
           
           
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


                        @foreach($user->cows as $cow)
                        
                        <tr>
                            <td>{{$cow->name}} </td>
                            <td> {{$cow->is_vaccinated  ? 'Sim' : 'não'}}       </td>
                            <td>  {{count($cow->users) + 1}}   </td>

                            <td>
                                <img src="/assets/images/star.svg" width="20px" alt="">
                                
                                criador
                            </td>

                        @endforeach

                       @foreach($user->cows_group as $cow)
                        
                        <tr>
                            <td>{{$cow->name}} </td>
                            <td> {{$cow->is_vaccinated  ? 'Sim' : 'não'}}       </td>
                            <td>   {{ count($cow->users) + 1 }}     </td>

                            <td>
                                
                             
                        
                       


                        <a class="btn btn-danger selector" data-route-add={{route('add_user_cow')}} data-route-remove={{route('remove_user_cow')}} data-token="{{csrf_token()}}" data-user="{{$user->id}}" data-cow="{{$cow->id}}" >
                              
                               - Remover    
                             </a>   
                        </td>

           
                        </tr>

                        @endforeach


                         @foreach($cows_not_from_user as $cow)
                        
                        <tr>
                            <td>{{$cow->name}} </td>
                            <td> {{$cow->is_vaccinated  ? 'Sim' : 'não'}}       </td>
                            <td>  {{ count($cow->users) + 1 }}       </td>

                            <td>
                                
                             
                        
                       


                        <a class=" btn btn-success selector" data-route-add={{route('add_user_cow')}} data-route-remove={{route('remove_cow_user')}} data-token="{{csrf_token()}}" data-user="{{$user->id}}" data-cow="{{$cow->id}}"  >
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