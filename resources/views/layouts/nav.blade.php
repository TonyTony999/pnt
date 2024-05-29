<nav class="navbar navbar-expand-md navbar-light bg-secondary">
    <!-- we can add fixed-bottom to the nav class to make it stick to the bottom-->
    <div class="container-fluid align-items-center">
        <a href="/" class="navbar-brand">
            <span class="text-light">
                Colombian Panties
            </span>
        </a>
        <!-- toggle button for mobile nav-->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
            aria-controls="main-nav" aria-expanded="false" aria-label="Toggle Navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <!--Navbar Links-->
        <div id="main-nav" class="collapse navbar-collapse justify-content-end align-center">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="#models" class="nav-link">Models</a>
                </li>
                <li class="nav-item">
                    <a href="/panties" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item d-md-none">
                    <!-- d-md-none means display is none for md screens-->
                    <a href="#pricing" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @auth()
                                {{ Auth::user()->name }}
                            @endauth
                            @guest
                                Login/Register
                            @endguest

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @auth()
                                @if (Auth::user())
                                    <li><a class="dropdown-item" href="{{ route('account.edit',Auth::user()->id ) }}">Account</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.show', Auth::user()->id) }}">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="btn btn-sm" type="submit"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                @endif
                            @endauth
                            @guest
                                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            @endguest

                        </ul>
                    </div>
                </li>
            </ul>

        </div>

    </div>
</nav>
