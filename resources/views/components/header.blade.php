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
                @foreach($links as $key=>$link)
                    <li @class(['nav-item'])>
                        <a @class(['nav-link','active' => $link['active']]) href="{{ $link['route'] }}">
                            {{ $link['text'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul @class(['navbar-nav', 'ms-auto'])>
                @guest()
                    <li @class(['nav-item'])>
                        <a @class(['nav-link', 'active' => Request::routeIs('login') ?? false]) href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endguest
                @auth()
                    <li @class(['nav-item', 'dropdown'])>
                        <a @class(['nav-link', 'dropdown-toggle']) href="#"
                           data-bs-toggle="dropdown">
                            {{ $user['first_name'] }} {{ StringUtility::abbreviation($user['last_name'])}}
                        </a>
                        <ul @class(['dropdown-menu', 'dropdown-menu-end'])>
                            <li>
                                <a @class(['dropdown-item']) href="{{ route('logout') }}">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- </Header> -->
