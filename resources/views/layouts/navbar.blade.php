<div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <div class="container">
        <h1 id="navbar-brand">
            <a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name') }}</a>
        </h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show.orders') }}"><i class="fa fa-fw fa-shopping-bag"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}"><i class="fa fa-fw fa-envelope-open-o"></i> Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search') }}"><i class="fa fa-fw fa-search"></i> Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portfolio') }}"><i class="fa fa-fw fa-book"></i> Portfolio</a>
                </li>
                @if( (auth()->user() && auth()->user()->role === 'superadmin') || (auth()->user() && auth()->user()->role === 'admin') )
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fa fa-fw fa-user-secret"></i>
                        Admin
                    </a>
                </li>
                @endif
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-fw fa-sign-in" aria-hidden="true"></i>
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                            {{ __('Register') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown"
                           class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                           v-pre
                           onclick="event.preventDefault();"
                           data-target="#logoutDropdown"
                        >
                            <i class="fa fa-fw fa-user-circle-o"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="logoutDropdown">
                            <a class="dropdown-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                <i class="fa fa-fw fa-sign-out" aria-hidden="true"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</div>
