<nav
    class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
    data-aos="fade-down"
>
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('images/logo.svg') }}" alt="logo" />
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Rewards</a>
                </li>
                @guest                
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a
                        href="{{ route('login') }}"
                        class="nav-link btn btn-success px-4 text-white"
                        >Sign In</a
                        >
                    </li>
                @endguest
            </ul>

            @auth
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                        <img
                            src="{{ url('images/icon-profil.png') }}"
                            alt=""
                            class="rounded-circle mr-2 profile-picture"
                        />
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}"
                                >Dashboard</a
                            >
                            <a class="dropdown-item" href="{{ route('dashboard-settings-account') }}"
                                >Settings</a
                            >
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-inline-block mt-2 relative" href="{{ route('cart') }}">
                            @php $carts = \App\Cart::where('users_id', Auth::user()->id)->count(); @endphp
                            @if ($carts > 0)
                                <img src="/images/icon-cart-filled.svg" alt="" />
                                <div class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success text-light">{{ $carts }}</div>
                            @else
                                <img src="/images/icon-cart-empty.svg" alt="" />
                            @endif
                        </a>
                    </li>
                </ul>
                
                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none mt-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Hi, {{ Auth::user()->name }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-inline-block" href="#"> Cart </a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>