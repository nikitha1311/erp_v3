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
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fa fa-user mr-2" aria-hidden="true"></i>
                            Users
                        </a>
                    </nav>
                </div>
                <div class="collapse" id="master" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('truck-types.index') }}">
                            <i class="fa fa-truck mr-2" aria-hidden="true"></i>
                            TruckTypes
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Younus Farveaz
        </div>
    </nav>
</div>
