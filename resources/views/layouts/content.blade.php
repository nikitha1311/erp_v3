<div id='layoutSidenav_content'>
    <main>
        <div class='container-fluid topnav-below-section py-3'>
            <div class='row'>
                <div class="col-md-6"> 
                    <div class="d-flex">
                        <a href="#">
                            Vehicle List
                        </a>
                        <span class="text-gray mx-2">/</span>
     
                        <p>UP21BY0890</p>
                    </div>
                </div>
                <div class="col-md-6 text-right"> 
                    <div class="d-flex justify-content-end">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle mx-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                            </a>
                          
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <button class="btn  btn-primary">
                            <i class="fa fa-pencil"></i> Edit
                         </button>    
                    </div>              
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div>
                            
                            <div class="vehicle-pic mr-3">
                                <h3>Hii</h3>
                                <div class='vehicle-pic-edit'>
                                    <i class="fa fa-pencil" ></i>
                                </div>
                            </div>
                            
                        </div>
                        <div class="for-md-view">
                            <h4 class="my-2 my-md-0"><a class="vehicle-num" href="#">UP21BY0890</a></h4>
    
                            <div class='vehicle-details'>
                                <span class="text-gray my-2 my-md-0" data-toggle="tooltip" title="Vehicle Type">Semi truck .</span>
                                <span class="text-gray my-2 my-md-0" data-toggle="tooltip" title="Year Make Model">2016 .</span>
                                <span class="text-gray my-2 my-md-0" data-toggle="tooltip" title="License Plate">UP21BY0890</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center vehicle-editable-details">
                                
                                    <div data-toggle="modal" data-target='#manual_edit_meter' >
                                        <p class="mb-0 my-2 my-md-0" data-toggle='tooltip'  title="Manually Edit Meter reading">
                                            <span>0</span>
                                                mi
                                            <i class="fa fa-pencil" ></i>           
                                        </p>
                                    </div>
                                    
                                
                                <div class="dropdown show" data-toggle="tooltip" title="Update Status">
                                    <a class="btn dropdown-toggle status mx-md-2 my-2 my-md-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <span class='status-signal'></span> Actions
                                    </a>
                                  
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <div data-toggle="modal" data-target='#manual_edit_meter'>
                                    <p class="mb-0 mx-md-2 my-2 my-md-0" data-toggle='tooltip'  title="Edit group">
                                        No Group
                                        <i class="fa fa-pencil"></i>
                                    </p>
                                </div>
                                <div data-toggle="modal"  data-target='#manual_edit_operator'>
                                    <p class="mb-0 mx-md-2 my-2 my-md-0" data-toggle=' tooltip' title="Assign to operators">
                                        unassigned
                                        <i class="fa fa-plus"></i>
                                    </p>
                                </div>    
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="count-box text-center">
                        <p class="type">LHA & GC COUNT</p>

                        <p class="count">0 <span>|</span> 0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid main-section py-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle px-5 w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus mr-2"></i>
                            Quick Add
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>

                     <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="navbar-collapse navbar-ex1-collapse">                        
                        <div class="nav flex-column nav-pills content-side-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <li class="nav-link active menu" id="overview" data-toggle="pill" href="#overview_section" role="tab" 
                                aria-controls="overview_section" aria-selected="true">
                                {{-- <i class="fa fa-fw fa-search"> --}}
                                Overview
                            </li>
                            <li class="nav-link menu" id="lha" data-toggle="collapse" data-target="#lha_submenu">
                                {{-- <i class="fa fa-fw fa-search"> --}}
                                LHAs
                            </li>
                            <ul id="lha_submenu" class="collapse submenu" data-toggle="pill" href="#lha_section" role="tab"
                                aria-controls="lha_section" aria-selected="false">
                                <li>
                                    <a href="#">
                                        LHA 1
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-link menu" id="gc" data-toggle="collapse" data-target="#gc_submenu">
                                {{-- <i class="fa fa-fw fa-search"> --}}
                                GCs
                            </li>
                            <ul id="gc_submenu" class="collapse submenu"  data-toggle="pill" href="#gc_section" role="tab"
                                aria-controls="gc_section" aria-selected="false">
                                <li>
                                    <a href="#">
                                        GC 1
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-link menu" id="remittance" data-toggle="pill" href="#remittance_section" role="tab" 
                                aria-controls="remittance_section" aria-selected="false">
                                {{-- <i class="fa fa-fw fa-search"> --}}
                                Remittance
                            </li>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content content-top-nav" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="overview_section" role="tabpanel" aria-labelledby="overview">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active menu" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
        
                            <div class="tab-content my-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="panel panel-default">
                                                <div class="info-overview-show panel-body">
                                                    <div>
                                                       <img src="/icons/warning-sheild.png" alt='warning-sheild'>
                                                    </div>
                                                    <div class="count mx-2">
                                                        <span class="clr1">36</span>
                                                        <p class="count-info">Incomplete Transaction count</p>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="panel panel-default">
                                                <div class="info-overview-show panel-body">
                                                    <div>
                                                        <img src="/icons/warning-sheild1.png" alt='warning-sheild'>
                                                    </div>
                                                    <div class="count mx-2">
                                                        <span class="clr2">36</span>
                                                        <p class="count-info">Unlinked LHAs count</p>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="panel panel-default">
                                                <div class="info-overview-show panel-body">
                                                    <div>
                                                        <img src="/icons/warning-sheild2.png" alt='warning-sheild'>
                                                    </div>
                                                    <div class="count mx-2">
                                                        <span class="clr3">36</span>
                                                        <p class="count-info">Unlinked GCs count</p>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            <div>
                                                <h6>Waiting For Approval Transactions</h6>
                                            </div>
                                            

                                            <table id="approvalList" class="table no-footer" role="grid"
                                                aria-describedby="approvalsPending_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="approvalsPending" rowspan="1"
                                                                colspan="1" style="width: 60.95px;" aria-label="ID: activate to sort column ascending">
                                                                    ID
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="approvalsPending" rowspan="1" 
                                                                colspan="1" style="width: 97.1667px;" aria-label="Date: activate to sort column ascending">
                                                                Date
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="approvalsPending" rowspan="1"
                                                                colspan="1" style="width: 82.35px;" aria-label="LHA: activate to sort column ascending">
                                                                LHA
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="approvalsPending" rowspan="1"
                                                                colspan="1" style="width: 84.9333px;" aria-label="GC: activate to sort column ascending">
                                                                GC
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="approvalsPending" rowspan="1" 
                                                                colspan="1" style="width: 127.183px;" aria-label="Created By: activate to sort column ascending">
                                                                Created By
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="approvalsPending" rowspan="1"
                                                                colspan="1" style="width: 218.417px;" aria-label="Created At: activate to sort column ascending">
                                                                Created At
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr role="row" class="odd">
                                                            <td>TRN#1</td>
                                                            <td>23-03-2019</td> 
                                                            <td>[]</td> 
                                                            <td>[]</td> 
                                                            <td>Siva</td> 
                                                            <td>Sat, Mar 23, 2019 4:46 PM</td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            helloo  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lha_section" role="tabpanel" aria-labelledby="lha">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active menu" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home 2 </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile 2</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact 2</a>
                                </li>
                            </ul>
        
                            <div class="tab-content my-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            heiii 
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            hmmm  
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            helloo helllo 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gc_section" role="tabpanel" aria-labelledby="gc">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active menu" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
        
                            <div class="tab-content my-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            heyyy 
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            hiiii   
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            helloo  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="remittance_section" role="tabpanel" aria-labelledby="remittance">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active menu" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link menu" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
        
                            <div class="tab-content my-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            heyyy 
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            hiiii   
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="panel panel-default">
                                        <div class=" panel-body">
                                            helloo  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </main>
</div>

<div class="modal fade" id='manual_edit_meter' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id='manual_edit_group' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="manual_edit_operator" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        $('#approvalList').DataTable();
    });
</script>