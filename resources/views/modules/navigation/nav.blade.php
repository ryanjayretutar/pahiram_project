
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #F74D18;">
    <div class="container">
        <form style="width: 40rem;">
            <div class="input-group">
                <input class="form-control" name="" placeholder="Search for items">
                <span class="input-group-addon">
                    <button class="btn" type="submit" style="background-color: white; color: #FF551F;"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <button class="navbar-toggler navbar-light bg-light" type="button" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <a href="/" style="padding: 0.5rem; color: white; text-decoration: none;"><i class="fa fa-home"></i>&nbsp;Home</a>
                    <a href="" style="padding: 0.5rem; color: white; text-decoration: none;"><i class="fa fa-shopping-cart"></i>&nbsp;My Cart</a>
                    <a href="{{ route('login') }}" style="padding: 0.5rem; color: white; text-decoration: none;"><i class="fa fa-user"></i>&nbsp;{{ __('Login') }}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                @else
                    <a href="/" class="nav-link" style="padding: 0.5rem; color: white; text-decoration: none;"><i class="fa fa-home"></i>&nbsp;Home</a>
                    <a href="" class="nav-link" style="padding: 0.5rem; color: white; text-decoration: none;"><i class="fa fa-shopping-cart"></i>&nbsp;My Cart</a>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="padding: 0.5rem; color: white; text-decoration: none;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hi,&nbsp;{{ Auth::user()->name }}&nbsp;<i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/logout"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;
                @endguest
            </ul>
        </div>
    </div>
</nav>


