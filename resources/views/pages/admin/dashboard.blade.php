
<x-admin.main >


   {{--  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar dados do Fazendeiro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.edit_farmer_action')}}" id="form-edit-farmer" class=" d-flex flex-column  py-3" id="form_edit_farmer" method="post">
                    @csrf
                   

                    <input type="hidden" name="id" id="id-farmer" >


                    <label for="name" >Nome:</label>
        
                    <input class="form-control form-control-md my-2" type="text"  id="name" name="name" >

                    
                    
                   
                    <input class="form-control form-control-md my-2" type="hidden" id="email" name="email" >
            
                    <label for="password">Senha:</label>
                    <span class="box--eye" >
                        <input class="form-control form-control-md my-2" type="password" id="password" name="password" >
        
                        <img class="eye" src="/assets/images/eye_no_visibility.png" alt="">
                         </span>
            
                
            
                    
                    
                    
                
                </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >cancelar</button>
              <input type="submit" class="btn btn-success" form="form-edit-farmer"  value="atualizar" />
            </div>
          </div>
        </div>
      </div> --}}


<div class="container-fluid p-0">
  
      <div class="row">

      <div class=" col-md-4 col-xxl-2 side-admin p-0 " id="side--bar">
        <x-navbar routeLogout="admin.logout" page="{{route('admin.home') }}"  isAdmin="{{$is_admin}}" />
      </div>
                
        

        
         
 


   <div class=" col-sx-12   offset-lg-1  col-lg-10 offset-xxl-2 col-xxl-8  col-md-12  " >
    <div class="p-2">
      <x-navegation_top isAdmin="{{$is_admin}}" />
           
            



                  <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Quantidade de Vacas</th>
                            <th></th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}} </td>
                            <td> {{$user->email}}       </td>
                            <td>  {{ count($user->cows) + count($user->cows_group)}}      </td>

                            <td>
                                
                              <a class="btn btn-primary"  href="{{ route('admin.edit_farmer',$user->id)}}"  >
                              
                              <span>
                                  <img src="/assets/images/edit_svg.svg"  alt="">
                                  Editar    
                              </span> 
                          </a>   
                        
                        <a class="btn btn-danger" href="{{route('admin.delete_farmer_action',$user->id)}}" >
                            <span>
                                <img src="/assets/images/delete_svg.svg"  alt="">
                                Deletar    
                            </span> </a>   
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



   
  






</x-admin.main>