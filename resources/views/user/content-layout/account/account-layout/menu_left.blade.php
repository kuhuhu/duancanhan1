<div class="col-12 col-xl-3 filter-column">
    <nav class="navbar navbar-expand-xl flex-wrap p-0">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter"
            aria-labelledby="offcanvasNavbarFilterLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title mb-0 fw-bold text-uppercase" id="offcanvasNavbarFilterLabel">Account</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body account-menu">
                <div class="list-group w-100 rounded-0">
                    <a href="{{ route('user.account_dashboard') }}" class="list-group-item "><i
                            class="bi bi-house-door me-2"></i>Dashboard</a>
                    <a href="{{ route('user.account_orders') }}" class="list-group-item"><i
                            class="bi bi-basket3 me-2"></i>Orders</a>
                    <a href="{{ route('user.account_profile') }}" class="list-group-item"><i
                            class="bi bi-person me-2"></i>Profile</a>
                    <a href="{{ route('user.account_edit_profile') }}" class="list-group-item"><i
                            class="bi bi-pencil me-2"></i>Edit Profile</a>
                    <a href="{{ route('user.account_saved_address') }}" class="list-group-item"><i
                            class="bi bi-pin-map me-2"></i>Saved Address</a>
                    <a href="{{ route('user.wishlist') }}" class="list-group-item"><i
                            class="bi bi-suit-heart me-2"></i>Wishlist</a>
                    @if (Session::get('id_account') == 1)
                        <a href="{{route('admin')}}" class="list-group-item"><i class="bi bi-person me-2"></i>Login to Admin</a>
                    @endif
                    <a href="{{ route('user.login') }}" class="list-group-item"><i
                            class="bi bi-power me-2"></i>Logout</a>
                </div>
            </div>
        </div>
    </nav>
</div>
