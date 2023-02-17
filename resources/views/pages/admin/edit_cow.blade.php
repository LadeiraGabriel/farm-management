
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
          <x-navbar routeLogout="admin.logout" page="{{route('admin.new_cow')}}"  isAdmin={{1}} />
        </div>
                  
          

       
  
       
           
   
  
  
     <div class=" col-sm-10  offset-md-2 col-10 {{-- col-md-8 gap-2 offset-xxl-2 col-xxl-10 --}} ">
      <div class="p-2">
       {{--  <x-navegation_top isAdmin={{1}} /> --}}



            <div class="container-fluid ">

                <div class="row">

                    <div class=" col-md-10 col-lg-6 col-xxl-4">
                        <div class="h3 text-align-center overflow-hidden">
                            Editar Informações da {{$cow->name}}
                           </div>
                       
                           <div class="my-3">
                            <img src="/assets/images/cows/{{$cow->image_path}}" alt="" style="width: 180px; border-radius: 10%">
                           </div>
                       
                        <form enctype="multipart/form-data" action="{{route('admin.edit_cows_action')}}" class=" d-flex flex-column form-custom py-3" method="post">
                            @csrf
                         
                            <input type="hidden"  name="id" value="{{$cow->id}}"> 
    
                            <label for="name" >Nome:</label>
                            <input class="form-control form-control-md my-2" placeholder="{{$cow->name}}" type="text" id="name" name="name" >
    
                            <label for="age" >Idade:</label>
                            <input class="form-control form-control-md my-2" placeholder="{{$cow->age}}" type="number" id="age" name="age" >
                    
                            <label for="weight" >Peso:</label>
                            <input class="form-control form-control-md my-2" placeholder="{{$cow->weight}}" type="number" id="weight" name="weight" >
    
                            <div class="my-2">
                            <label for="user_id" >Criador:  {{$cow->user->name}}  </label>
                          
                            </div>
                            
                           
                            
                         
    
                            <div>
                                <label class="my-2" for="image" >foto da vaca: </label>
                               <input class="form-control form-control-md " type="file" id="image" name="image" >
    
    
                            </div>
    
                               
    
    
                               <div class="my-2">
    
    
                               <label for="vaccinated" >Vacinada</label>
    
                               <input class="form-check-input" type="checkbox"  {{ $cow->is_vaccinated  ? "checked" : false}} id="vaccinated" name="vaccinated" >
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
                
                  

                    <div class=" col-lg-10 col-md-12 my-lg-1 my-md-5 col-xxl-5 offset-xxl-1">

                        <div class="mb-5 d-flex justify-content-between">
                           <h4 class="overflow-hidden">Donos da {{$cow->name}}</h4> 

                           
                        </div>

                        <table id="datatable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Quantidade de Vacas</th>
                                    <th></th>
                                   
                                    
                                    
                                    
                                </tr>
                            </thead>
                            <tbody class="b-table">
                                <tr>
                                    <td>{{$cow->user->name}} </td>
                                    <td>{{$cow->user->email}} </td>
                                    <td>{{count($cow->user->cows)}} </td>
                                    <td>
                                        <img src="/assets/images/star.svg" width="20px" alt="">
                                        
                                        criador</td>
                                   
                                </tr>
                              @foreach ($cow->users as $user)
                                <tr>
                                    <td>{{$user->name}} </td>
                                    <td> {{$user->email}}       </td>
                                    <td>  {{ count($user->cows) + count($user->cows_group)}}      </td>
        
                                    <td>
                                        
                                   
                                
                                <a class="btn btn-danger remove"  data-route-remove={{route('remove_cow_user')}} data-token="{{csrf_token()}}" data-user="{{$user->id}}" data-cow="{{$cow->id}}" >
                                    
                                       
                                       - Remover    
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
                    
                      
            
            </div>





        </div>
    </div>






</x-admin.main>