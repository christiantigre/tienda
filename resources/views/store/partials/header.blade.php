        
        

        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
    <div class="col-sm-6 ">
        <div class="contactinfo">
            <ul class="nav nav-pills">

                <li><a href=""><i class="fa fa-phone"></i>+2203584 / 2203584</a></li>

                <li><a href=""><i class="fa fa-envelope"></i> storelinect@gmail.com </a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <!--<li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>-->
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                @include('store.partials.messages')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/home/logo.png') }}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <!--<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Canada</a></li>
                                    <li><a href="">UK</a></li>
                                </ul>-->
                            </div>
                            
                            <div class="btn-group">
                                <!--<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Canadian Dollar</a></li>
                                    <li><a href="">Pound</a></li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                           
                            <ul class="nav navbar-nav">
                                @if (Auth::guest())
                                <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Inicio de sesión</a></li>  
                                <li><a href="{{ url('/register') }}"><i class="fa fa-user"></i> Registrárse</a></li>
                                @else                              
                                <!--<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>-->
                                <input name="idus" id="idus" value="{{ Auth::user()->id }}" type="hidden">
                                <li><a href="{{ route('cart-show') }}">
                                    @if (session('items'))
                                        <span class="badge bg-green">{{ session('items') }}</span>
                                    @endif
                                    <i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                    </a>
                                    <ul role="menu" class="sub-menu-sin-estilo">
                                        <li>
                                            <a href="{{ url('/perfil',Auth::user()->id) }}" class="inactive">Cuenta   <i class="fa fa-briefcase"></i></a>
                                        </li> 
                                        <br>
                                        <li><a href="{{ route('mysales') }}" class="inactive">Mis compras   <i class="fa fa-folder"></i></a></li>
                                        <br>
                                        <li>
                                            <a href="{{ url('/logout') }}">Salir   <i class="fa fa-sign-in"></i></a>
                                        </li> 
                                    </ul>
                                </li>

                                
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            @include('store.partials.nav')
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <!--<input type="text" placeholder="buscar"/>-->
                        </div>
                    </div>
                </div>
                </div>
            </div>