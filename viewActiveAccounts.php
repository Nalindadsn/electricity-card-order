<?php 
include 'main.php';
include 'pr.php';



      include 'function.php';
      include 'dropdown.php';
      $obj = new Dropdown();
      $rows = $obj->fetchOne();
      include 'dropdown1.php';
      $obj1 = new Dropdown1();
      $rows1 = $obj1->fetchOne();




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



 #user_data_length > label{
  float: right;
}

#user_data_previous > a, #user_data_next > a,#user_data_paginate > ul > li.paginate_button.page-item > a{
  width: auto;
  height: auto;
  padding: 10px;
  border-radius: 0 !important;

}
.imgU{
  width: 100px;
  float: left;
  margin-right: 5px;
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
      
          <li class="nav-item   ">
            <a class="nav-link " href="index.php">
              <i class="ni ni-tv-2"></i> Dashboard
            </a>
          </li>


          <li class="nav-item  active ">
            
              <a class="nav-link active" href="#accsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-bullet-list-67 text-red"></i> All Acconts </a>
                    <ul class="collapse list-unstyled mx-3 show" id="accsubmenu" >

                        <li class="nav-item active">
                            <a  class="nav-link" href="viewAllAccounts.php">
                                <i class="fas fa-dot-circle"></i> All Accounts </a>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a  class="nav-link" href="viewActiveAccounts.php">
                                <i class="fas fa-dot-circle text-primary"></i>active Accounts </a>
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
            
              <a class="nav-link" href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users text-yellow"></i> Customers </a>
                    <ul class="collapse list-unstyled mx-3" id="homesubmenu" >



                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> Admins </a>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Accounts</a>
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
              <a href="./profile.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
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
                  <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
<!--               <a id="add_button" class="btn btn-sm btn-neutral">Add Accounts</a>
 -->              
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
              <h3 class="mb-0">Active Accounts</h3>
            </div>
            <div class="card-body" style="min-height: 80vh">
              <div class="row icon-examples">
                <div class="col-lg-12 col-md-12">


    <form method="post" id="acc_form_ass" enctype="multipart/form-data">
      <div class="">

        <div class="">


<!--   <div class="row">

    <div class="col-md-6">
      <label class="form-label" >NIC-</label>
      <input type="text" name="i_id_aV" id="i_id_aV" class="form-control">
      <div id="msg_unit"></div>
    </div>
    <div class="col-md-6"><br>
      <input type="hidden" name="uIDD" id="uIDD" class="form-control" required="">
      <div id="msg_unitA"></div>
    </div>
  </div> -->

  

          
        </div>

      </div>
    </form>
<br>
    <div class="">
      <div class="table-responsive">

        <table id="user_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="10%">Accounts Number </th>
              <th width="10%">meetar Number </th>
              <th width="10%">No of beneficiaries</th>
              <th width="10%">fixed Number</th>
              <th width="10%">mobile Number</th>
              <th width="10%">created at</th>
              <th width="10%">update</th>
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


<div id="userModalA" class="modal fade">
  <div class="modal-dialog   modal-lg">
    <form method="post" id="acc_form_a" enctype="multipart/form-data">
      <div class="modal-content">

      <div class="modal-header border">
        <h4 class="modal-title "> Update Account</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body pt-0">


<div class="">


  <div class="row">

    <div class="col-md-12"><br>
      <div id="userArea"></div>
      <div style="clear: both;"></div>
      <div id="userArea1" style="background-color: #172b4d; margin-top: 3px;"></div>
    </div>
  </div>
  <div class="row">

    <div class="col-md-6">

      <label class="form-label" >categoriesය</label>
<select class="form-control" id="acc_cat_a" name="acc_cat_a">
  <?php foreach (acc_cat() as $key) {
  ?>
  <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
  <?php
  } ?>
</select>


      <label class="form-label" >No of beneficiaries</label>
      <input type="number" name="no_beneficiaries_a" id="no_beneficiaries_a" class="form-control">

    </div>
    <div class="col-md-6">
      <label class="form-label" >fixed Number</label>
      <input type="text" name="phone_fixed_a" id="phone_fixed_a" class="form-control">
      <label class="form-label" >mobile Number</label>
      <input type="text" name="phone_mobile_a" id="phone_mobile_a" class="form-control">
    </div>
  </div>


<hr>
  <div class="row">

    <div class="col-md-6">


      <label class="form-label" >නිවසේ Number</label>
      <input type="text" name="house_no_a" id="house_no_a" class="form-control" placeholder="House No">




    </div>
    <div class="col-md-6">          



      <label class="form-label" >meetar Number</label>
      <input type="text" name="measurement_no_a" id="measurement_no_a" class="form-control form-select-lg mb-3">

    </div>

  </div>



          <br />

                <textarea class="form-control" name="note_a" id="note_a"  placeholder="note_a" ></textarea>
          <br />


          
        </div>
          
        </div>
        <div class="modal-footer">
          <input type="hidden" name="i_id_a" id="i_id_a" />
          <input type="hidden" name="operation_a" id="operation_a" />
          <input type="submit" name="action_a" id="action_a" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- <div id="userModalS" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="acc_form_aS" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Shipped Status</h4>
        </div>
        <div class="modal-body">
          <label>Shipped Status</label>
          <input type="text" name="shippedSt" id="shippedSt">

          <select class="form-control" id="shippedSt" name="shippedSt">
            <option value="0">Not Yet</option>
            <option value="1">Shipped</option>
          </select>


        </div>
        <div class="modal-footer">
          <input type="hidden" name="i_id_aS" id="i_id_aS" />
          <input type="hidden" name="operationS" id="operationS" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Update" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div> -->

  <!--   Core   -->
    <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/settings.js"></script>
  
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


$(document).ready(function() {
});

$(document).ready(function(){

  
  var dataTable = $('#user_data').DataTable({


      "paging": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"admin/fetch_active_accounts.php",
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[0, 3, 4],
        "orderable":false,
      },
    ],

      dom: 'lBfrtip',

      buttons: ['copy','csv','excel','pdf','print'],
    "lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],






  });








  $(document).on('submit', '#acc_form_a', function(event){
    event.preventDefault();
    var acc_cat_a = $('#acc_cat_a').val();
    var no_beneficiaries_a = $('#no_beneficiaries_a').val();
    var card_cat_a = $('#card_cat_a').val();
 
    if(acc_cat_a != '456456' && no_beneficiaries_a != 'hjjkhk')
    {
      $.ajax({
        url:"admin/insert20.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#acc_form_a')[0].reset();
          $('#userModalA').modal('hide');
        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });

  $(document).on('click', '.update', function(){

    $("#userArea").html('');
     $("#userArea1").html('<h4 class="text-white p-2">Account No  : </h4>');



        //$('#userModalA').modal('show');
    $('#userModalA').modal('show');
    var i_id_a = $(this).attr("id");
    $.ajax({
      url:"admin/fetch_single20.php",
      method:"POST",
      data:{i_id_a:i_id_a},
      dataType:"json",
      success:function(data)
      {
        console.log(data)

          $('#erm').text('');
        $('#i_id_a').val(i_id_a);

    $('#measurement_no_a').val(data.measurement_no_a);
    $('#phone_mobile_a').val(data.phone_mobile_a);
    $('#phone_fixed_a').val(data.phone_fixed_a);
    $('#no_beneficiaries_a').val(data.no_beneficiaries_a);
    $('#acc_cat_a').val(data.acc_cat_a);
    $('#card_cat_a').val(data.card_cat_a);
    $('#house_no_a').val(data.house_no_a);
     $('#note_a').val(data.note_a);
        $('#action_a').val("Edit");
        $('#operation_a').val("Edit");
        $('#i_name').focus();
     $("#userArea").html('<span ><img class="imgU" src="admin/upload/'+data.userImg+'"/>FULL NAME : '+data.userN+'</span><br>'+'NIC : '+data.userId+'<br>'+'');
     $("#userArea1").html('<h4 class="text-white p-2">Account No  : '+data.acc_no_a+'</h4>');



      }
    })
  });





  $(document).on('click', '.delete', function(){
    var i_id_a = $(this).attr("id");
    if(confirm("Are you sure you want to disconnect this?"))
    {
      $.ajax({
        url:"admin/deactivate_account.php",
        method:"POST",
        data:{i_id_a:i_id_a},
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