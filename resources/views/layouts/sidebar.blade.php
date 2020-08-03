@if (!empty(auth()->user()->name))
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-tachometer"></i>
                    </div>
                    Dashboard
                </a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-asterisk" aria-hidden="true"></i></div>
                    Master
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('users.index')}}">
                            <i class="fa fa-user-o mr-2" aria-hidden="true"></i>
                            Users
                        </a>
                        <a class="nav-link" href="{{ route('customers.index')}}">
                            <i class="fa fa-users mr-2" aria-hidden="true"></i>
                            Customers
                        </a>
                        <a class="nav-link" href="{{ route('truck-types.index') }}">
                            <i class="fa fa-truck mr-2" aria-hidden="true"></i>
                            TruckTypes
                        </a>
                        <a class="nav-link" href="{{ route('branches.index') }}">
                            <i class="fa fa-truck mr-2" aria-hidden="true"></i>
                            Branch
                        </a>
                        <a class="nav-link" href="{{ route('vendors.index') }}">
                            <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>
                            Vendors
                        </a>
                        <a class="nav-link" href="{{ route('locations.index') }}">
                            <i class="fa fa-map-marker mr-2" aria-hidden="true"></i>
                            Locations
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transactions" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-envelope" aria-hidden="true">
                        </i>
                    </div>
                    Transactions
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fa fa-angle-down">
                        </i>
                    </div>
                </a>
                <div class="collapse" id="transactions" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('transactions.create') }}">
                            <i class="fa fa-file mr-2" aria-hidden="true"></i>
                            Create
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fa fa-list mr-2" aria-hidden="true"></i>
                            List
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>
                            Rate Pending
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>
                            Unbilled
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ !empty(auth()->user()->name) ? auth()->user()->name:''}}
        </div>
    </nav>
</div>
@endif
