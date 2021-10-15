<?php include 'main.php';
include 'function.php';


if (!isset($_SESSION['name'])) {
  header('Location:login.php');
}
$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$accounts = $stmt->fetch();
$total=0;
include 'admin/function.php';
include 'pr.php';


$inVT=$inVL=0;
//income 
foreach (incomeThisM() as $key) {
  $inVT= $key['amount'];

}
foreach (incomeLastM() as $key) {
  $inVL= $key['amount'];
}
if ($inVL==0) {
  $prv="--.--";
}else{

$prv=round(($inVT-$inVL)/$inVL*100,2);
}

//no acc
$accT= activeAccThisM();
$accL= activeAccLastM();

if ($accL==0) {
  $prvAcc="--.--";
}else{


$prvAcc=round(($accT-$accL)/$accL*100,2);
}

$exT=  expensesThisM();
$exL=  expensesLastM();

if ($exL==0) {
  $prvEx="--.--";
}else{


$prvEx=round(($exT-$exL)/$exL*100,2);
}
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
              <span class="avatar avatar-sm ">
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
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link active" href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

<?php if (pr($prArray[1])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#accsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-bullet-list-67 text-red"></i> All Acconts </a>
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
                    <i class="ni ni-square-pin ni text-orange"></i> Locations </a>
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
                    <i class="fas fa-info text-blue"></i> Other Details</a>
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
                    <i class="fas fa-users text-yellow"></i> Customers </a>
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
                    <i class="ni ni-books text-danger"></i> Reports </a>
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

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#incomeSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> Income </a>
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
                    <i class="ni ni-align-left-2 text-blue"></i> Expenses </a>
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
                    <i class="ni ni-align-left-2 text-blue"></i> Payments </a>
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
                    <i class="fa fa-trash text-red"></i> Bin </a>
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
                    <i class="ni ni-settings-gear-65 text-blue"></i> Settings </a>
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


    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Income</h5>
                      <span class="h2 font-weight-bold mb-0"><?php 


echo income()
                        ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <?php  if ($prv>=0) { ?>
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 
                     <?php echo $prv; ?>%
                   </span>
                      <?php
                    }else{
                      ?>
                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> 
                     <?php echo $prv; ?>%
                   </span>

                      <?php
                    }
                    ?>

                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Balance</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo bal(); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-clock"></i> </span>
                    <span class="text-nowrap"><?php  echo date('D / d -M -Y') ?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"> Accounts</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo activeAcc() ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>


                  <p class="mt-3 mb-0 text-muted text-sm">
                    <?php  if ($prvAcc>=0) { ?>
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 
                     <?php echo $prvAcc; ?>%
                   </span>
                      <?php
                    }else{
                      ?>
                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> 
                     <?php echo $prvAcc; ?>%
                   </span>

                      <?php
                    }
                    ?>






                    <span class="text-nowrap">Since last month</span>
                  </p>



                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">expenses</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo expenses() ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">



                    <?php  if ($prvEx>=0) { ?>
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 
                     <?php echo $prvEx; ?>%
                   </span>
                      <?php
                    }else{
                      ?>
                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> 
                     <?php echo $prvEx; ?>%
                   </span>

                      <?php
                    }
                    ?>



                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container-fluid mt--7 bg-white">




<div class="row bg-white">

   
</div>

      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <h2 class="text-white mb-0">INCOME</h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[<?php 
            foreach( monthWiseIncome() as $key => $row) {
                   echo "'".$row['amount']."', "; // you can also use $row if you don't use keys                  
            }
          ?>]}]}}' data-prefix="" data-suffix="">
<!--                       <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a> -->
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[<?php 
            foreach( monthWiseIncome() as $key => $row) {
                   echo "'".$row['amount']."', "; // you can also use $row if you don't use keys                  
            }
          ?>]}]}}' data-prefix="" data-suffix="">
<!--                       <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                         <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span> 
                      </a> -->
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales" class="chart-canvas"></canvas>
              </div>




            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Accounts</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-orders" class="chart-canvas"></canvas>
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
  
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->

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

  <script type="text/javascript">
    


'use strict';

var Datepicker = (function() {

  // Variables

  var $datepicker = $('.datepicker');


  // Methods

  function init($this) {
    var options = {
      disableTouchKeyboard: true,
      autoclose: false
    };

    $this.datepicker(options);
  }


  // Events

  if ($datepicker.length) {
    $datepicker.each(function() {
      init($(this));
    });
  }

})();

//
// Icon code copy/paste
//

'use strict';

var CopyIcon = (function() {

  // Variables

  var $element = '.btn-icon-clipboard',
    $btn = $($element);


  // Methods

  function init($this) {
    $this.tooltip().on('mouseleave', function() {
      // Explicitly hide tooltip, since after clicking it remains
      // focused (as it's a button), so tooltip would otherwise
      // remain visible until focus is moved away
      $this.tooltip('hide');
    });

    var clipboard = new ClipboardJS($element);

    clipboard.on('success', function(e) {
      $(e.trigger)
        .attr('title', 'Copied!')
        .tooltip('_fixTitle')
        .tooltip('show')
        .attr('title', 'Copy to clipboard')
        .tooltip('_fixTitle')

      e.clearSelection()
    });
  }


  // Events
  if ($btn.length) {
    init($btn);
  }

})();

//
// Form control
//

'use strict';

var FormControl = (function() {

  // Variables

  var $input = $('.form-control');


  // Methods

  function init($this) {
    $this.on('focus blur', function(e) {
      $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');
  }


  // Events

  if ($input.length) {
    init($input);
  }

})();

//
// Google maps
//

var $map = $('#map-canvas'),
  map,
  lat,
  lng,
  color = "#5e72e4";

function initMap() {

  map = document.getElementById('map-canvas');
  lat = map.getAttribute('data-lat');
  lng = map.getAttribute('data-lng');

  var myLatlng = new google.maps.LatLng(lat, lng);
  var mapOptions = {
    zoom: 12,
    scrollwheel: false,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{
      "featureType": "administrative",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#444444"
      }]
    }, {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [{
        "color": "#f2f2f2"
      }]
    }, {
      "featureType": "poi",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "road",
      "elementType": "all",
      "stylers": [{
        "saturation": -100
      }, {
        "lightness": 45
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "all",
      "stylers": [{
        "visibility": "simplified"
      }]
    }, {
      "featureType": "road.arterial",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "transit",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "water",
      "elementType": "all",
      "stylers": [{
        "color": color
      }, {
        "visibility": "on"
      }]
    }]
  }

  map = new google.maps.Map(map, mapOptions);

  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    animation: google.maps.Animation.DROP,
    title: 'Hello World!'
  });

  var contentString = '<div class="info-window-content"><h2>Argon Dashboard</h2>' +
    '<p>A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</p></div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });
}

if ($map.length) {
  google.maps.event.addDomListener(window, 'load', initMap);
}

// //
// // Headroom - show/hide navbar on scroll
// //
//
// 'use strict';
//
// var Headroom = (function() {
//
//  // Variables
//
//  var $headroom = $('#navbar-main');
//
//
//  // Methods
//
//  function init($this) {
//
//     var headroom = new Headroom(document.querySelector("#navbar-main"), {
//         offset: 300,
//         tolerance: {
//             up: 30,
//             down: 30
//         },
//     });
//
//
//
//  // Events
//
//  if ($headroom.length) {
//    headroom.init();
//  }
//
// })();

//
// Navbar
//

'use strict';

var Navbar = (function() {

  // Variables

  var $nav = $('.navbar-nav, .navbar-nav .nav');
  var $collapse = $('.navbar .collapse');
  var $dropdown = $('.navbar .dropdown');

  // Methods

  function accordion($this) {
    $this.closest($nav).find($collapse).not($this).collapse('hide');
  }

  function closeDropdown($this) {
    var $dropdownMenu = $this.find('.dropdown-menu');

    $dropdownMenu.addClass('close');

    setTimeout(function() {
      $dropdownMenu.removeClass('close');
    }, 200);
  }


  // Events

  $collapse.on({
    'show.bs.collapse': function() {
      accordion($(this));
    }
  })

  $dropdown.on({
    'hide.bs.dropdown': function() {
      closeDropdown($(this));
    }
  })

})();


//
// Navbar collapse
//


var NavbarCollapse = (function() {

  // Variables

  var $nav = $('.navbar-nav'),
    $collapse = $('.navbar .collapse');


  // Methods

  function hideNavbarCollapse($this) {
    $this.addClass('collapsing-out');
  }

  function hiddenNavbarCollapse($this) {
    $this.removeClass('collapsing-out');
  }


  // Events

  if ($collapse.length) {
    $collapse.on({
      'hide.bs.collapse': function() {
        hideNavbarCollapse($collapse);
      }
    })

    $collapse.on({
      'hidden.bs.collapse': function() {
        hiddenNavbarCollapse($collapse);
      }
    })
  }

})();

//
// Form control
//

'use strict';

var noUiSlider = (function() {

  // Variables

  // var $sliderContainer = $('.input-slider-container'),
  //    $slider = $('.input-slider'),
  //    $sliderId = $slider.attr('id'),
  //    $sliderMinValue = $slider.data('range-value-min');
  //    $sliderMaxValue = $slider.data('range-value-max');;


  // // Methods
  //
  // function init($this) {
  //  $this.on('focus blur', function(e) {
  //       $this.parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
  //   }).trigger('blur');
  // }
  //
  //
  // // Events
  //
  // if ($input.length) {
  //  init($input);
  // }



  if ($(".input-slider-container")[0]) {
    $('.input-slider-container').each(function() {

      var slider = $(this).find('.input-slider');
      var sliderId = slider.attr('id');
      var minValue = slider.data('range-value-min');
      var maxValue = slider.data('range-value-max');

      var sliderValue = $(this).find('.range-slider-value');
      var sliderValueId = sliderValue.attr('id');
      var startValue = sliderValue.data('range-value-low');

      var c = document.getElementById(sliderId),
        d = document.getElementById(sliderValueId);

      noUiSlider.create(c, {
        start: [parseInt(startValue)],
        connect: [true, false],
        //step: 1000,
        range: {
          'min': [parseInt(minValue)],
          'max': [parseInt(maxValue)]
        }
      });

      c.noUiSlider.on('update', function(a, b) {
        d.textContent = a[b];
      });
    })
  }

  if ($("#input-slider-range")[0]) {
    var c = document.getElementById("input-slider-range"),
      d = document.getElementById("input-slider-range-value-low"),
      e = document.getElementById("input-slider-range-value-high"),
      f = [d, e];

    noUiSlider.create(c, {
      start: [parseInt(d.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
      connect: !0,
      range: {
        min: parseInt(c.getAttribute('data-range-value-min')),
        max: parseInt(c.getAttribute('data-range-value-max'))
      }
    }), c.noUiSlider.on("update", function(a, b) {
      f[b].textContent = a[b]
    })
  }

})();

//
// Popover
//

'use strict';

var Popover = (function() {

  // Variables

  var $popover = $('[data-toggle="popover"]'),
    $popoverClass = '';


  // Methods

  function init($this) {
    if ($this.data('color')) {
      $popoverClass = 'popover-' + $this.data('color');
    }

    var options = {
      trigger: 'focus',
      template: '<div class="popover ' + $popoverClass + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
    };

    $this.popover(options);
  }


  // Events

  if ($popover.length) {
    $popover.each(function() {
      init($(this));
    });
  }

})();

//
// Scroll to (anchor links)
//

'use strict';

var ScrollTo = (function() {

  //
  // Variables
  //

  var $scrollTo = $('.scroll-me, [data-scroll-to], .toc-entry a');


  //
  // Methods
  //

  function scrollTo($this) {
    var $el = $this.attr('href');
    var offset = $this.data('scroll-to-offset') ? $this.data('scroll-to-offset') : 0;
    var options = {
      scrollTop: $($el).offset().top - offset
    };

    // Animate scroll to the selected section
    $('html, body').stop(true, true).animate(options, 600);

    event.preventDefault();
  }


  //
  // Events
  //

  if ($scrollTo.length) {
    $scrollTo.on('click', function(event) {
      scrollTo($(this));
    });
  }

})();

//
// Tooltip
//

'use strict';

var Tooltip = (function() {

  // Variables

  var $tooltip = $('[data-toggle="tooltip"]');


  // Methods

  function init() {
    $tooltip.tooltip();
  }


  // Events

  if ($tooltip.length) {
    init();
  }

})();

//
// Charts
//

'use strict';

var Charts = (function() {

  // Variable

  var $toggle = $('[data-toggle="chart"]');
  var mode = 'light'; //(themeMode) ? themeMode : 'light';
  var fonts = {
    base: 'Open Sans'
  }

  // Colors
  var colors = {
    gray: {
      100: '#f6f9fc',
      200: '#e9ecef',
      300: '#dee2e6',
      400: '#ced4da',
      500: '#adb5bd',
      600: '#8898aa',
      700: '#525f7f',
      800: '#32325d',
      900: '#212529'
    },
    theme: {
      'default': '#172b4d',
      'primary': '#5e72e4',
      'secondary': '#f4f5f7',
      'info': '#11cdef',
      'success': '#2dce89',
      'danger': '#f5365c',
      'warning': '#fb6340'
    },
    black: '#12263F',
    white: '#FFFFFF',
    transparent: 'transparent',
  };


  // Methods

  // Chart.js global options
  function chartOptions() {

    // Options
    var options = {
      defaults: {
        global: {
          responsive: true,
          maintainAspectRatio: false,
          defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
          defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
          defaultFontFamily: fonts.base,
          defaultFontSize: 13,
          layout: {
            padding: 0
          },
          legend: {
            display: false,
            position: 'bottom',
            labels: {
              usePointStyle: true,
              padding: 16
            }
          },
          elements: {
            point: {
              radius: 0,
              backgroundColor: colors.theme['primary']
            },
            line: {
              tension: .4,
              borderWidth: 4,
              borderColor: colors.theme['primary'],
              backgroundColor: colors.transparent,
              borderCapStyle: 'rounded'
            },
            rectangle: {
              backgroundColor: colors.theme['warning']
            },
            arc: {
              backgroundColor: colors.theme['primary'],
              borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
              borderWidth: 4
            }
          },
          tooltips: {
            enabled: false,
            mode: 'index',
            intersect: false,
            custom: function(model) {

              // Get tooltip
              var $tooltip = $('#chart-tooltip');

              // Create tooltip on first render
              if (!$tooltip.length) {
                $tooltip = $('<div id="chart-tooltip" class="popover bs-popover-top" role="tooltip"></div>');

                // Append to body
                $('body').append($tooltip);
              }

              // Hide if no tooltip
              if (model.opacity === 0) {
                $tooltip.css('display', 'none');
                return;
              }

              function getBody(bodyItem) {
                return bodyItem.lines;
              }

              // Fill with content
              if (model.body) {
                var titleLines = model.title || [];
                var bodyLines = model.body.map(getBody);
                var html = '';

                // Add arrow
                html += '<div class="arrow"></div>';

                // Add header
                titleLines.forEach(function(title) {
                  html += '<h3 class="popover-header text-center">' + title + '</h3>';
                });

                // Add body
                bodyLines.forEach(function(body, i) {
                  var colors = model.labelColors[i];
                  var styles = 'background-color: ' + colors.backgroundColor;
                  var indicator = '<span class="badge badge-dot"><i class="bg-primary"></i></span>';
                  var align = (bodyLines.length > 1) ? 'justify-content-left' : 'justify-content-center';
                  html += '<div class="popover-body d-flex align-items-center ' + align + '">' + indicator + body + '</div>';
                });

                $tooltip.html(html);
              }

              // Get tooltip position
              var $canvas = $(this._chart.canvas);

              var canvasWidth = $canvas.outerWidth();
              var canvasHeight = $canvas.outerHeight();

              var canvasTop = $canvas.offset().top;
              var canvasLeft = $canvas.offset().left;

              var tooltipWidth = $tooltip.outerWidth();
              var tooltipHeight = $tooltip.outerHeight();

              var top = canvasTop + model.caretY - tooltipHeight - 16;
              var left = canvasLeft + model.caretX - tooltipWidth / 2;

              // Display tooltip
              $tooltip.css({
                'top': top + 'px',
                'left': left + 'px',
                'display': 'block',
                'z-index': '100'
              });

            },
            callbacks: {
              label: function(item, data) {
                var label = data.datasets[item.datasetIndex].label || '';
                var yLabel = item.yLabel;
                var content = '';

                if (data.datasets.length > 1) {
                  content += '<span class="badge badge-primary mr-auto">' + label + '</span>';
                }

                content += '<span class="popover-body-value">' + yLabel + '</span>';
                return content;
              }
            }
          }
        },
        doughnut: {
          cutoutPercentage: 83,
          tooltips: {
            callbacks: {
              title: function(item, data) {
                var title = data.labels[item[0].index];
                return title;
              },
              label: function(item, data) {
                var value = data.datasets[0].data[item.index];
                var content = '';

                content += '<span class="popover-body-value">' + value + '</span>';
                return content;
              }
            }
          },
          legendCallback: function(chart) {
            var data = chart.data;
            var content = '';

            data.labels.forEach(function(label, index) {
              var bgColor = data.datasets[0].backgroundColor[index];

              content += '<span class="chart-legend-item">';
              content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
              content += label;
              content += '</span>';
            });

            return content;
          }
        }
      }
    }

    // yAxes
    Chart.scaleService.updateScaleDefaults('linear', {
      gridLines: {
        borderDash: [2],
        borderDashOffset: [2],
        color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
        drawBorder: false,
        drawTicks: false,
        lineWidth: 0,
        zeroLineWidth: 0,
        zeroLineColor: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
        zeroLineBorderDash: [2],
        zeroLineBorderDashOffset: [2]
      },
      ticks: {
        beginAtZero: true,
        padding: 10,
        callback: function(value) {
          if (!(value % 10)) {
            return value
          }
        }
      }
    });

    // xAxes
    Chart.scaleService.updateScaleDefaults('category', {
      gridLines: {
        drawBorder: false,
        drawOnChartArea: false,
        drawTicks: false
      },
      ticks: {
        padding: 20
      },
      maxBarThickness: 10
    });

    return options;

  }

  // Parse global options
  function parseOptions(parent, options) {
    for (var item in options) {
      if (typeof options[item] !== 'object') {
        parent[item] = options[item];
      } else {
        parseOptions(parent[item], options[item]);
      }
    }
  }

  // Push options
  function pushOptions(parent, options) {
    for (var item in options) {
      if (Array.isArray(options[item])) {
        options[item].forEach(function(data) {
          parent[item].push(data);
        });
      } else {
        pushOptions(parent[item], options[item]);
      }
    }
  }

  // Pop options
  function popOptions(parent, options) {
    for (var item in options) {
      if (Array.isArray(options[item])) {
        options[item].forEach(function(data) {
          parent[item].pop();
        });
      } else {
        popOptions(parent[item], options[item]);
      }
    }
  }

  // Toggle options
  function toggleOptions(elem) {
    var options = elem.data('add');
    var $target = $(elem.data('target'));
    var $chart = $target.data('chart');

    if (elem.is(':checked')) {

      // Add options
      pushOptions($chart, options);

      // Update chart
      $chart.update();
    } else {

      // Remove options
      popOptions($chart, options);

      // Update chart
      $chart.update();
    }
  }

  // Update options
  function updateOptions(elem) {
    var options = elem.data('update');
    var $target = $(elem.data('target'));
    var $chart = $target.data('chart');

    // Parse options
    parseOptions($chart, options);

    // Toggle ticks
    toggleTicks(elem, $chart);

    // Update chart
    $chart.update();
  }

  // Toggle ticks
  function toggleTicks(elem, $chart) {

    if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
      var prefix = elem.data('prefix') ? elem.data('prefix') : '';
      var suffix = elem.data('suffix') ? elem.data('suffix') : '';

      // Update ticks
      $chart.options.scales.yAxes[0].ticks.callback = function(value) {
        if (!(value % 10)) {
          return prefix + value + suffix;
        }
      }

      // Update tooltips
      $chart.options.tooltips.callbacks.label = function(item, data) {
        var label = data.datasets[item.datasetIndex].label || '';
        var yLabel = item.yLabel;
        var content = '';

        if (data.datasets.length > 1) {
          content += '<span class="popover-body-label mr-auto">' + label + '</span>';
        }

        content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
        return content;
      }

    }
  }


  // Events

  // Parse global options
  if (window.Chart) {
    parseOptions(Chart, chartOptions());
  }

  // Toggle options
  $toggle.on({
    'change': function() {
      var $this = $(this);

      if ($this.is('[data-add]')) {
        toggleOptions($this);
      }
    },
    'click': function() {
      var $this = $(this);

      if ($this.is('[data-update]')) {
        updateOptions($this);
      }
    }
  });


  // Return

  return {
    colors: colors,
    fonts: fonts,
    mode: mode
  };

})();

//
// Orders chart
//

var OrdersChart = (function() {

  //
  // Variables
  //

  var $chart = $('#chart-orders');
  var $ordersSelect = $('[name="ordersSelect"]');


  //
  // Methods
  //

  // Init chart
  function initChart($chart) {

    // Create chart
    var ordersChart = new Chart($chart, {
      type: 'bar',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: '#dfe2e6',
              zeroLineColor: '#dfe2e6'
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  //return '$' + value + 'k'
                  return value
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">' + yLabel + '</span>';

              return content;
            }
          }
        }
      },
      data: {
        labels: [<?php 
            foreach( monthWiseAcc() as $key => $row) {
                   echo "'".$row['Month']."', "; // you can also use $row if you don't use keys                  
            }
          ?>],
        datasets: [{
          label: 'Sales',
          data: [<?php 
            foreach( monthWiseAcc() as $key => $row) {
                   echo "'".$row['rowV']."', "; // you can also use $row if you don't use keys                  
            }
          ?>]
        }]
      }
    });

    // Save to jQuery object
    $chart.data('chart', ordersChart);
  }


  // Init chart
  if ($chart.length) {
    initChart($chart);
  }

})();

//
// Charts
//

'use strict';

//
// Sales chart
//

var SalesChart = (function() {

  // Variables

  var $chart = $('#chart-sales');


  // Methods

  function init($chart) {

    var salesChart = new Chart($chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: Charts.colors.gray[900],
              zeroLineColor: Charts.colors.gray[900]
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  return 'LKR ' + value + '';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';
              console.log(data)

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">LKR ' + yLabel + '</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: [<?php 
            foreach( monthWiseIncome() as $key => $row) {
                   echo "'".$row['Month']."', "; // you can also use $row if you don't use keys                  
            }
          ?>],
        datasets: [{
          label: 'Performance',
          data: [<?php 
            foreach( monthWiseIncome() as $key => $row) {
                   echo "'".$row['amount']."', "; // you can also use $row if you don't use keys                  
            }
          ?>]
        }]
      }
    });

    // Save to jQuery object

    $chart.data('chart', salesChart);

  };


  // Events

  if ($chart.length) {
    init($chart);
  }

})();

  </script>
<!--   <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script> -->
</body>

</html>