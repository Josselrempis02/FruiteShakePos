<nav class="navbar navbar-expand-lg px-4 py-3 bg-light">
    <div class="container-fluid">
        <!-- Left-aligned form (optional) -->
        <form action="#" class="d-none d-sm-inline-block me-auto">
            <!-- Add content here if needed -->
        </form>

        <!-- Navbar collapse -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center w-100 justify-content-between">
                <h1 class="mb-0 title">Fruit Shake</h1>

                <!-- Display the authenticated user's name and role -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <span class="nav-link text-dark">
                                {{ auth()->user()->name }} 
                                ({{ ucfirst(auth()->user()->role->name) }})
                            </span>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </ul>
        </div>
    </div>
</nav>
