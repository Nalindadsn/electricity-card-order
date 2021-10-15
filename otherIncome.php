<?php
include 'main.php';

include 'pr.php';
if (pr($prArray[90])==1 ) {

}else{
  header('location:index.php');
}

$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$accounts = $stmt->fetch();

if(isset($_GET['id'])){

$stmtcat = $pdo->prepare("SELECT * FROM incategory WHERE id='".$_GET['id']."'");
$stmtcat->execute();
$inCatFromGet = $stmtcat->fetch();
}
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
 #msg_unit{
  margin-top: 5px;
 } 
 #msg_unit > table > thead.thead-dark > tr > th{
  padding-top: 4px;
  padding-bottom: 4px;
 }
 #msg_unit > table > thead > tr > td{
  padding-top: 4px;
  padding-bottom: 4px;
 }      

#user_data_previous > a, #user_data_next > a,#user_data_paginate > ul > li.paginate_button.page-item > a{
  width: auto;
  height: auto;
  padding: 10px;
  border-radius: 0 !important;

}

.sidebar-nav{
  padding: 0;
}  

.sidebar-nav li{
    list-style: none;
    padding-left: 5px;
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
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#reportSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-books text-danger"></i> වාර්තා </a>
                    <ul class="collapse list-unstyled mx-3" id="reportSub" >


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
                                <i class="fas fa-dot-circle"></i> expenses වාර්තා </a>
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

          <li class="nav-item  active shadow">
            
              <a class="nav-link active" href="#incomeSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> ආදායම් </a>
                    <ul class="collapse show list-unstyled mx-3" id="incomeSub" >

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
        <i class="fas fa-dot-circle text-primary"></i> Other ආදායම්   </a>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">monthly consumption</a>
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
                  <li class="breadcrumb-item"><a href="#">monthly consumption</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
<!--               <a id="add_button" class="btn btn-sm btn-neutral">Add monthly consumption</a>
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
              <h3 class="mb-0">මාසික පාරිභෝජනය</h3>
            </div>
            <div class="card-body" style="min-height: 80vh">
              <div class="row icon-examples">
                <div class="col-lg-3 col-md-3">
                    

      <ul class="sidebar-nav">
<?php 

$stmtcat = $pdo->prepare("SELECT * FROM `incategory` WHERE id!=1");
$stmtcat->execute();
$resultcat = $stmtcat->fetchAll();

if (isset($_GET['id'])) {
?>
<?php
foreach ($resultcat as $value) {
if ($value['id']==$_GET['id']) {

    ?>
        <li class=" sidebar-brand bg-primary  py-1 my-1">
          <a class="text-white" href="otherIncome.php?id=<?php echo $value['id']; ?>">
              <?php echo $value['name']; ?>
          </a>
        </li>

<?php
}else{


    ?>
        <li class=" sidebar-brand bg-secondary py-1 my-1">
          <a href="otherIncome.php?id=<?php echo $value['id']; ?>">
              <?php echo $value['name']; ?>
          </a>
        </li>

<?php

}

}
 ?>
<?php
}else{
?>
<?php
foreach ($resultcat as $value) {

    ?>
        <li class=" sidebar-brand bg-secondary py-1 my-1">
          <a href="otherIncome.php?id=<?php echo $value['id']; ?>">
              <?php echo $value['name']; ?>
          </a>
        </li>

<?php
}
 ?>
<?php

}
?>
</ul>



                </div>
                <div class="col-lg-9 col-md-9">
<?php 
if (isset($_GET['id'])) {
?>

<h1 style="font-size:35px; text-transform: uppercase;" class="text-primary float-right"><?php echo $inCatFromGet['name']; ?></h1>


<?php
}
 ?>
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="">

        <div class="">
          <label>Accounts Number *</label>
          <input type="text" name="category" id="category" class="form-control" autocomplete="off" >
            <div id="msg" style="height:50px"></div>

  <div class="row">
    <div class="col">

          <label>ඒකක ප්‍රමානය *</label>
      <input type="number"  name="noUnit" id="noUnit" class="form-control"  placeholder="ඒකක ප්‍රමානය *" value="1">
                <div id="msg_unit" class="text-danger"></div>
    </div>
    <div class="col">  
    <div class="row">
        <div class="col">
            <label>categoriesය *</label>
      <select class="form-control"  name="acc_typeN" id="acc_typeN">
        <option value="" selected>select income type</option>

<?php 

$stmtcat = $pdo->prepare("SELECT * FROM `incategory` WHERE id!=1");
$stmtcat->execute();
$resultcat = $stmtcat->fetchAll();

foreach ($resultcat as $value) {
    echo "<option value='".$value['id']."'>".$value['name']."</option>";
}
 ?>

          
      </select>

                <div id="msg_cat" class="text-danger"></div>
            
        </div>
        <div class="col">          
            <label>Account Typesය *</label>
            <input type="text"  name="acc_type" id="acc_type" class="form-control" disabled />
        </div>
        
    </div>        

    </div>

  </div>

          <br>
          <label>ඒකකයක මිල</label>
          <input type="number" step="0.01" name="unitPrice" id="unitPrice" class="form-control" />

                <div id="msg_pr" class="text-danger"></div>
          <br>
          <label>මුදල</label>
          <input type="number" step="0.01" name="last_name" id="last_name" class="form-control" readonly="readonly" />
          
          <br />

                <textarea class="form-control" name="first_name" id="first_name"  placeholder="Other" ></textarea>
          <br />
          
        </div>
        <div class="">
          <input type="hidden" name="i_id" id="i_id"  />
          <input type="hidden" name="operation" id="operation" value="Add" /><br>
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <a href="income.php" class="btn btn-success float-right" id="refreshBtn">Add New</a>
                <span class="loader" style="display: none;">
                    <img src="img/abc.gif" alt="" style="width: 50px;height:50px;">
                </span>
                <span id="erm"></span>

        </div>
      </div>
    </form>

    <form method="post" id="user_form_b" enctype="multipart/form-data">
      <div class="">

        <div class="">
          <label>Account No</label>
          <input type="text" name="category_b" id="category_b" class="form-control" autocomplete="off" >
            <div id="msg_b" style="height:50px"></div>

  <div class="row">
    <div class="col">          
      <input type="text"  name="acc_type_b" id="acc_type_b" class="form-control" disabled />

    </div>
    <div class="col">
      <input type="number"  name="noUnit_b" id="noUnit_b" class="form-control"  placeholder="noUnit">
                <div id="msg_unit_b" style=""></div>
    </div>

  </div>

          <br>
          <label>Amount</label>
          <input type="number" step="0.01" name="last_name_b" id="last_name_b" class="form-control" />
          
          <br />

                <textarea class="form-control" name="first_name_b" id="first_name_b"  placeholder="Note" ></textarea>
          <br />
          
        </div>
        <div class="">
          <input type="hidden" name="i_id_b" id="i_id_b"  />
          <input type="hidden" name="operation_b" id="operation_b" value="Edit" /><br>
          <input type="submit" name="action_b" id="action_b" class="btn btn-success" value="Add" />
          <input type="button" id="addForm" class="btn btn-success float-right" value="Add New" >


        </div>
      </div>
    </form>
<br>                <span class="loader_b" style="display: none;">
                    <img src="img/abc.gif" alt="" style="width: 50px;height:50px;">
                </span>
                <span id="erm_b"></span>


<input type="button" id="addForm1" class="btn btn-success float-right" value="Add New" >






    <div class="">
      <div class="table-responsive">

        <table id="user_data" class="table table-bordered table-striped">
          <thead>
            <tr>
                            <th width="10%">Transaction ID</th>

              <th width="10%">මුනු Number</th>
              <th width="10%">පාරිභෝගික විස්තරය</th>
              <th width="10%">categoriesය</th>
              <th width="10%">මුදල</th>
              <th width="10%">වටිනාකම</th>
              <th width="10%">Other</th>
              <th width="10%">created at</th>
              <th width="10%">update</th>
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




$(document).ready(function() {

  $("#action").attr("disabled", true);

        $('#refreshBtn').hide();
$('#user_form_b').hide();
$('#addForm1').hide();
$('#category').focus();

  
// $('#noUnit').focusin(
//   function(){

//   $("#action").attr("disabled", true);
//   }).focusout(
//   function(){

//   $("#action").attr("disabled", false);
//   }
//   )


  $('#addForm').click(function(){

        $('#addForm1').hide();
        $('#user_form_b').hide();
        $('#user_form').show();
  });
  


  $('#addForm1').click(function(){

        $('#user_form_b').hide();
        $('#user_form').show();
$('#addForm1').hide();
  });

  
  


$("#category").blur(function(e) {
    var uname = $(this).val();
    if (uname == "")
    {
        $("#msg").html("");
        $("#action").attr("disabled", true);
    }
    else
    {
        $("#msg").html("checking...");
        $.ajax({
            url: "ajaxfile.php",
            data: {username: uname},
            type: "POST",
            dataType:"json",
            success: function(data) {
              // console.log(data)
                if(data.count > 0) {
                  if (data.bal>=0) {
                    $("#msg").html('<div><span  class="badge badge-success float-right"> Account Balance : '+data.bal+'</span>'+' <span>Full Name : '+data.un+'</span> <br> <span>NIC : '+data.usn+'</span><span  class="badge badge-primary">Accounts :'+data.noAcc+' </span>&nbsp;&nbsp;Meter Board : '+data.meter+'<br>'+'</div>');

                    // $("#acc_typeN").val(data.acc_type)
                    $("#acc_type").val(data.acc_typeV)
                    $("#last_name").val('0')
                    $("#noUnit").val('1')
                    $("#msg_unit").html("");

                  }else{

                    $("#msg").html('<div><span   class="badge badge-danger float-right">Account Balance : LKR '+data.bal+'</span>'+' <span">Full Name : '+data.un+'</span><br>  <span>NIC : '+data.usn+'</span> <span  class="badge badge-primary">Accounts :'+data.noAcc+' </span>&nbsp;&nbsp;Meter Board : '+data.meter+'<br>'+'</div>');

                    $("#acc_type").val(data.acc_typeV)
                    $("#last_name").val('0')
                    $("#noUnit").val('')
                    $("#msg_unit").html("");

                                      }
                    $("#action").attr("disabled", false);
                  
                } else {
                    $("#msg").html('<span class="text-danger">Account is not available!</span>');
                    $("#action").attr("disabled", true);
                }
            }
        });
    }
});
});

$(document).ready(function() {
$("#noUnit").blur(function(e) {
    var uNV=$("#noUnit").val()
    if (uNV == "")
    {
        $("#msg_unit").html("Please fill this");
    }
    else{
        $("#last_name").val($("#noUnit").val()*$("#unitPrice").val())
        $("#msg_unit").html("");
    }

});
$("#acc_typeN").blur(function(e) {
    var uNV=$("#acc_typeN").val()
    if (uNV == "")
    {
        $("#msg_cat").html("Please select");
    }
    else{
        $("#msg_cat").html("");
    }

});
$("#unitPrice").blur(function(e) {
    var uNV=$("#unitPrice").val()
    if (uNV == "")
    {
        $("#msg_pr").html("Please fill this");
    }
    else{
        $("#last_name").val($("#noUnit").val()*$("#unitPrice").val())
        $("#msg_pr").html("");
    }

});
});



$(document).ready(function(){









<?php 

if (isset($_GET['id'])) { ?>
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
      url:"admin/fetch_income_2_1.php",
      type:"POST",
        'data': {
           formName: 'default',
           actionE: '<?php echo $_GET['id'] ?>',
           // etc..
        }
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

<?php
}else{
    ?>

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
      url:"admin/fetch_income_2.php",
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


    <?php
}
 ?>
  






  $(document).on('submit', '#user_form', function(event){

    event.preventDefault();

    var firstName = $('#first_name').val();
    var lastName = $('#last_name').val();
    var category = $('#category').val();
    var noUnit = $('#noUnit').val();
    var acc_typeN = $('#acc_typeN').val();
    var unitPrice = $('#unitPrice').val();


 
    if(lastName != '' && noUnit != '' && acc_typeN != '' && unitPrice!='')
    {
      $.ajax({
        url:"admin/insert10_2.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
            beforeSend:function(){
                $('.loader').show();
            },
        success:function(data)
        {
          $('#erm').text('');
          $('#erm').text(data);
          $('#user_form')[0].reset();
                    $("#msg").html('');

                    $("#msg_unit").html("");
          dataTable.ajax.reload();

                $('.loader').hide();


        $("#msg_unit").html("");

        $("#msg_pr").html("");

        $("#msg_cat").html("");

        }
      });
    }
    else
    {



        if ($('#noUnit').val()=='') {

        $("#msg_unit").html("Please fill this");

        }
        if ($('#unitPrice').val()=='') {

        $("#msg_pr").html("Please fill this");

        }
        if ($('#acc_typeN').val()=='') {

        $("#msg_cat").html("Please select");

        }

      // alert("Required");
    }
  });
  



  $(document).on('submit', '#user_form_b', function(event){
    event.preventDefault();
    var firstName = $('#first_name_b').val();
    var lastName = $('#last_name_b').val();
    var category = $('#category_b').val();
    var noUnit_b = $('#noUnit_b').val();
 


    if(lastName != '')
    {
      $.ajax({
        url:"admin/insert10_2.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
            beforeSend:function(){
                $('.loader_b').show();
            },
        success:function(data)
        {
          $('#erm_b').text('');
          $('#erm_b').text(data);
          $('#user_form_b')[0].reset();
                    $("#msg_b").html('');

                    $("#msg_unit_b").html("");
          dataTable.ajax.reload();

                $('.loader_b').hide();
          $('#user_form_b').hide();

$('#addForm1').show();

        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });
  

  $(document).on('click', '.update', function(){
    var i_id = $(this).attr("id");


    $.ajax({
      url:"admin/fetch_single25.php",
      method:"POST",
      data:{i_id:i_id},
      dataType:"json",
      success:function(data)
      {
        console.log(data)          
        $('#erm_b').text('');

/* $("#msg").html('<div><span  class="badge badge-success float-right"> Account Balance : </span>'+' <span>Full Name : '+data.un+'</span> <br> <span>Username : </span><span  class="badge badge-primary">Accounts : </span>&nbsp;&nbsp;Meter Board : '+data.meter+'<br>'+'</div>');
*/
                  if (data.bal>=0) {
                    $("#msg").html('<div><span  class="badge badge-success float-right"> Account Balance : '+data.bal+'</span>'+' <span>Full Name : '+data.un+'</span> <br> <span>Username : </span><span  class="badge badge-primary">Accounts :'+data.noAcc+' </span>&nbsp;&nbsp;Meter Board : '+data.meter+'<br>'+'</div>');

                    $("#acc_type").val(data.acc_typeV)
                    $("#last_name").val('0')
                    $("#noUnit").val('')
                    $("#msg_unit").html("");

                  }else{

                    $("#msg").html('<div><span   class="badge badge-danger float-right">Account Balance : LKR '+data.bal+'</span>'+' <span">Full Name : '+data.un+'</span><br>  <span>Username : </span> <span  class="badge badge-primary">Accounts :'+data.noAcc+' </span>&nbsp;&nbsp;Meter Board : '+data.meter+'<br>'+'</div>');

                    $("#acc_type").val(data.acc_typeV)
                    $("#last_name").val('0')
                    $("#noUnit").val('')
                    $("#msg_unit").html("");

                                      }


        //$('#user_form').hide();
        $('#user_form').show();
        $('#refreshBtn').show();
        $('#first_name').val(data.first_name);
        $('#acc_typeN').val(data.first_name);
        $('#unitPrice').val(data.last_name/data.noUnit);
        $('#category').val(data.con_id);
        $('#noUnit').val(data.noUnit);
        // $('#status').val(data.status);
        $('#i_id').val(i_id);
        $('#action').val("Edit");
        $('#operation').val("Edit");

        $("#action").attr("disabled", false);
        $('#noUnit').focus();
        $('#last_name').focus();

      }
    })
  });
  




  $(document).on('click', '.delete', function(){
    var user_id = $(this).attr("id");
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        url:"admin/delete.php",
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