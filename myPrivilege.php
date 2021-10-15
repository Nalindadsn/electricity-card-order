<?php 
include 'main.php';
include 'pr.php';

if (pr($prArray[0])==1 || pr($prArray[42])==1) {

}else{
  header('location:index.php');
}
?>

<?php
$stmtAll = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."' limit 1");
$stmtAll->execute();
$accountsAll = $stmtAll->fetch();
 ?>

<?php 

 ?>

<?php 

      include 'function.php';
      include 'dropdown.php';
      $obj = new Dropdown();
      $rows = $obj->fetchOne();
      include 'dropdown1.php';
      $obj1 = new Dropdown1();
      $rows1 = $obj1->fetchOne();
      
 ?>
 <?php 

function gv($gt,$n,$c){

  include('admin/db.php');
  $statement = $pdo->prepare("SELECT * FROM user_privilege WHERE user_id='".$gt."' AND requirement_id='".$n."'");
  $statement->execute();
  $result = $statement->fetchAll();
  
  if ($statement->rowCount()>0) {
    echo "class='selectedv $c' disabled";
  }else{
    echo "class=' $c' ";
  }

}
  //echo $_SESSION['id'];
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
.cl{
  margin-left: {
    10px;
  }
}
#multi option{
  padding: 5px;
}
#multi {
  height: 500px;
}
#multi > option.selectedv
{
  background: #111;
  color: #fff;
}
#multi > option.ch
{
  margin-left: 15px;

}
#multi > option.ch.selectedv
{
  margin-left: 15px;
  background: #444;

}
#multi > option.child
{
  margin-left: 30px;

}
#multi > option.child.selectedv
{
  margin-left: 30px;
  background: #888;

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
            <a class="nav-link active" href="index.php">
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

          <li class="nav-item  active shadow">
            
              <a class="nav-link active" href="#settingsSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-settings-gear-65 text-blue"></i> සැකසුම් </a>
                    <ul class="collapse show list-unstyled mx-3" id="settingsSub" >

<?php if (pr($prArray[41])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="monthPlan.php">
                                <i class="fas fa-dot-circle"></i> මාසික සැලසුම් 
                            </a>
                        </li>
<?php } ?>



<?php if (pr($prArray[42])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="viewPrivilege.php">
                            <i class="fas fa-dot-circle text-primary"></i> වරප්‍රසාද </a>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Privileges</a>
        
        
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                </div>
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
                  <li class="breadcrumb-item"><a href="#"> Privileges</a></li>
                  <li class="breadcrumb-item"><a href="#">Add </a></li>
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
            <a class="btn btn-primary float-right" href="view_privilege.php?id=<?php echo $_SESSION['id'] ?>">VIEW /DELETE PRIVILAGES</a>
              <h3 class="mb-0">Add Privileges</h3>
            </div>
            <div class="card-body" style="min-height: 80vh">
              <div class="row icon-examples">
                <div class="col-lg-12 col-md-12">

  <div class="row">


    <div class="col-md-12"><br>
      <input type="hidden" name="uID" id="uID" class="form-control" value="<?php echo $accountsAll['id'] ?>" required="">
      <div id="msg_unitA">
        
<span ><img class="imgU float-right" style="width: 100px;margin-right: 20px;" src="admin/upload/<?php echo $accountsAll['image'] ?>" />
</span>
<strong>
  FULL NAME : <?php echo $accountsAll['name'] ?><br>
  NIC : <?php echo $accountsAll['idno'] ?>
  

</strong>

      </div>
    </div>
  </div>
  <hr>

    <form method="POST" >

      <input type="hidden" name="idv" value="<?php echo $_SESSION['id'] ?>">
      <select multiple="multiple"  name="multi[]" id="multi" class="form-control " >

<option value="1"  <?php gv($_SESSION['id'],1,"cm"); ?>>acc sec</option>
<option value="2"  <?php gv($_SESSION['id'],2,"ch"); ?>>2-  view all  </option>
<option value="44"  <?php gv($_SESSION['id'],44,"child"); ?>>  -Update Account</option>
<option value="45"  <?php gv($_SESSION['id'],45,"child"); ?>>  -Deactivate Account</option>

<option value="3"  <?php gv($_SESSION['id'],3,"ch"); ?>>3-  active</option>
<option value="46"  <?php gv($_SESSION['id'],46,"child"); ?>>  -Update Account</option>
<option value="47"  <?php gv($_SESSION['id'],47,"child"); ?>>  -Deactivate Account</option>

<option value="4"  <?php gv($_SESSION['id'],4,"ch"); ?>>4-  add</option>

<option value="5"  <?php gv($_SESSION['id'],5,"ch"); ?>> 5- type</option>
<option value="48"  <?php gv($_SESSION['id'],48,"child"); ?>>  -update Account Type</option>
<option value="49"  <?php gv($_SESSION['id'],49,"child"); ?>>  -Deactivate Account Type</option>
<option value="6"  <?php gv($_SESSION['id'],6,"cm"); ?>>6- locatio sec</option>
<option value="7"  <?php gv($_SESSION['id'],7,"ch"); ?>> 7- all</option>
<option value="50"  <?php gv($_SESSION['id'],50,"child"); ?>>  -Add post office</option>
<option value="51"  <?php gv($_SESSION['id'],51,"child"); ?>>  -update</option>

<option value="8"  <?php gv($_SESSION['id'],8,"ch"); ?>>8-  post</option>
<option value="52"  <?php gv($_SESSION['id'],52,"child"); ?>>  -update</option>

<option value="9"  <?php gv($_SESSION['id'],9,"ch"); ?>>9-  area</option>
<option value="53"  <?php gv($_SESSION['id'],53,"child"); ?>>  -update</option>
<option value="10" <?php gv($_SESSION['id'],10,"ch") ?>> 10- village </option>
<option value="54"  <?php gv($_SESSION['id'],54,"child"); ?>>  -update</option>
<option value="11" <?php gv($_SESSION['id'],11,"ch") ?>> 11- street</option>
<option value="55"  <?php gv($_SESSION['id'],55,"child"); ?>>  -update</option>

<option value="12" <?php gv($_SESSION['id'],12,"cm") ?>>12- other</option>
<option value="13" <?php gv($_SESSION['id'],13,"ch") ?>> 13- all</option>
<option value="56"  <?php gv($_SESSION['id'],56,"child"); ?>>  -add tap</option>
<option value="57"  <?php gv($_SESSION['id'],57,"child"); ?>>  -update</option>

<option value="14" <?php gv($_SESSION['id'],14,"ch") ?>>14-  tap</option>
<option value="58"  <?php gv($_SESSION['id'],58,"child"); ?>>  -update</option>
<option value="15" <?php gv($_SESSION['id'],15,"ch") ?>>15-   gs</option>
<option value="59"  <?php gv($_SESSION['id'],59,"child"); ?>>  -update</option>
<option value="16" <?php gv($_SESSION['id'],16,"ch") ?>> 16- bill</option>
<option value="60"  <?php gv($_SESSION['id'],60,"child"); ?>>  -update</option>

<option value="17" <?php gv($_SESSION['id'],17,"cm") ?>>17- users</option>
<option value="18" <?php gv($_SESSION['id'],18,"ch") ?>> 18- admin</option>
<option value="61"  <?php gv($_SESSION['id'],61,"child"); ?>>  -update</option>
<option value="62"  <?php gv($_SESSION['id'],62,"child"); ?>>  -Deactivate</option>

<option value="19" <?php gv($_SESSION['id'],19,"ch") ?>> 19- cus</option>
<option value="63"  <?php gv($_SESSION['id'],63,"child"); ?>>  -update</option>
<option value="64"  <?php gv($_SESSION['id'],64,"child"); ?>>  -Deactivate</option>
<option value="65"  <?php gv($_SESSION['id'],65,"child"); ?>>  -view profile</option>
<option value="66"  <?php gv($_SESSION['id'],66,"child"); ?>>  -view accounts</option>

<option value="20" <?php gv($_SESSION['id'],20,"cm") ?>>20- report</option>
<option value="21" <?php gv($_SESSION['id'],21,"ch") ?>>21-  incom</option>
<option value="22" <?php gv($_SESSION['id'],22,"ch") ?>> 22- expenses</option>
<option value="23" <?php gv($_SESSION['id'],23,"ch") ?>> 23- payment</option>

<option value="24" <?php gv($_SESSION['id'],24,"cm") ?>>24- income</option>
<option value="25" <?php gv($_SESSION['id'],25,"ch") ?>> 25- inc</option>
<option value="67"  <?php gv($_SESSION['id'],67,"child"); ?>>  -add /update</option>
<option value="68"  <?php gv($_SESSION['id'],68,"child"); ?>>  -bill</option>

<option value="26" <?php gv($_SESSION['id'],26,"ch") ?>> 26- cat</option>
<option value="69"  <?php gv($_SESSION['id'],69,"child"); ?>>  -add /update</option>
<option value="70"  <?php gv($_SESSION['id'],70,"child"); ?>>  -deactivate</option>

<option value="27" <?php gv($_SESSION['id'],27,"cm") ?>>27- ex</option>
<option value="28" <?php gv($_SESSION['id'],28,"ch") ?>> 28- ex</option>
<option value="71"  <?php gv($_SESSION['id'],71,"child"); ?>>  -add /update</option>

<option value="29" <?php gv($_SESSION['id'],29,"ch") ?>> 29- cat</option>
<option value="72"  <?php gv($_SESSION['id'],72,"child"); ?>>  -add /update</option>


<option value="30" <?php gv($_SESSION['id'],30,"cm") ?>>30- paym</option>
<option value="31" <?php gv($_SESSION['id'],31,"ch") ?>> 31-  pay</option>
<option value="73"  <?php gv($_SESSION['id'],73,"child"); ?>>  -bill</option>
<option value="74"  <?php gv($_SESSION['id'],74,"child"); ?>>  -add /update</option>

<option value="32" <?php gv($_SESSION['id'],32,"ch") ?>> 32- cat</option>
<option value="75"  <?php gv($_SESSION['id'],75,"child"); ?>>  -add /update</option>

<option value="33" <?php gv($_SESSION['id'],33,"cm") ?>>33- bin</option>
<option value="34" <?php gv($_SESSION['id'],34,"ch") ?>> 34- ac </option>
<option value="76"  <?php gv($_SESSION['id'],76,"child"); ?>>  -Activate</option>

<option value="35" <?php gv($_SESSION['id'],35,"ch") ?>> 35- acc ty</option>
<option value="77"  <?php gv($_SESSION['id'],77,"child"); ?>>  -update </option>
<option value="78"  <?php gv($_SESSION['id'],78,"child"); ?>>  -Activate</option>

<option value="36" <?php gv($_SESSION['id'],36,"ch") ?>> 36- admi</option>
<option value="79"  <?php gv($_SESSION['id'],79,"child"); ?>>  -view pofile</option>
<option value="80"  <?php gv($_SESSION['id'],80,"child"); ?>>  -Activate</option>

<option value="37" <?php gv($_SESSION['id'],37,"ch") ?>> 37- cus</option>
<option value="81"  <?php gv($_SESSION['id'],81,"child"); ?>>  -view pofile</option>
<option value="82"  <?php gv($_SESSION['id'],82,"child"); ?>>  -Activate</option>

<option value="38" <?php gv($_SESSION['id'],38,"ch") ?>> 38- inc cat</option>
<option value="83"  <?php gv($_SESSION['id'],83,"child"); ?>>  -update</option>
<option value="84"  <?php gv($_SESSION['id'],84,"child"); ?>>  -Activate</option>

<option value="39" <?php gv($_SESSION['id'],39,"ch") ?>> 39- ex cat</option>
<option value="85"  <?php gv($_SESSION['id'],85,"child"); ?>>  -update</option>
<option value="86"  <?php gv($_SESSION['id'],86,"child"); ?>>  -Activate</option>



<option value="40" <?php gv($_SESSION['id'],40,"cm") ?>>40- settig</option>
<option value="41" <?php gv($_SESSION['id'],41,"ch") ?>> 41- moth pln</option>


<option value="87"  <?php gv($_SESSION['id'],87,"child"); ?>>  -update</option>
<option value="88"  <?php gv($_SESSION['id'],88,"child"); ?>>  -Activate</option>

<?php 

if (pr($prArray[0])==1 || pr($prArray[42])==1) {
?>

<option value="42" <?php gv($_SESSION['id'],42,"ch") ?>>  ad priv</option><?php
}
 ?>
<option value="43" <?php gv($_SESSION['id'],43,"ch") ?>>  other</option>
<option value="89"  <?php gv($_SESSION['id'],89,"child"); ?>>  -update</option>
<!--         <option value="39">e</option>
        <option value="40">e</option> -->
      </select>
      <br>

    </form>
<br>
    <div class="">
      <div class="table-responsive">

        <table id="user_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="10%">Account No</th>
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

<!-- 
<div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <label>Enter  Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control" />
          <br />
          <label>Amount</label>
          <input type="text" name="last_name" id="last_name" class="form-control" />
          
        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_id" id="user_id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
 -->
<!-- <div id="userModalS" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_formS" enctype="multipart/form-data">
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
          <input type="hidden" name="user_idS" id="user_idS" />
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


<script type="text/javascript" language="javascript" >


$(document).ready(function(){
$('#multi').focus()
$('option').mousedown(function(e) {
    e.preventDefault();
    $(this).prop('selected', !$(this).prop('selected'));
    return false;
});


  
});
</script>



</body>

</html>