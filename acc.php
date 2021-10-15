<?php include 'main.php';
include 'function.php';


if (!isset($_SESSION['name'])) {
  header('Location:login.php');
}


$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$accounts = $stmt->fetch();



$stmtAll = $pdo->prepare("SELECT * FROM account_con WHERE id='".$_GET['id']."' limit 1");
$stmtAll->execute();
$accountsAll = $stmtAll->fetch();


$stmtUser = $pdo->prepare("SELECT * FROM accounts WHERE id='".$accountsAll['user_id']."' limit 1");
$stmtUser->execute();
$accountsUser = $stmtUser->fetch();




$total=0;
include 'admin/function.php';
include 'acc_function.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    warter
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style type="text/css">
  body > div > div.container-fluid.mt--7 > div > div > div > div.card-body > table > tbody > tr.bg-primary.text-white > td{

 }
 body > div > div.container-fluid.mt--7 > div > div > div > div.card-body > table > tbody > tr > td{

  padding: 4px 2px;
 }
 .card-body {
  color: #fff;
 }
  #user_data_length > label{
  float: right;
}
#user_data_filter{
  display: none;
}
#user_data_previous > a, #user_data_next > a,#user_data_paginate > ul > li.paginate_button.page-item > a{
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
        <form class="mt-4 mb-3 d-md-none" action="findAccounts.php?id=test">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="text" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link " href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item  active shadow">
            
              <a class="nav-link active " href="#accsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-bullet-list-67 text-red"></i> Accounts </a>
                    <ul class="collapse show list-unstyled mx-3" id="accsubmenu" >
                        <li class="nav-item">
                            <a  class="nav-link" href="findAccounts.php">
                                <i class="fas fa-dot-circle text-primary"></i> Find Accounts </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="viewAllAccounts.php">
                                <i class="fas fa-dot-circle"></i> View All Accounts </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="viewActiveAccounts.php">
                                <i class="fas fa-dot-circle"></i>Active Accounts </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="allAccounts.php">
                                <i class="fas fa-dot-circle"></i> Add New Accounts </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="accountTypes.php">
                                <i class="fas fa-dot-circle"></i>Account Types </a>
                            </a>
                        </li>
                    </ul>

          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#locationsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-square-pin ni text-orange"></i> Location </a>
                    <ul class="collapse list-unstyled mx-3" id="locationsubmenu" >
                        <li class="nav-item">
                            <a  class="nav-link" href="location.php">
                                <i class="fas fa-dot-circle"></i> Create Location </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="postOffice.php">
                                <i class="fas fa-dot-circle"></i> All Post Offices </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> all two </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> all three </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> all streets </a>
                            </a>
                        </li>
                    </ul>

          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#otherInfosubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-info text-blue"></i> Other Info </a>
                    <ul class="collapse list-unstyled mx-3" id="otherInfosubmenu" >
                        <li class="nav-item">
                            <a  class="nav-link" href="tap.php">
                                <i class="fas fa-dot-circle"></i> Tap </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> gs division </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> billing division </a>
                            </a>
                        </li>
                    </ul>

          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users text-yellow"></i> Users </a>
                    <ul class="collapse list-unstyled mx-3" id="homesubmenu" >
                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> Admin </a>
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
            
              <a class="nav-link" href="#reportSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-books text-danger"></i> Reports </a>
                    <ul class="collapse list-unstyled mx-3" id="reportSub" >
                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> Income group </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> Expenses Group </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> All cards </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i>Print Invoice </a>
                            </a>
                        </li>
                    </ul>

          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#incomeSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> Income </a>
                    <ul class="collapse list-unstyled mx-3" id="incomeSub" >
                        <li class="nav-item">
                            <a  class="nav-link" href="income.php">
                                <i class="fas fa-dot-circle"></i>  Income </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="incomeCat.php">
                                <i class="fas fa-dot-circle"></i> Category  </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> Print Bill </a>
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
                                <i class="fas fa-dot-circle"></i>  Expenses </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="expensesCat.php">
                                <i class="fas fa-dot-circle"></i> Category  </a>
                            </a>
                        </li>
                    </ul>

          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#paySub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> card </a>
                    <ul class="collapse list-unstyled mx-3" id="paySub" >
                        <li class="nav-item">
                            <a  class="nav-link" href="cards.php">
                                <i class="fas fa-dot-circle"></i> All card </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> Category card  </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> Print Bill </a>
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
                                <i class="fas fa-dot-circle"></i> Accounts Types </a>
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
                        <li class="nav-item">
                            <a  class="nav-link" href="incomeCatBin.php">
                                <i class="fas fa-dot-circle"></i> Income Category </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="expensesCatBin.php">
                                <i class="fas fa-dot-circle"></i> Expenses Category </a>
                            </a>
                        </li>
                    </ul>

          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#settingsSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-settings-gear-65 text-blue"></i> Settings </a>
                    <ul class="collapse list-unstyled mx-3" id="settingsSub" >
                        <li class="nav-item">
                            <a  class="nav-link" href="monthPlan.php">
                                <i class="fas fa-dot-circle"></i> Monthly plan </a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href="settings.php">
                                <i class="fas fa-dot-circle"></i> Other </a>
                            </a>
                        </li>
                    </ul>

          </li>
          <li class="nav-item">
            <a class="nav-link " href="settings.php">
              
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Dashboard</a>
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


    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">

        <div class="header-body">
          <!-- Card stats -->
          <div class="bg-white p-2">
            <?php 


function balUser1($b){

  include('admin/db.php');
$stmtIn = $pdo->prepare("


SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE  
   income.con_id='".$b."'
UNION ALL
SELECT card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE  
   card.con_id='".$b."'
 ORDER BY created_at


  ");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);
$tTV=0;
foreach ($inC as $keyT) {
    $tTV=$tTV+$keyT['amount'];
}
return $tTV;
}

            if ($accountsUser['image']!='') {
              ?>            <img class="img-thumbnail mr-2" src="admin/upload/<?php echo $accountsUser['image']; ?>" width="150px" style="float: left;">

              <?php
            }

             ?>
            <h2>Full Name : <?php echo $accountsUser['name']; ?></h2>
            <h4>NIC : <?php echo $accountsUser['idno']; ?></h4>
            <h4>Acc Balance : <?php echo number_format(balUser1($_GET['id']),2,",","."); ?></h4>
            <h4>Created at : <?php echo $accountsAll['created_at']; ?></h4>




          </div>
          <div style="clear: both;"></div>
        </div>
      </div>
    </div>



    <div class="container-fluid">

      <div class="row">


        <div class="col-md-12">
          <div class="card bg-gradient-default shadow">

            <div class="card-body">
              <!-- Chart -->


    <div class="">
      <div class="table-responsive">

        <table id="user_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="10%">Description</th>
              <th width="10%">Amount</th>
            </tr>
          </thead>
        </table>
        
      </div>
    </div>



            </div>
          </div>
        </div>








      </div>

      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2021 <!-- <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> -->
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">

              </li>

            </ul>
          </div>
        </div>
      </footer>
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

  <!--   Argon JS   -->
<!--   <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script> -->

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
      url:"admin/fetchAccTr.php",
      type:"POST",
        'data': {
           formName: 'default',
           id: '<?php echo $_GET['id'] ?>',
           // etc..
        }
    },
      dom: 'lBfrtip',

"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],

      buttons: ['copy','csv','excel','pdf','print'],
    "columnDefs":[
      {
        "orderable":false,
      },




    ],


  });

  
  
});
</script>
</body>

</html>