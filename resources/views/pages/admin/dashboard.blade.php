
<x-admin.main >


   


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