<nav
class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
data-aos="fade-down"
>
    <button
        class="btn btn-secondary d-md-none mr-auto mr-2"
        id="menu-toggle"
    >
        &laquo; Menu
    </button>

    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto d-none d-lg-flex">
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
                Hi, Rina
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/index.html"
                >Back to Store</a
            >
            <a class="dropdown-item" href="/dashboard-account.html"
                >Settings</a
            >
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/">Logout</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link d-inline-block mt-2" href="#">
            <img src="/images/icon-cart-empty.svg" alt="" />
            </a>
        </li>
        </ul>
        <!-- Mobile Menu -->
        <ul class="navbar-nav d-block d-lg-none mt-3">
        <li class="nav-item">
            <a class="nav-link" href="#"> Hi, Rina </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-inline-block" href="#"> Cart </a>
        </li>
        </ul>
    </div>
</nav>