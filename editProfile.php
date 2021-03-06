<?php
include 'main.php';
$stmt = $pdo->prepare("SELECT * FROM accounts WHERE username='".$_SESSION['name']."'");
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);


check_loggedin($pdo);
// output message (errors, etc)
$msg = '';
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $pdo->prepare('SELECT * FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->execute([ $_SESSION['id'] ]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);
// Handle edit profile post data
if (isset($_POST['username'], $_POST['password'], $_POST['cpassword'], $_POST['email'])) {
  // Make sure the submitted registration values are not empty.
  if (empty($_POST['username']) || empty($_POST['email'])) {
    $msg = 'The input fields must not be empty!';
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $msg = 'Please provide a valid email address!';
  } else if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
      $msg = 'Username must contain only letters and numbers!';
  } else if (!empty($_POST['password']) && (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5)) {
    $msg = 'Password must be between 5 and 20 characters long!';
  } else if ($_POST['cpassword'] != $_POST['password']) {
    $msg = 'Passwords do not match!';
  }
  if (empty($msg)) {
    // Check if new username or email already exists in database
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM accounts WHERE (username = ? OR email = ?) AND username != ? AND email != ?');
    $stmt->execute([ $_POST['username'], $_POST['email'], $_SESSION['name'], $account['email'] ]);
    if ($result = $stmt->fetchColumn()) {
      $msg = 'Account already exists with that username and/or email!';
    } else {
      // no errors occured, update the account...
      $uniqid = account_activation && $account['email'] != $_POST['email'] ? uniqid() : $account['activation_code'];
      $stmt = $pdo->prepare('UPDATE accounts SET  password = ?, email = ?, activation_code = ? WHERE id = ?');
      // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
      $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $account['password'];
      $stmt->execute([ $password, $_POST['email'], $uniqid, $_SESSION['id'] ]);
      // Update the session variables
      $_SESSION['name'] = $_POST['username'];
      if (account_activation && $account['email'] != $_POST['email']) {
        // Account activation required, send the user the activation email with the "send_activation_email" function from the "main.php" file
        send_activation_email($_POST['email'], $uniqid);
        // Log the user out
        unset($_SESSION['loggedin']);
        $msg = 'You have changed your email address, you need to re-activate your account!';
      } else {
        // profile updated redirect the user back to the profile page and not the edit profile page
        header('Location: profile.php');
        exit;
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    profile
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
  <!-- Theme style -->

    <style type="text/css">
    .btcon,.update1 i{
      cursor: pointer;
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
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link " href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="examples/icons.html">
              <i class="ni ni-square-pin text-blue"></i> address
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="examples/icons.html">
              <i class="ni ni-circle-08 text-blue"></i> users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="examples/icons.html">
              <i class="ni ni-books text-blue"></i> reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="examples/icons.html">
              <i class="ni ni-align-left-2 text-blue"></i> expenses
            </a>
          </li>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-planet text-blue"></i> Icons </a>
                    <ul class="collapse list-unstyled mx-2" id="homesubmenu" >
                        <li class="nav-item">
                            <a  class="nav-link" href="#">
                                <i class="ni ni-planet text-blue"></i> Icons </a>
                            </a>
                        </li>
                    </ul>

          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item active active-pro">
            <a class="nav-link" href="examples/upgrade.html">
              <i class="ni ni-send text-dark"></i> Upgrade to PRO
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">User Profile</a>
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $_SESSION['name']; ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#!" class="btn btn-info">Edit profile</a>
            <button class="btn btn-info"  id="modal_button" >New Connetions</button> 




          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">


<div id="imgD">

</div>

                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <!-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a> -->


<button type="button" name="update" id="<?php echo $_SESSION['id'] ?>" class="btn btn-sm btn-default float-right update6" style="float: right;">Edit Profile </button>

              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  Accounts
                </h3>




   <div id="result" class="table-responsive"> <!-- Data will load under this tag!-->

   </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account Accounts ?????????????????? </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">EDIT</a>
                </div>
              </div>
            </div>
            <div class="card-body" style="padding: 0; background-color: #fff">
<div class="card ">
<div class="nav-wrapper" style="padding:10px; background-color: #fff">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">USER INFORMATION</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
              Accounts ??????????????????
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
              Accounts ??????????????????
            </a>
        </li>
    </ul>
</div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">




              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">



                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Files</h6>
                <div class="pl-lg-4">
                  <div class="form-group">








<div class="row">
  <div class="col-md-4 ">
    <h4>NIC Front <button type="button" name="update" id="<?php echo $_SESSION['id'] ?>" class="btn btn-primary btn-sm float-right update" data-toggle="modal" data-target="#userModal">Update</button></h4>
      <div id="showD1"></div>
  </div>
  <div class="col-md-4">
    <h4>NIC Back <button type="button" name="update" id="<?php echo $_SESSION['id'] ?>" class="btn btn-primary btn-sm float-right update4">Update</button></h4>
<div id="showD2">
  
</div>

  </div>
  <div class="col-md-4 ">
    <h4>Signature <button type="button" name="update" id="<?php echo $_SESSION['id'] ?>" class="btn btn-primary btn-sm float-right update5">Update</button></h4>
<div id="showD3">
  
</div>
  </div>

</div>









                  </div>
                </div>
              </form>


            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">



   <div id="result_con" class="table-responsive"> <!-- Data will load under this tag!-->

   </div>


<div id="accS"></div>


<?php 






 ?>




            </div>
        </div>
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
              &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">...</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">...</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">Blog</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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
          <label>First Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control" />
          <br />
          <label>NIC No</label>
          <input type="text" name="idno" id="idno" class="form-control" />
          <br />
          <label>Select User Image</label>
          <input type="file" name="user_image" id="user_image" />
          <span id="user_uploaded_image"></span>
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

<div id="userModal4" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form4" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title4">Add User</h4>
        </div>
        <div class="modal-body">
          <label>First Name</label>
          <input type="text" name="first_name4" id="first_name4" class="form-control" />
          <br />
          <label>Enter Last Name</label>
          <input type="text" name="idno4" id="idno4" class="form-control" />
          <br />
          <label>Select User Image</label>
          <input type="file" name="user_image4" id="user_image4" />
          <span id="user_uploaded_image4"></span>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_id4" id="user_id4" />
          <input type="hidden" name="operation4" id="operation4" />
          <input type="submit" name="action4" id="action4" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div id="userModal5" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form5" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title4">Add User</h4>
        </div>
        <div class="modal-body">
          <!-- <label>Sign</label> -->
          <input type="hidden" name="first_name5" id="first_name5" class="form-control" />
          <br />
          <!-- <label>Account Number</label> -->
          <input type="hidden" name="acc_no" id="acc_no" class="form-control" />
          <br />
          <!-- <label>branch</label> -->
          <input type="hidden" name="branch_name" id="branch_name" class="form-control" />
          <br />
          <!-- <label>Select User Image</label> -->
          <input type="file" name="user_image5" id="user_image5" />
          <span id="user_uploaded_image5"></span>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_id5" id="user_id5" />
          <input type="hidden" name="operation5" id="operation5" />
          <input type="submit" name="action5" id="action5" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>


<div id="userModal6" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form6" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title6">Add User</h4>
        </div>
        <div class="modal-body">
          <label>First Name</label>
          <input type="text" name="first_name6" id="first_name6" class="form-control" />
          <br />
          <label>Enter Last Name</label>
          <input type="text" name="idno6" id="idno6" class="form-control" />
          <br />
          <label>Select User Image</label>
          <input type="file" name="user_image6" id="user_image6" />
          <span id="user_uploaded_image6"></span>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_id6" id="user_id6" />
          <input type="hidden" name="operation6" id="operation6" />
          <input type="submit" name="action6" id="action6" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<div id="customerModal" class="modal fade "  aria-labelledby="myLargeModalLabel" >
 <div class="modal-dialog  modal-lg">
  <div class="modal-content">

        <form method="POST" id="user_form2">
   <div class="modal-header">
    <h4 class="modal-title">Create New Records</h4>
   </div>
   <div class="modal-body">

    <div class="form-row">
    <div class="form-group col-md-6">



    <label>card type</label>
    <input type="text" name="first_name" id="first_name1" class="form-control" />
    <br />
    <label>no of benificries</label>
    <input type="number" name="last_name" id="last_name1" class="form-control" />
    <br />

    <label>status</label>
    <select class="form-control"  name="status" id="status1"  >
      <option value="1" >Activate</option>
      <option value="0">Not Activate</option>
    </select>
    <br />

    </div>
    <div class="form-group col-md-6">


      <?php
      
      include 'dropdown.php';
      
      $obj = new Dropdown();
      
      $rows = $obj->fetchOne();
      
      ?>
      <label class="form-label" style="font-size:20px; font-style:bold;">Select One</label>
      <select id="country_change" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
        <option>-- select country --</option>
        <?php
        if(!empty($rows))
        {
          foreach($rows as $row)
          {
          ?>
            <option value="<?php echo $row['tone_id']; ?>"><?php echo $row['tone_name']; ?></option>  
          <?php
          }
        }
        ?>
        
      </select>

      <label class="form-label" style="font-size:20px; font-style:bold;">Select Two</label>
      <select id="ttwo_change" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
        <option>-- select ttwo --</option>
      </select>
  
      <label class="form-label" style="font-size:20px; font-style:bold;">Select Three</label>
      <select id="tthree_result" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
        <option>-- select tthree --</option>
      </select>

      <label class="form-label" style="font-size:20px; font-style:bold;">Select Four</label>
      <select id="tfour_result" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
        <option>-- select tfour --</option>
      </select>



    </div>
  </div>

   </div>
   <div class="modal-footer">
    <input type="hidden" name="acc_id" id="acc_id" />
    <input type="submit" name="action" id="action" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
 </form>


  <!--   Core   -->
    <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/settings.js"></script>
  




  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.2"></script>


<script type="text/javascript" language="javascript" >


$(document).ready(function(){


  });
$(document).ready(function(){



    showAll();
    function showAll(){

    var keyword = "0";

  $.ajax({
    method: 'POST',
    url: 'admin/a.php',
    data:'request='+keyword,

    success: function(response){
      $('#showD1').html(response);


    }
  });
    }




    showAll2();
    function showAll2(){

    var keyword = "0";

  $.ajax({
    method: 'POST',
    url: 'admin/b.php',
    data:'request='+keyword,

    success: function(response){
      $('#showD2').html(response);


    }
  });
    }




    showAll3();
    function showAll3(){

    var keyword = "0";

  $.ajax({
    method: 'POST',
    url: 'admin/c.php',
    data:'request='+keyword,

    success: function(response){
      $('#showD3').html(response);


    }
  });
    }




    uimg();
    function uimg(){

    var keyword = "0";

  $.ajax({
    method: 'POST',
    url: 'admin/uimg.php',
    data:'request='+keyword,

    success: function(response){
      $('#imgD').html(response);


    }
  });
    }


  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var firstName = $('#first_name').val();
    var lastName = $('#idno').val();
    var extension = $('#user_image').val().split('.').pop().toLowerCase();
    if(extension != '')
    {
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#user_image').val('');
        return false;
      }
    } 
    if(firstName != '' && lastName != '')
    {
      $.ajax({
        url:"admin/insert3.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          showAll();
        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });
  $(document).on('submit', '#user_form4', function(event){
    event.preventDefault();
    var firstName = $('#first_name4').val();
    var lastName = $('#idno4').val();
    var extension = $('#user_image4').val().split('.').pop().toLowerCase();
    if(extension != '')
    {
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#user_image4').val('');
        return false;
      }
    } 
    if(firstName != '' && lastName != '')
    {
      $.ajax({
        url:"admin/insert4.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form4')[0].reset();
          $('#userModal4').modal('hide');
          showAll2()
        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });
  $(document).on('submit', '#user_form5', function(event){
    event.preventDefault();
    var firstName = $('#first_name5').val();
    var lastName = $('#acc_no').val();
    var branch_name = $('#branch_name').val();
    var extension = $('#user_image5').val().split('.').pop().toLowerCase();
    if(extension != '')
    {
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#user_image5').val('');
        return false;
      }
    } 
    if(firstName != '' && lastName != '')
    {
      $.ajax({
        url:"admin/insert5.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form5')[0].reset();
          $('#userModal5').modal('hide');
          showAll3()
        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });
  
  $(document).on('submit', '#user_form6', function(event){
    event.preventDefault();
    var firstName = $('#first_name6').val();
    var lastName = $('#idno6').val();
    var extension = $('#user_image6').val().split('.').pop().toLowerCase();
    if(extension != '')
    {
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#user_image6').val('');
        return false;
      }
    } 
    if(firstName != '' && lastName != '')
    {
      $.ajax({
        url:"admin/insert6.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form6')[0].reset();
          $('#userModal6').modal('hide');
          uimg()
        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });
  $(document).on('click', '.update', function(){
    var user_id = $(this).attr("id");
    $.ajax({
      url:"admin/fetch_single3.php",
      method:"POST",
      data:{user_id:user_id},
      dataType:"json",
      success:function(data)
      {
        $('#userModal').modal('show');
        $('#first_name').val(data.first_name);
        $('#idno').val(data.idno);
        $('.modal-title').text("Upload NIC Front");
        $('#user_id').val(user_id);
        $('#user_uploaded_image').html(data.user_image);
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });
  
  $(document).on('click', '.update4', function(){
    var user_id4 = $(this).attr("id");
    $.ajax({
      url:"admin/fetch_single4.php",
      method:"POST",
      data:{user_id4:user_id4},
      dataType:"json",
      success:function(data)
      {
        $('#userModal4').modal('show');
        $('#first_name4').val(data.first_name4);
        $('#idno4').val(data.idno4);
        $('.modal-title4').text("Upload NIC Back");
        $('#user_id4').val(user_id4);
        $('#user_uploaded_image4').html(data.user_image4);
        $('#action4').val("Edit");
        $('#operation4').val("Edit");
      }
    })
  });
  



  
  $(document).on('click', '.update5', function(){
    var user_id5 = $(this).attr("id");
    $.ajax({
      url:"admin/fetch_single5.php",
      method:"POST",
      data:{user_id5:user_id5},
      dataType:"json",
      success:function(data)
      {
        $('#userModal5').modal('show');
        $('#acc_no').val(data.acc_no);
        $('#branch_name').val(data.branch_name);
        $('.modal-title5').text("Edit e");
        $('#user_id5').val(user_id5);
        $('#user_uploaded_image5').html(data.user_image5);
        $('#action5').val("Edit");
        $('#operation5').val("Edit");
      }
    })
  });

  
  
  $(document).on('click', '.update6', function(){
    var user_id6 = $(this).attr("id");
    $.ajax({
      url:"admin/fetch_single6.php",
      method:"POST",
      data:{user_id6:user_id6},
      dataType:"json",
      success:function(data)
      {
        $('#userModal6').modal('show');
        $('#first_name6').val(data.first_name6);
        $('#idno6').val(data.idno6);
        $('.modal-title4').text("Upload NIC Back");
        $('#user_id6').val(user_id6);
        $('#user_uploaded_image4').html(data.user_image6);
        $('#action6').val("Edit");
        $('#operation6').val("Edit");
      }
    })
  });
  

  








  
  
});
</script>


<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser() // This function will fetch data from table and display under <div id="result">
 {
  var action = "Load";
  $.ajax({
   url : "action.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }
fetchCon()
function fetchCon() // This function will fetch data from table and display under <div id="result">
 {
  var action = "LoadCon";
  $.ajax({
   url : "action.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#result_con').html(data); //It will display data under div tag with id result
   }
  });
 }

 //This JQuery code will Reset value of Modal item when modal will load for create new records
 $('#modal_button').click(function(){
  $('#customerModal').modal('show'); //It will load modal on web page
  $('#first_name1').val(''); //This will clear Modal first name textbox
  $('#last_name1').val(''); //This will clear Modal last name textbox
  $('#status1').val('1'); //This will clear Modal last name textbox
  $('.modal-title').text("Create New Records"); //It will change Modal title to Create new Records
  $('#action').val('Create'); //This will reset Button value ot Create
 });

 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $(document).on('submit', '#user_form2', function(event){

    event.preventDefault();

  var firstName = $('#first_name1').val(); //Get the value of first name textbox.
  var lastName = $('#last_name1').val(); //Get the value of last name textbox
  var status = $('#status1').val(); //Get the value of last name textbox
  var id = $('#acc_id').val();  //Get the value of hidden field customer id
  var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable


  // console.log('test')

  if(firstName != '' && lastName != '') //This condition will check both variable has some value
  {
   $.ajax({
    url : "action.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{firstName:firstName, lastName:lastName,status:status, id:id, action:action}, //Send data to server
    success:function(data){
     alert(data);    //It will pop up which data it was received from server side
     $('#customerModal').modal('hide'); //It will hide Customer Modal from webpage.
     fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result

    }
   });
  }
  else
  {
   alert("Both Fields are Required"); //If both or any one of the variable has no value them it will display this message
  }
 });

 //This JQuery code is for Update customer data. If we have click on any customer row update button then this code will execute
 $(document).on('click', '.update1', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  var action = "Select";   //We have define action variable value is equal to select
  $.ajax({
   url:"action.php",   //Request send to "action.php page"
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
    $('#customerModal').modal('show');   //It will display modal on webpage
    $('.modal-title').text("Update Records"); //This code will change this class text to Update records
    $('#action').val("Update");     //This code will change Button value to Update
    $('#acc_id').val(id);     //It will define value of id variable to this customer id hidden field
    $('#first_name1').val(data.first_name);  //It will assign value to modal first name texbox
    $('#last_name1').val(data.last_name);  //It will assign value of modal last name textbox
    $('#status1').val(data.status);  //It will assign value of modal last name textbox
   }
  });
 });

 //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Are you sure you want to remove this data?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"action.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{id:id, action:action}, //Data send to server from ajax method
    success:function(data)
    {
     fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
     alert(data);    //It will pop up which data it was received from server side
    }
   })
  }
  else  //Confim Box if cancel then 
  {
   return false; //No action will perform
  }
 });
});
</script>

<script>
// country dependent ajax
 $(document).on("change","#country_change", function(e){
  e.preventDefault();
    
  var country = $("#country_change").val(); 
    
  $.ajax({
        type: "POST",
        url: "ttwo.php",
    dataType: "json",
        data: "tone_id="+country,
        success: function(response)
        {
      var ttwoBody = "";
      ttwoBody = "<option>-- select ttwo --</option>"
      for(var key in response)
      {
        ttwoBody += "<option value="+ response[key]['ttwo_id'] +">"+ response[key]['ttwo_name'] +"</option>";
        $("#ttwo_change").html(ttwoBody);
      }   
        }
    });
 });

// ttwo dependent ajax
 $(document).on("change","#ttwo_change", function(e){
  e.preventDefault();
    
  var ttwo = $("#ttwo_change").val(); 
    //console.log(ttwo)
  $.ajax({
        type: "POST",
        url: "tthree.php",
    dataType: "json",
        data: "ttwo_id="+ttwo,
        success: function(response)
        {

      var tthreeBody = "";
      tthreeBody = "<option>-- select tthree --</option>"
      for(var key in response)
      {
        tthreeBody += "<option value="+ response[key]['tthree_id'] +">"+ response[key]['tthree_name'] +"</option>";
        //$('#tfour_result:first').prop('select',true)
        $("#tthree_result").html(tthreeBody);
      }

        }
    });
 });
// ttwo dependent ajax
 $(document).on("change","#tthree_result", function(e){
  e.preventDefault();
    
  var tthree = $("#tthree_result").val();
  //console.log(tthree) 
    
  $.ajax({
        type: "POST",
        url: "tfour.php",
    dataType: "json",
        data: "tthree_id="+tthree,
        success: function(response)
        {

        // $('#tfour_result:first').prop('select',true)
        ck=false

        console.log("four: "+response)
      var tfourBody = "";
      tfourBody = "<option>-- select tfour --</option>"
      if (response===null) {

      tfourBody = "<option>-- select tfour --</option>"

      }else{

      for(var key in response)
      {
        tfourBody += "<option value="+ response[key]['tfour_id'] +">"+ response[key]['tfour_name'] +"</option>";
        $("#tfour_result").html(tfourBody);

      }
      }   
        }
    });
 });  
</script>
<script type="text/javascript">
  
 $(document).on('click', '.btcon', function(){
  var id = $(this).attr("id"); 
  var s_id = <?php echo $_SESSION['id'] ?>
  //This code will fetch any customer id from attribute id with help of attr() JQuery method

  console.log(id)
  $.ajax({
    method: 'POST',
    url: 'fetch_acc_d.php',
    data:{user_id8:id,s_id8:s_id},

    success: function(response){
      console.log(response)
      $('#accS').html(response);
    }


  })
 });


</script>
</body>

</html>
