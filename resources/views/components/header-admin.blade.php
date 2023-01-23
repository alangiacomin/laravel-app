<!-- <Header> -->
<nav @class(['navbar', 'navbar-expand-lg', 'navbar-dark', 'bg-dark'])>
    <div @class(['container-fluid'])>
        <a @class(['navbar-brand']) href="{{ route('home') }}">Navbar</a>
        <button @class(['navbar-toggler']) type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span @class(['navbar-toggler-icon'])></span>
        </button>
        <div @class(['collapse', 'navbar-collapse']) id="navbarNav">
            <ul @class(['navbar-nav'])>
                <li @class(['nav-item'])>
                    <a @class(['nav-link']) href="{{ route('admin-monitor') }}">
                        Monitor
                    </a>
                </li>
            </ul>
            <ul @class(['navbar-nav', 'ms-auto'])>
                <li @class(['nav-item'])>
                    <a @class(['nav-link']) href="{{ route('logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- </Header> -->
