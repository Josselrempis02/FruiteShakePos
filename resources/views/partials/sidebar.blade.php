<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="{{ route('staff.dashboard') }}">FruitShake</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <!-- Dashboard -->
        <li class="sidebar-item">
            <a href="{{ route('staff.dashboard') }}" class="sidebar-link">
                <i class="lni lni-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- POS -->
        <li class="sidebar-item">
            <a href="{{ route('staff.pos') }}" class="sidebar-link">
                <i class="lni lni-cart"></i>
                <span>POS</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('products.index') }}" class="sidebar-link">
                <i class="fas fa-box"></i>
                <span>Product</span>
            </a>
        </li>


        <!-- Inventory -->
        <li class="sidebar-item">
            <a href="{{ route('inventory.index') }}" class="sidebar-link">
                <i class="lni lni-package"></i>
                <span>Inventory</span>
            </a>
        </li>



        <!-- Staff -->
        <li class="sidebar-item">
            <a href="{{ route('staff.index') }}" class="sidebar-link">
                <i class="lni lni-users"></i>
                <span>Staff</span>
            </a>
        </li>

        <!-- Reports -->
        <li class="sidebar-item">
            <a href="{{ route('staff.report') }}" class="sidebar-link">
                <i class="lni lni-stats-up"></i>
                <span>Reports</span>
            </a>
        </li>

        <!-- Receipts -->
        <li class="sidebar-item">
            <a href="{{ route('staff.receipt') }}" class="sidebar-link">
                <i class="lni lni-book"></i> <!-- Fallback icon -->
                <span>Receipts</span>
            </a>
        </li>
        <!-- Cash
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="lni lni-wallet"></i>
                <span>Cash</span>
            </a>
        </li> -->
    </ul>
</aside>



         <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li> -->
