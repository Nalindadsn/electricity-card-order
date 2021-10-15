<?php
include 'main.php';

include 'pr.php';

$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$accounts = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Admin
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />





  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style type="text/css">
    
#user_data_previous > a, #user_data_next > a,#user_data_paginate > ul > li.paginate_button.page-item.active > a{
  width: auto;
  height: auto;
  padding: 10px;
  border-radius: 0 !important;

}

  </style>
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="index.php">
        <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="profile.php" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>

            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.php">
                <img src="assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <!-- Navigation -->
        <ul class="navbar-nav">
          
                   <li class="nav-item  active ">
            <a class="nav-link " href="index.php">
              <i class="ni ni-tv-2 "></i> Dashboard
            </a>
          </li>


          <li class="nav-item  active ">
            
              <a class="nav-link" href="#accsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-bullet-list-67 text-red"></i> All Acconts </a>
                    <ul class="collapse list-unstyled mx-3" id="accsubmenu" >

                        <li class="nav-item">
                            <a  class="nav-link" href="viewAllAccounts.php">
                                <i class="fas fa-dot-circle"></i> All Accounts </a>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a  class="nav-link" href="viewActiveAccounts.php">
                                <i class="fas fa-dot-circle"></i>active Accounts </a>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a  class="nav-link" href="allAccounts.php">
                                <i class="fas fa-dot-circle"></i> new Accounts </a>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a  class="nav-link" href="accountTypes.php">
                                <i class="fas fa-dot-circle"></i>Account Types </a>
                            </a>
                        </li>
<!--                         <li class="nav-item">
                            <a  class="nav-link" href="printAcc.php">
                                <i class="fas fa-dot-circle"></i>Print Bill </a>
                            </a>
                        </li> -->
                    </ul>

          </li>






          <li class="nav-item  active ">
            
              <a class="nav-link active" href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users text-yellow"></i> Customers </a>
                    <ul class="collapse list-unstyled mx-3 show" id="homesubmenu" >



                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle text-primary"></i> Admins </a>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> Customers </a>
                            </a>
                        </li>

                    </ul>

          </li>


          <li class="nav-item  active ">
            
              <a class="nav-link" href="#expSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> Expenses </a>
                    <ul class="collapse list-unstyled mx-3" id="expSub" >




                        <li class="nav-item">
                            <a  class="nav-link" href="expenses.php">
                                <i class="fas fa-dot-circle"></i>  expenses </a>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a  class="nav-link" href="expensesCat.php">
                                <i class="fas fa-dot-circle"></i> expenses categories </a>
                            </a>
                        </li>

                    </ul>

          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#paySub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> Order card </a>
                    <ul class="collapse list-unstyled mx-3" id="paySub" >


 
                        <li class="nav-item">
                            <a  class="nav-link" href="cards.php">
                                <i class="fas fa-dot-circle"></i> cards  </a>
                            </a>
                        </li>

                    </ul>

          </li>


          <li class="nav-item  active ">
            
              <a class="nav-link" href="#binSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-trash text-red"></i> Bin </a>
                    <ul class="collapse list-unstyled mx-3" id="binSub" >





                        <li class="nav-item">
                            <a  class="nav-link" href="accountsBin.php">
                                <i class="fas fa-dot-circle"></i> Accounts </a>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a  class="nav-link" href="accountTypesBin.php">
                                <i class="fas fa-dot-circle"></i> Account Types </a>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a  class="nav-link" href="adminsBin.php">
                                <i class="fas fa-dot-circle"></i> Admins  </a>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a  class="nav-link" href="usersBin.php">
                                <i class="fas fa-dot-circle"></i> Customers </a>
                            </a>
                        </li>

                    </ul>

          </li>


          <li class="nav-item  active ">
            
              <a class="nav-link" href="#settingsSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-settings-gear-65 text-blue"></i> Settings </a>
                    <ul class="collapse list-unstyled mx-3" id="settingsSub" >


                        <li class="nav-item">
                            <a  class="nav-link" href="settings.php">
                                <i class="fas fa-dot-circle"></i> Other </a>
                            </a>
                        </li>


                    </ul>

          </li>


        </ul>

<!-- sidenav end -->
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">ADMINS</a>
        <!-- Form -->
        <form method="GET" action="findAccounts.php" class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
          <input type="text" name="id" id="search" class="form-control " placeholder="Search..." autocomplete="off" required>  
<div style="padding-left: 50px; position: absolute;width: 100%;top: 50px;">
     <div class="" style="">
        <div class="list-group rounded-0 " id="show-list">
          <!-- Here autocomplete list will be display -->
        </div>
      </div>
    
</div>          
      </div>
          </div>
        </form>



        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">

<?php 
if($accounts['image']==""){

 ?>
                <span class="avatar avatar-sm " style="width:45px;height: 45px; background-color: #fff;background:url('img/user-profile.png');background-size: cover;">
                </span>

  <?php
}else{

?>
                <span class="avatar avatar-sm " style="width:45px;height: 45px; background-color: #fff;background:url('admin/upload/<?php echo $accounts['image'] ?>');background-size: cover;">
                </span>
<?php

}

?>

                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">

<?php echo $accounts['username']; ?>

                    
                  </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="./profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>

              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" id="add_button" class="btn btn-sm btn-neutral">Add New Admin</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Admins</h3>
            </div>
            <div class="card-body" style="min-height: 80vh">
              <div class="row icon-examples">
                <div class="col-lg-12 col-md-12">


    <div class="">
      <div class="table-responsive">

        <table id="user_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="10%">photo</th>
              <th width="15%">nic front</th>
              <th width="15%">nic back</th>
              <th width="15%">Signature</th>
              <th width="35%">Username</th>
<!--               <th width="35%">First Name</th>
              <th width="35%">Last Name</th> 
              <th width="35%">Delivered</th> -->
              <th width="35%">Status</th>
              <th width="35%">Update</th>
              <!-- <th width="10%">Status</th> -->
              <th width="10%">Delete</th>
            </tr>
          </thead>
        </table>
        
      </div>
    </div>



                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              
            </div>
          </div>

        </div>
      </footer>
    </div>
  </div>


<div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <label>Enter Salutation</label>
          <select  name="salutation" id="salutation" class="form-control">
          <option>Rev</option>
          <option>Mr</option>
          <option>Ms</option>
          <option>Other</option>
          </select>
          <br />
          <label>Enter Nick Name</label>
          <input type="text" name="username" id="username" class="form-control" />
          <br />
          <label>Enter Full Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control" />
          <br />
          <label>Enter NIC</label>
          <input type="text" name="last_name" id="last_name" class="form-control" />
          <div id="msg_unit"></div>
          <br />
          <label>Enter Password</label>
          <input type="text" name="password" id="password" class="form-control" />
          <br />
          <label>Confirm Password</label>
          <input type="text" name="confirm_password" id="confirm_password" class="form-control" />
          <br />
          <label>Activate User</label>
          <select class="form-control" id="status" name="status">
            <option value="activated">Yes</option>
            <option value="">No</option>
          </select>
          <br />
          <div style="display:none">

          <label>Select User Image</label>
          <input type="file" name="user_image" id="user_image" />
          <span id="user_uploaded_image"></span>
          </div>
        </div>
        <div class="modal-footer">
        <!-- <input id="hidden_user_image" name="hidden_user_image" value="test"> -->
          <input type="hidden" name="user_id" id="user_id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

  <!--   Core   -->
    <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/settings.js"></script>
  
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/clipboard/dist/clipboard.min.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.2"></script>





<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script type="text/javascript">
   $(document).ready(function () {
  // Send Search Text to the server
  $("#search").keyup(function (event) {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "ajax.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
            if (response=='<p class="list-group-item border-0 rounded-0 bg-danger text-white ">No NIC</p>') {

          $("#show-list").html(response);
      }else{

          $("#show-list").html(response);



      }

        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", ".a_list", function () {
    $("#search").val($(this).text());
    $("#search").focus();
    $("#show-list").html("");
  });
});
</script>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){

$("#last_name").blur(function(e) {
    var uname = $("#last_name").val();
    if (uname == "")
    {
        $("#msg_unit").html("Please fill account ID");
        $("#action").attr("disabled", true);
    }
    else
    {
        $("#msg_unit").html("checking...");
        $.ajax({
            url: "ajaxfile_acc.php",
            data: {username: uname},
            type: "POST",
            dataType:"json",
            success: function(data) {
               console.log(data)
               //var a=parseInt()

                  if ($('#action').val()=='Add') {
                if(data.count > 0) {

                
                    $("#msg_unit").html('<span class="text-danger">Already Account!</span>');

                    $("#action").attr("disabled", true);
                  
                } else {

                    $("#msg_unit").html('<span class="text-success">NIC is  available!</span>');

                    $("#action").attr("disabled", false);
                }
                    
                  }else{

                if(data.count > 0) {
                    $("#action").attr("disabled", false);
                    $("#msg_unit").html('<span class="text-success">NIC is  available!</span>');
                  }else{
                    $("#action").attr("disabled", true);
                    $("#msg_unit").html('<span class="text-danger">No Account available!</span>');

                  }
                  }
            }
        });
    }
});



       $('* :not([a])').each(function(){
       var k =  parseInt($(this).css('font-size')); 
       var redSize = ((k*100)/100) ; //here, you can give the percentage( now it is reduced to 90%)
           $(this).css('font-size',redSize);  

       });
});


$(document).ready(function(){
  $('#add_button').click(function(){

        $("#msg_unit").html("");
    $('#userModal').modal("show");
    $('#user_form')[0].reset();
    $('.modal-title').text("Add User");
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#user_uploaded_image').html('');
  });
  
  var dataTable = $('#user_data').DataTable({


      "paging": true,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"admin/fetch_admin.php",
      type:"POST"
    },
      dom: 'Bfrtip',

"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],

      buttons: ['copy','csv','excel','pdf','print'],
    "columnDefs":[
      {
        "targets":[0, 3, 4],
        "orderable":false,
      },




    ],





  });























  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var username = $('#username').val();
    var salutation = $('#salutation').val();
    var firstName = $('#first_name').val();
    var lastName = $('#last_name').val();
    var status = $('#status').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    var extension = $('#user_image').val().split('.').pop().toLowerCase();


if ($('#action').val()=='Edit') {
  

    if(extension != '')
    {
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#user_image').val('');
        return false;
      }
    } 
    if(firstName != '' && lastName != '' )
    {
    if (password != confirm_password) {
      alert('Password and Confirm Password doesnt match!');
    }else{
    
      $.ajax({
        url:"admin/insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          dataTable.ajax.reload();
        }
      });

    }
    }
    else
    {
      alert("Missing Required Fields!");
    }
}else{

    if(extension != '')
    {
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#user_image').val('');
        return false;
      }
    } 
    else if(firstName != '' && lastName != '' && password !='' && confirm_password !='')
    {
    if (password != confirm_password) {
      alert('Password and Confirm Password doesnt match!');
    }else{
      $.ajax({
        url:"admin/insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          dataTable.ajax.reload();
        }
      });

    }
    }
    else
    {
      alert("Missing Required Fields!");
    } 
}

  });
  







  $(document).on('click', '.update', function(){
    var user_id = $(this).attr("id");
    $.ajax({
      url:"admin/fetch_single.php",
      method:"POST",
      data:{user_id:user_id},
      dataType:"json",
      success:function(data)
      {
        console.log(data)
        $('#userModal').modal('show');
        $('#username').val(data.username);
        $('#salutation').val(data.salutation);
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#status').val(data.status);
        $('.modal-title').text("Edit User");
        $('#user_id').val(user_id);
        $('#user_uploaded_image').html(data.user_image);
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });
  





  $(document).on('click', '.delete', function(){
    var user_id = $(this).attr("id");
    if(confirm("Are you sure you want to deactivate this?"))
    {
      $.ajax({
        url:"admin/deactivate_customer.php",
        method:"POST",
        data:{user_id:user_id},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      return false; 
    }
  });
  
  
  
});
</script>


</body>

</html>