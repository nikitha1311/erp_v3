

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-light topnav-sec">
    <div class="dropdown show">
        <div class="dropdown-menu dropdown-show" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>
    <div class="navbar-brand  topnav-left-part" href="#" role="button" id="dropdownMenuLink"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
        <div class="company-details">
            <a class="company-name" href="#">
                Testing
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <p class="mb-0">Younus Farveaz</p>
        </div>
        <div class="company-symbol ">
            <span>YF</span>
        </div>
    </div>
    

    <div class='topnav-right-part d-flex '>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
            <!-- <svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg> -->
            <i class="fa fa-bars" aria-hidden="true"></i>
            {{-- <h6 class="top-nav-toggle text-dark mb-0">JSM ERP</h6> --}}
            
        </button>
        <!-- Actual search box -->
        <div class="form-group has-search mb-0">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i>
                    {{-- <i class="fa fa-angle-down"></i> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="login.html">Logout</a> --}}
                    
                    <button onclick="document.getElementById('logout-form').submit()"
                            class="btn btn-danger">
                        Logout
                    </button>
                    <form action="{{ url('/logout') }}" id="logout-form" method="post">
                        {!! csrf_field() !!}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

