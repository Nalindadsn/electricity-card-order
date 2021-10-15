<?php
include 'main.php';

include 'pr.php';
if (pr($prArray[22])==1 ) {

}else{
  header('location:index.php');
}
?><?php 
include ('function_report.php');

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
    
      .loader{
        display: none;
      }
#user_data_previous > a, #user_data_next > a,#user_data_paginate > ul > li.paginate_button.page-item.active > a{
  width: auto;
  height: auto;
  padding: 10px;
  border-radius: 0 !important;

}
#sidebar-wrapper\ m-0 > ul{
  margin: 0;
  padding: 0;
  
}
#sidebar-wrapper\ m-0 > ul > li{
  list-style: none;
  
}
#user_data_length > label{
  float: right;
}
#navbarNavDropdown > ul > li > a{
  color: #ccc;
}  

#navbarNavDropdown > ul > li > .active{
  color: #fff;
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
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

<?php if (pr($prArray[1])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#accsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-bullet-list-67 text-red"></i> Accounts විස්තර </a>
                    <ul class="collapse list-unstyled mx-3" id="accsubmenu" >

<?php if (pr($prArray[2])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="viewAllAccounts.php">
                                <i class="fas fa-dot-circle"></i> All Accounts </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[3])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="viewActiveAccounts.php">
                                <i class="fas fa-dot-circle"></i>active Accounts </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[4])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="allAccounts.php">
                                <i class="fas fa-dot-circle"></i> new Accounts </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[5])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="accountTypes.php">
                                <i class="fas fa-dot-circle"></i>Account Types </a>
                            </a>
                        </li>
<?php } ?>
<!--                         <li class="nav-item">
                            <a  class="nav-link" href="printAcc.php">
                                <i class="fas fa-dot-circle"></i>Print Bill </a>
                            </a>
                        </li> -->
                    </ul>

          </li>

<?php } ?>


<?php if (pr($prArray[6])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#locationsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-square-pin ni text-orange"></i> ලිපිනය </a>
                    <ul class="collapse list-unstyled mx-3" id="locationsubmenu" >

<?php if (pr($prArray[7])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="location.php">
                                <i class="fas fa-dot-circle"></i> සාරාංශය </a>
                            </a>
                        </li>

<?php } ?>
<?php if (pr($prArray[8])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="postOffice.php">
                                <i class="fas fa-dot-circle"></i>  තැපැල් කාර්යාල </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[9])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="areas.php">
                                <i class="fas fa-dot-circle"></i>  ප්‍රදේශ </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[10])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="villages.php">
                                <i class="fas fa-dot-circle"></i>  ගම් </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[11])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="street.php">
                                <i class="fas fa-dot-circle"></i>  මාර්ග </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>


<?php } ?>


<?php if (pr($prArray[12])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#otherInfosubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-info text-blue"></i> Other විස්තර </a>
                    <ul class="collapse list-unstyled mx-3" id="otherInfosubmenu" >

<?php if (pr($prArray[13])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="allOther.php">
                                <i class="fas fa-dot-circle"></i> සාරාංශය </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[14])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="tap.php">
                                <i class="fas fa-dot-circle"></i> කරාම </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[15])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="gsDivision.php">
                                <i class="fas fa-dot-circle"></i> ග්‍රාම නිලධාරි වසම් </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[16])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="billingDivision.php">
                                <i class="fas fa-dot-circle"></i> බිල් කලාපය </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>

<?php } ?>

<?php if (pr($prArray[17])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users text-yellow"></i> පරිශීලකයන් </a>
                    <ul class="collapse list-unstyled mx-3" id="homesubmenu" >



<?php if (pr($prArray[18])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> Admins </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[19])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> Customers </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>
<?php } ?>
<?php if (pr($prArray[20])==1) { ?>
          <li class="nav-item  active shadow">
            
              <a class="nav-link" href="#reportSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-books text-danger"></i> වාර්තා </a>
                    <ul class="collapse show list-unstyled mx-3" id="reportSub" >


<?php if (pr($prArray[21])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="incomeReport.php">
                                <i class="fas fa-dot-circle"></i> ආදායම් වාර්තා </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[22])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="expensesReport.php">
                                <i class="fas fa-dot-circle text-primary"></i> expenses වාර්තා </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[23])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="paymentReport.php">
                                <i class="fas fa-dot-circle"></i>  ගෙවීම් වාර්තා </a>
                            </a>
                        </li>
<?php } ?>
<!--                         <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i>Print Invoice </a>
                            </a>
                        </li> -->
                    </ul>

          </li>

<?php } ?>
<?php if (pr($prArray[24])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#incomeSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> ආදායම් </a>
                    <ul class="collapse list-unstyled mx-3" id="incomeSub" >

<?php if (pr($prArray[25])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="income.php">
                                <i class="fas fa-dot-circle"></i>  ආදායම් </a>
                            </a>
                        </li>
<?php } ?>


<?php if (pr($prArray[26])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="incomeCat.php">
                                <i class="fas fa-dot-circle"></i> ආදායම් categories  </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[90])==1) { ?>

<li class="nav-item">
    <a  class="nav-link" href="otherIncome.php">
        <i class="fas fa-dot-circle "></i> Other ආදායම්   </a>
    </a>
</li>
<?php } ?>


                    </ul>

          </li>
<?php } ?>
<?php if (pr($prArray[27])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#expSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> expenses </a>
                    <ul class="collapse list-unstyled mx-3" id="expSub" >

<?php if (pr($prArray[28])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="expenses.php">
                                <i class="fas fa-dot-circle"></i>  expenses </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[29])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="expensesCat.php">
                                <i class="fas fa-dot-circle"></i> expenses categories </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>
<?php } ?>
<?php if (pr($prArray[30])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#paySub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> ගෙවීම් </a>
                    <ul class="collapse list-unstyled mx-3" id="paySub" >

<?php if (pr($prArray[31])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="payments.php">
                                <i class="fas fa-dot-circle"></i> ගෙවීම්  </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[32])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="paymentTypes.php">
                                <i class="fas fa-dot-circle"></i> ගෙවීම් ක්‍රම  </a>
                            </a>
                        </li>
<?php } ?>


                    </ul>

          </li>
<?php } ?>

<?php if (pr($prArray[33])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#binSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-trash text-red"></i> බඳුන </a>
                    <ul class="collapse list-unstyled mx-3" id="binSub" >


<?php if (pr($prArray[34])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="accountsBin.php">
                                <i class="fas fa-dot-circle"></i> Accounts </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[35])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="accountTypesBin.php">
                                <i class="fas fa-dot-circle"></i> Account Types </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[36])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="adminsBin.php">
                                <i class="fas fa-dot-circle"></i> Admins  </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[37])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="usersBin.php">
                                <i class="fas fa-dot-circle"></i> Customers </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[38])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="incomeCatBin.php">
                                <i class="fas fa-dot-circle"></i> ආදායම් categories </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[39])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="expensesCatBin.php">
                                <i class="fas fa-dot-circle"></i> expenses categories </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>

<?php } ?>
<?php if (pr($prArray[40])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#settingsSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-settings-gear-65 text-blue"></i> සැකසුම් </a>
                    <ul class="collapse list-unstyled mx-3" id="settingsSub" >

<?php if (pr($prArray[41])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="monthPlan.php">
                                <i class="fas fa-dot-circle"></i> මාසික සැලසුම් </a>
                            </a>
                        </li>
<?php } ?>


<?php if (pr($prArray[42])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="viewPrivilege.php">
                                <i class="fas fa-dot-circle"></i> වරප්‍රසාද 
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[43])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="settings.php">
                                <i class="fas fa-dot-circle"></i> Other </a>
                            </a>
                        </li>
<?php } ?>


                    </ul>

          </li>
<?php } ?>


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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Income -  <?php  if (!isset($_GET['year'])) {
                      echo date('Y');
                    }else{
                      echo $_GET['year'];
                    } ?>
                      
                    </a>
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
              <a href="./myPrivilege.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>My Privileges</span>
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
                  <li class="breadcrumb-item"><a href="#">Income</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
             <!--  <a id="add_button" class="btn btn-sm btn-neutral">Add Expenses</a> -->
              
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
              <h3 class="mb-0">expenses වාර්තාව</h3>
            </div>
            <div class="card-body" style="min-height: 80vh">
              <div class="row icon-examples">
 
                <div class="col-lg-12 col-md-12" style="margin-top:-20px">


<br>

                <div class="loader">
                    <img src="img/abc.gif" alt="" style="width: 50px;height:50px;">
                </div>
<div id="erm"></div>
    <div class="">
<nav class="navbar navbar-expand-lg p-1  navbar-dark bg-dark" style="overflow: auto;">
  <div class="container-fluid " style="padding-left: 0 !important;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">



<?php  

foreach (yearsL() as $v) {
  if (!isset($_GET['year'])) {
if (date('Y')==$v['year']) {
    ?>

        <li class="nav-item  ">
          <a class="nav-link active" href="expensesReport.php?year=<?php 
           echo $v['year']; ?>"><?php 
           echo $v['year']; ?></a>
        </li>
    <?php
 }else{
?>

<?php

 } }else{

if ($_GET['year']==$v['year']) {
    ?>

        <li class="nav-item">
          <a class="nav-link active" href="expensesReport.php?year=<?php 
           echo $v['year']; ?>"><?php  echo $v['year']; ?></a>
        </li>

    <?php
  }else{
    ?>



    <?php
  }
  }
?>


<?php
}
  ?>


      </ul>
    </div>
  </div>
</nav>
<div>

  <ul>
  <?php
if (isset($_GET['year'])) {
  # code...
   
   foreach (expensesCat($_GET['year']) as $key) {
     echo "<li>".getExCatR($key['cat_id']).'<span class="badge bg-dark text-white ml-3">LKR '.$key['amount'].'</span>'."</li>";
   }
}else{
   foreach (expensesCat(date('Y')) as $key) {
     echo "<li>".getExCatR($key['cat_id']).'<span class="badge bg-dark text-white ml-3">LKR '.$key['amount'].'</span>'."</li>";
   }

} ?></ul>
</div>
<nav class="navbar navbar-expand-lg p-1  navbar-dark bg-dark" style="overflow: auto;">
  <div class="container-fluid " style="padding-left: 0 !important;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">



<?php  

foreach (yearsL() as $v) {
  if (!isset($_GET['year'])) {
if (date('Y')==$v['year']) {
    ?>

        <li class="nav-item  ">
          <a class="nav-link active" href="expensesReport.php?year=<?php 
           echo $v['year']; ?>"><?php 
           echo $v['year']; ?></a>
        </li>
    <?php
 }else{
?>
        <li class="nav-item">
          <a class="nav-link" href="expensesReport.php?year=<?php 
           echo $v['year']; ?>"><?php 
           echo $v['year']; ?></a>
        </li>
<?php

 } }else{

if ($_GET['year']==$v['year']) {
    ?>

        <li class="nav-item">
          <a class="nav-link active" href="expensesReport.php?year=<?php 
           echo $v['year']; ?>"><?php  echo $v['year']; ?></a>
        </li>

    <?php
  }else{
    ?>

        <li class="nav-item">
          <a class="nav-link" href="expensesReport.php?year=<?php 
           echo $v['year']; ?>"><?php  echo $v['year']; ?></a>
        </li>

    <?php
  }
  }
?>


<?php
}
  ?>


      </ul>
    </div>
  </div>
</nav>
      <div class="table-responsive">

        <table id="user_data" class="table align-items-center table-dark table-flush">
          <thead>
            <tr>
              <th width="10%">name</th>
              <th width="10%" align="center"><span class="float-right">amount</span></th>
            </tr>
          </thead>
          <tbody>

<?php  

  if (!isset($_GET['year'])) {
    foreach (expenses(date('Y')) as $v) {
    ?>

            <tr>
              <th width="10%"><?php   echo $v['Month']; ?><a href="expensesDay.php?day=<?php echo $v['MonthN'] ?>&year=<?php echo $v['MonthY'] ?>" class="btn btn-sm btn-white ml-3">VIEW</a></th>
              <th width="10%"><span class="float-right"><?php   echo number_format($v['amount'],2,",","."); ?></span></th>
            </tr>
<?php   }
  }else{
foreach (expenses($_GET['year']) as $v) {
    ?>

            <tr>
              <th width="10%"><?php   echo $v['Month']; ?><a href="expensesDay.php?day=<?php echo $v['MonthN'] ?>&year=<?php echo $v['MonthY'] ?>" class="btn btn-sm btn-white ml-3">VIEW</a></th>
              <th width="10%"><span class="float-right"><?php   echo number_format($v['amount'],2,",","."); ?></span></th>
            </tr>
<?php   }} ?>

          </tbody>
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




<div id="userModalS" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_formS" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Shipped Status</h4>
        </div>
        <div class="modal-body">
          <label>Shipped Status</label>
         <!--  <input type="text" name="shippedSt" id="shippedSt"> -->

          <select class="form-control" id="shippedSt" name="shippedSt">
            <option value="0">Not Yet</option>
            <option value="1">Shipped</option>
          </select>


        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_idS" id="user_idS" />
          <input type="hidden" name="operationS" id="operationS" />
          <input type="submit" name="action" id="action1" class="btn btn-success" value="Update" />
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



</body>

</html>