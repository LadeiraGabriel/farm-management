

<x-admin.main >



    <div class="container-fluid d-flex align-items-center justify-content-around navbar-expand-lg p-3 bg-color-bright">

        <div class="title--nav--admin d-flex align-items-center">
          
            <img src="/assets/images/logo_farm.png" class="mx-2 admin--logo" alt="" >
          
           <div>Farm Management</div> 
        </div>

        <div >
            <a href="{{route("login_farmer")}}" class="text-decoration-none title-color-gray">ir para o site</a>
        </div>

    </div>




<div class="container-fluid  ">

    <div class="row">
        <div class="mt-5 col-12 offset-0 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 col-xxl-4 offset-xxl-4 ">

            <form action="{{route('loginAction')}}" class="form-admin m-auto d-flex flex-column bg-color-bright p-5" method="post">
                @csrf
               
                <label for="email" >E-mail:</label>
                
               
                <input class="form-control form-control-md my-2" type="email" id="email" name="email" >
        
                <label for="password">Senha:</label>
                <span class="box--eye" >
                    <input class="form-control form-control-md my-2" type="password" id="password" name="password" >
    
                    <img class="eye eye1" src="/assets/images/eye_no_visibility.png" alt="">
                     </span>
        
                <div  class="mt-2">
                
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label for="remember" class="fs-6 mx-1 ">Lembrar de mim</label>
            </div>
                <div>
                    <input type="submit" class="btn-farm mt-3 " value="Entrar">
                    
                </div>
        
                
                
                
            
            </form>


            @foreach ($errors->all() as $error)
                    
                <div class="alert alert-danger  mt-2" role="alert">
                  {{$error}}
                </div>
            @endforeach

        </div>
    </div>
   

</div>





</x-admin.main>

