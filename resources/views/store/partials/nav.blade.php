
<ul class="nav navbar-nav collapse navbar-collapse">
    <li><a href="{{ route('inicio') }}">INICIO</a></li>
    <li class="dropdown"><a href="#" >TIENDA<i class="fa fa-angle-down"></i></a> <!--class="active"-->
        <ul role="menu" class="sub-menu">            
            <li><a href="{{ route('home') }}" class="active">Ir de compras</a></li>
        </ul>
    </li> 
    <li><a href="{{ route('contact') }}">CONTACTO</a></li>
</ul>
