



<x-admin.main >
    

    <div class="container-fluid " >
        <div class="row  "  style="height: 96vh; overflow:hidden ">
            <div class="col-6 d-none d-md-block p-0" id="back-login">
                
              <div style="background-color: #2e76659f; height:96vh; ">
                
                <div style="width: 420px; color: white; padding: 200px 0 0 100px">
                    <h1 class="overflow-hidden">
                        Farm Management
                    </h1>

                    <p>Gerencie suas fazendas com nosso site.</p>
                </div>
            </div>
            </div>

            <div class=" col-sm-12 col-md-6 col-xl-6 col-xxl-4 ">
                
                 
                <form action="{{route('login_action_farmer')}}" class=" d-flex flex-column  p-4" style="margin: 100px 0 0 30px" method="post">
                    @csrf
                   
                    <div class="mb-3 h4 overflow-hidden">
                        Bem vindo 
                    </div>
                    <label for="email" >E-mail:</label>
                    
                   
                    <input class="form-control form-control-md my-2" type="email" id="email" name="email" >
            
                    <label for="password">Senha:</label>
                    <span class="box--eye" >
                        <input class="form-control form-control-md my-2" type="password" id="password" name="password" >
        
                        <img class="eye eye1" src="/assets/images/eye_no_visibility.png" alt="">
                         </span>
            


                         <div>
                          
                         </div>
                   
                    <div>
                        <input type="submit" class="btn-farm mt-3 " value="Entrar">
                        
                    </div>
            
                
                
                </form>

               
                @foreach ($errors->all() as $error)
                    
            <div class="alert alert-danger ms-5" role="alert">
              {{$error}}
            </div>
        @endforeach

            </div>

           

        </div>
    </div>

   

    <footer class="text-white bg-black  d-flex justify-content-center align-items-center " style="height: 4vh;">
        <div> Todos os direitos reservados.</div>
        
    </footer>

</x-admin.main>