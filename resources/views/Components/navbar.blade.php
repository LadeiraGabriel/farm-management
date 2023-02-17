


 





<div class="navbar-dash d-flex flex-column p-0  align-items-center" id="navbar-side">

        

    <div class="mt-5">
        <img src="/assets/images/logo_farm.png" class="logo_farm" alt="">
    </div>

    <div class="d-flex flex-column align-items-center mt-5">

         @if (!$isAdmin)  

         <div class="action-nagation-dash my-2 {{ $page == route('client.cows')  ? 'action-nagation-dash-selected' : '' }} ">
            <a href="{{route('client.cows')}}" >
                <span>
                    <img src="/assets/images/home_svg.svg"   alt="">
                    Visão geral
                </span>
            </a>
        </div>


         <div class="action-nagation-dash my-2 {{$page == route('client.new_cow') ? 'action-nagation-dash-selected' : '' }}">
            <a href="{{route('client.new_cow')}}" >
                <span>
                    <img src="/assets/images/cow_action_svg.svg" alt="">
                    Cadastrar vaca
                </span>
            </a>
        </div>  


       
       @endif



       @if($isAdmin)
        <div class="action-nagation-dash my-2 {{$page == route('admin.home')   ? 'action-nagation-dash-selected' : '' }} ">
            <a href="{{route('admin.home')}}" >
                <span>
                    <img src="/assets/images/home_svg.svg" alt="">
                    Visão geral
                </span>
            </a>
        </div>


        <div class="action-nagation-dash my-2  {{$page == route('admin.new_farmer') ? 'action-nagation-dash-selected' : '' }}  ">
            <a href="{{route('admin.new_farmer')}}" >
                <span>
                    <img src="/assets/images/add_user_svg.svg" alt="">
                   Cadastrar fazendeiro
                </span>
            </a>
        </div>

        <div class="action-nagation-dash my-2 {{$page == route('admin.new_cow') ? 'action-nagation-dash-selected' : '' }}">
            <a href="{{route('admin.new_cow')}}" >
                <span>
                    <img src="/assets/images/cow_action_svg.svg" alt="">
                    Cadastrar vaca
                </span>
            </a>
        </div>
         @endif  

       
    </div>

    <div class="logout">

        <a class="aqui" href="{{route($routeLogout)}}">
            <span>
                <img src="/assets/images/logout_svg.svg" alt="">
                Sair
            </span>
            </a>
    </div>

</div> 