<nav class="navbar navbar-expand-lg px-4 py-3 bg-light">
    <div class="container-fluid">
        <!-- Left-aligned form (optional) -->
        <form action="#" class="d-none d-sm-inline-block me-auto">
            <!-- Add content here if needed -->
        </form>

        <!-- Navbar collapse -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center">
    <h1 class="mb-0">test</h1>
    <!-- Dropdown menu -->
    <li class="nav-item dropdown ms-auto">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('assets/images/account.svg') }}" class="avatar img-fluid rounded-circle" alt="User" style="width: 40px; height: 40px;">
        </a>
        <ul class="dropdown-menu dropdown-menu-end rounded shadow">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger" style="border: none; background: none; padding: 0; margin: 0; color: inherit; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </li>
</ul>


                </li>
            </ul>
        </div>
    </div>
</nav>
