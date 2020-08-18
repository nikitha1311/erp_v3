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

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fleetomata" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fa fa-truck"></i></div>
                    Fleetomata
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="fleetomata" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="/fleetomata/trucks">
                            <div class="sb-nav-link-icon"><i class="fa fa-truck mr-2"></i></div>
                           Truck
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-plus mr-2"></i></div>
                            Receivables
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i></div>
                            Expense Approvals
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#driver" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            <i class="fa fa-id-card mr-2" aria-hidden="true"></i>
                            Driver
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="driver" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-id-card mr-2" aria-hidden="true"></i>Driver
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-university mr-2" aria-hidden="true"></i>
                                    Driver Bank Details
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                    Driver Documents
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reports" aria-expanded="false" aria-controls="pagesCollapseError">
                            <i class="fa fa-flag mr-2" aria-hidden="true"></i>
                            Reports
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="reports" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-bar-chart mr-2" aria-hidden="true"></i>
                                    FF Statement
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-pie-chart mr-2" aria-hidden="true"></i>
                                    Expense Report
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-camera mr-2" aria-hidden="true"></i>
                                    Snapshot Report
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-inr mr-2" aria-hidden="true"></i>
                                    Payment Outstanding
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-map-signs mr-2" aria-hidden="true"></i>
                                    Route Expenses
                                </a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invoice" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fa fa-inr"></i></div>
                    Invoices
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="invoice" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invoice_create" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                            Create
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="invoice_create" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-file mr-2" aria-hidden="true"></i>
                                    Transport Invoice
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-file mr-2" aria-hidden="true"></i>
                                    WSP Invoice
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invoice_list" aria-expanded="false" aria-controls="pagesCollapseError">
                            <i class="fa fa-list-alt mr-2" aria-hidden="true"></i>
                            List
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="invoice_list" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="invoices/all">
                                    <i class="fa fa-list mr-2" aria-hidden="true"></i>
                                    All Invoices
                                </a>
                                <a class="nav-link" href="invoices">
                                    <i class="fa fa-list mr-2" aria-hidden="true"></i>
                                    Transport Invoices
                                </a>
                                <a class="nav-link" href="wsp-invoices">
                                    <i class="fa fa-list mr-2" aria-hidden="true"></i>
                                    WSP Invoices
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment_advice" aria-expanded="false" aria-controls="pagesCollapseError">
                            <i class="fa fa-briefcase mr-2" aria-hidden="true"></i>
                            Payment Advices
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="payment_advice" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                                    Create
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fa fa-list mr-2" aria-hidden="true"></i>
                                    List
                                </a>
                            </nav>
                        </div>
                    </nav>
                </div>

                <a class="nav-link" href="{{ url('/backup')}}">
                    <i class="fa fa-database mr-2" aria-hidden="true"></i>
                    Backups
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ !empty(auth()->user()->name) ? auth()->user()->name:''}}
        </div>
    </nav>
</div>
@endif
