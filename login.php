<?php
include 'main.php';
// If the user is logged-in redirect them to the home page
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
// Also check if the user is remembered, if so redirect them to the home page
if (isset($_COOKIE['rememberme']) && !empty($_COOKIE['rememberme'])) {
  // If the remember me cookie matches one in the database then we can update the session variables and the user will be logged-in.
  $stmt = $pdo->prepare('SELECT * FROM accounts WHERE rememberme = ?');
  $stmt->execute([ $_COOKIE['rememberme'] ]);
  $account = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($account) {
    // Found a match, user is "remembered" log them in automatically
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $account['idno'];
    $_SESSION['id'] = $account['id'];
        $_SESSION['role'] = $account['role'];
        header('Location: index.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    CEB
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
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-2">
<!--           <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div> -->
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center login">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">




        <?php 
        if (isset($_GET['id'])) {
        ?>

<div style="padding: 20px;" class="bg-success text-white">
        Hello <?php echo $_GET['id'] ?>, You have successfully registed to the system.
</div>
          <?php
        }
         ?>

         <br><br>

                <h2> sign in</h2>
              </div>

              <form role="form"   action="authenticate.php" method="post">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>        

                                <?php 
                    if (isset($_GET['id'])) {
                    ?>
                              <input  type="text" name="idno" placeholder="NIC" id="idno" required class="form-control" value="<?php echo $_GET['id'] ?>">
                    <?php
                    }else{
                      ?>
                              <input  type="text" name="idno" placeholder="NIC" id="idno" required class="form-control">
                      <?php
                    }
                     ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                  <input type="password" name="password" placeholder="Your Password" id="password" required class="form-control">

                  </div>
                </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me <a href="#" style="text-decoration: none;" class="text-primary">terms and conditions</a></span>
                  <input type="checkbox" required="" />
                  <div class="control__indicator"></div>
                </label>
              </div>

                <div class="text-center">
              <input type="submit" value="Log In" class="btn btn-block btn-primary">

                <div class="msg text-danger" style="padding: 10px;"></div>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
            </div>
            <div class="col-6 text-right">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core   -->
    <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/settings.js"></script>
  
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.2"></script>

    <script>
        document.querySelector(".login form").onsubmit = function(event) {
      event.preventDefault();
      var form_data = new FormData(document.querySelector(".login form"));
      var xhr = new XMLHttpRequest();
      xhr.open("POST", document.querySelector(".login form").action, true);
      xhr.onload = function () {
        if (this.responseText.toLowerCase().indexOf("success") !== -1) {

          <?php
        if (isset($_GET['id'])) {
          ?>
          window.location.href = "admin/verify.php";
          <?php
        }else{
          ?>
          window.location.href = "index.php";
        <?php } ?>
        } else {
          document.querySelector(".msg").innerHTML = this.responseText;
        }
      };
      xhr.send(form_data);
    };
    </script>

</body>

</html>