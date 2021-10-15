<?php
// Include config file
 include 'main.php'; 
include('function5.php');
if (isset($_GET['id'])) {
    # code...
$stmt = $pdo->prepare("SELECT * FROM products WHERE id='".$_GET['id']."' LIMIT 1");
$stmt->execute();
$product = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

$stmtAll = $pdo->prepare("SELECT * FROM products");
$stmtAll->execute();
$productAll = $stmtAll->fetchAll(PDO::FETCH_ASSOC);




// Define variables and initialize with empty values
$username = $password = $confirm_password = $email= $status = $user_id= $leftORright= $first_name = $last_name = $bank_name = $branch_name = $acc_no= "";
$username_err = $password_err= $user_id_err=$status_err = $confirm_password_err = $leftORright_err = $email_err= $first_name_err = $last_name_err=$bank_name_err=$branch_name_err=$acc_no_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM accounts WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }




    }



    // Validate username
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "Please enter first_name.";
    } else{

            $param_first_name = trim($_POST["first_name"]);
            $first_name = trim($_POST["first_name"]);
    }

    // Validate username
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Please enter last_name.";
    } else{

            $param_last_name = trim($_POST["last_name"]);
            $last_name = trim($_POST["last_name"]);
    }



foreach ($product as $p_item) { 
$product_id=$p_item['id'];
$product_price=$p_item['price'];

 }








    // Validate username
    if(empty(trim($_POST["user_id"]))){
        $user_id_err = "Please enter user_id.";
    } else{

        // Prepare a select statement
        $sql = "SELECT id FROM accounts WHERE username = :user_id";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":user_id", $param_user_id, PDO::PARAM_STR);
            
            // Set parameters
            $param_user_id = trim($_POST["user_id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $user_id = trim($_POST["user_id"]);
                } else{


                    $user_id_err = "not available.";




                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }




    }



    // Validate username
    if(empty(trim($_POST["status"]))){
        $status_err = "Please enter status.";
    } else{

            $param_status = trim($_POST["status"]);
            
    }





    

    // Validate username
    if(empty(trim($_POST["leftORright"]))){
        $leftORright_err = "Please enter leftORright.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM accounts WHERE leftORright = :leftORright AND user_id=:user_id";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":leftORright", $param_leftORright, PDO::PARAM_STR);
            $stmt->bindParam(":user_id", $param_user_id2, PDO::PARAM_STR);
            
            // Set parameters
            $param_leftORright = trim($_POST["leftORright"]);

            $param_user_id2 = trim($_POST["user_id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    if (trim($_POST["leftORright"])=="l") {
                        # code...
                    $leftORright_err = "cant add to left side .".$stmt->rowCount()."-".$param_user_id2;
                    }
                    if (trim($_POST["leftORright"])=="r") {
                        # code...
                    $leftORright_err = "cant add to right side .".$stmt->rowCount()."-".$param_user_id2;
                    }
                } else{
                    $leftORright = trim($_POST["leftORright"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    



    

    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM accounts WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }




    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    


    // Validate password
    if(empty(trim($_POST["bank_name"]))){
        $bank_name_err = "Please enter a Bank Name.";     
    } else{
        $bank_name = trim($_POST["bank_name"]);
    }
    




    // Validate password
    if(empty(trim($_POST["branch_name"]))){
        $branch_name_err = "Please enter a Branch Name.";     
    } else{
        $branch_name = trim($_POST["branch_name"]);
    }
    


    // Validate password
    if(empty(trim($_POST["acc_no"]))){
        $acc_no_err = "Please enter a Bank Name.";     
    } else{
        $acc_no = trim($_POST["acc_no"]);
    }
    




    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }



    


foreach ($product as $p_item) { 
$product_id=$p_item['id'];
$product_price=$p_item['price'];

 }


    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)  && empty($leftORright_err) && empty($user_id_err) && empty($first_name_err)  && empty($last_name_err) && empty($bank_name_err) && empty($branch_name_err) && empty($acc_no_err)){
        


        // Prepare an insert statement
        $sql = "INSERT INTO accounts (username,email,user_id,leftORright, password,status,first_name,last_name,product_id,product_price,activation_code,role,bank) VALUES (:username,:email,:user_id,:leftORright, :password,:status,:first_name,:last_name,:product_id,:product_price,:activation_code,:role,:bank)";
         


        if($stmt = $pdo->prepare($sql)){


              $image = '';
              if($_FILES["user_image5"]["name"] != '')
              {
                $image = upload_image();
              }
              else
              {
                $image = $_POST["hidden_user_image5"];
              }

if ($_POST["activation_code"]==1) {
            $uniqid =uniqid();
}else{
            $uniqid ='activated';
}

            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":user_id", $param_user_id, PDO::PARAM_STR);
            $stmt->bindParam(":leftORright", $param_leftORright, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":status", $param_status, PDO::PARAM_STR);
            $stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
            
            $stmt->bindParam(":product_id", $product_id, PDO::PARAM_STR);
            
            $stmt->bindParam(":product_price", $product_price, PDO::PARAM_STR);
            $stmt->bindParam(":activation_code", $uniqid, PDO::PARAM_STR);
            $stmt->bindParam(":role", $_POST['role'], PDO::PARAM_STR);
            $stmt->bindParam(":bank", $image, PDO::PARAM_STR);
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            



            // Attempt to execute the prepared statement
            if($stmt->execute()){


if (isset($_GET['role'])) {
if ($_GET['role']=="admin") {
                header('location: admin/users.php?st=new&id='.$param_username);
}
}else{

                header('location: login.php?st=new&id='.$param_username);
}

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
}
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>gemmind</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">



<style type="text/css">
  
 h2 a {
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: #363636;
    text-decoration: none;
    transition: 0.3s;
}

 h2 a:hover {
    color: #fbb72c;
}

 p {
    font-size: 15px;
    line-height: 22px;
    margin-bottom: 18px;
    color: #999;
}

.product-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

</style>


  </head>
  <body style="">
<div  class="container-fluid">






  <div class="row " style="min-height: 100vh;">


    <?php 
    if (!isset($_GET['id'])) {
        # code...
     ?>
        <div class="col-md-5"><br>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Hello <?php echo $_SESSION['name'] ?></h1>
        <p class="lead">Please Select the product bofore adding the user. <i class="fas fa-angle-double-right"></i></p>

      </div>
    </div>
        </div>

    <?php } ?>

    <div class="col-md-7">
        


    <br>
  <div class="row">

 



<?php 



foreach ($productAll as $keySes) { 
?>





    <div class="col-md-6 mb-2">
      <div class="card h-100">
        <div class="labels d-flex justify-content-between position-absolute w-100">
<!--           <div class="label-new">
            <span class="text-white bg-success small d-flex align-items-center px-2 py-1">
              <i class="fa fa-star" aria-hidden="true"></i>
              <span class="ml-1">New</span>
            </span>
          </div> -->
          <div class="label-sale">
            <span class="text-white bg-danger small d-flex align-items-center px-2 py-1">
              <i class="fa fa-tag" aria-hidden="true"></i>
              <span class="ml-1">Sale</span>
            </span>
          </div>
        </div>
        <a href="#">
          <img src="admin/products/<?php echo $keySes['image'] ?>" class="card-img-top" alt="Product">
        </a>
        <div class="card-body px-2 pb-2 pt-1">
          <div class="d-flex justify-content-between">
            <div>
              <p class="h4 text-danger">Rs. <?php echo $keySes['price'] ?></p>
            </div>
            <div>
              <a href="#" class="text-secondary lead" data-toggle="tooltip" data-placement="left" title="Compare">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
              </a>
            </div>
          </div>
          <p class="text-warning d-flex align-items-center mb-2">

          </p>
          <p class="mb-0">
            <strong>
              <a href="#" class="text-secondary"><?php echo $keySes['p_name']; ?></a>
            </strong>
          </p>
          <div class="d-flex justify-content-between">
            <div class="col px-0">
              <a href="adminNew.php?id=<?php echo $keySes['id']; ?>" class="btn btn-outline-danger btn-block"><i class="fa fa-view" aria-hidden="true"></i> Select Product</a>

            </div>
          </div>
        </div>
      </div>
    </div>
























<?php

 } ?>


























  </div>



    </div>

<?php 
if (isset($_GET['id'])) {
    # code...
 ?>

    <div class="col-md-5">

    <br>
<div class="" style="width: 100%">
  <div class="card card-outline card-danger">
    <div class="card-header text-center bg-dark">
      <a href="index.php" class="h1">

<img src="dist/img/AdminLTELogo3.png" style="width: 50%;">

      </a>
    </div>
    <div class="card-body register">

        <div class="table table-striped table-valign-middle">
                  <div class="row" style="background-color: #ccc;padding: 5px;">


<?php 
foreach ($product as $p_item) { 
?>


                    
                    <div class="col-md-4" style="height: 100%; background-color: #333;" >
                      <img style="width: 100%;" src="admin/products/<?php echo $p_item['image'] ?>" class=" mr-1" alt="Product" >
                    </div>
                        
                    <div class="text-left col-md-8"><i class="fas fa-money"></i><?php echo  $p_item['p_name'] ?> <hr>Rs. <?php echo  $p_item['price'] ?></div>
                  


<?php

 } ?>




                  </div>
                </div>

      <h3 class="login-box-msg"> Register a new member </h3>



<div align="center" style="color: ">
  <h4 class="text-success">
<?php 
if (isset($succesMsg)) {
  # code...
echo $succesMsg;
}
 ?>
</h4>
</div>


        <form  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $_GET['id'] ?>" method="post" >

<hr>
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="false" style="background-color: #333">


  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>

<hr>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
      hghjgj
 <li data-target="#carouselExampleIndicators" data-slide-to="1">test</li>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">

    </div>
  </div>

</div> -->

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>   
            <div class="form-group">
                <label>first_name</label>
                <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
            </div>   
            <div class="form-group">
                <label>last_name</label>
                <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
            </div>   



            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>  



            <div class="form-group">
                <label>Refferal Id</label>


                  <select class="form-control select2"  name="user_id" placeholder="ref" id="user_id"  class="form-control <?php echo (!empty($user_id_err)) ? 'is-invalid' : ''; ?>" >

                         <option value="<?php  if(isset($_GET['uid'])){ echo $_GET['uid']; } ?>"><?php  if(isset($_GET['uid'])){ echo $_GET['uid']; } ?> </option>
                    <?php 
                    $stmtall = $pdo->prepare("SELECT * FROM accounts");
                    $stmtall->execute();
                    $accountsall = $stmtall->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($accountsall as $key) {
                     $stmtall2 = $pdo->prepare("SELECT * FROM accounts  WHERE user_id='".$key['username']."' ");
                     $stmtall2->execute();

                      if (($stmtall2->rowCount())<2) {
                     if (isset($_GET['uid'])) {
                        ?>

                        <?php
                     }

                      ?>
                         <option value="<?php echo $key['username']; ?>"><?php echo $key['username']."|".$key['leftORright']."-".$stmtall2->rowCount(); ?> </option>
                      <?php
                    }
                    }
                    ?>

                  </select>

                <span class="invalid-feedback"><?php echo $user_id_err; ?></span>
            </div>  






            <div class="form-group">
                <label>Left / Right</label>
                <select name="leftORright" class="form-control <?php echo (!empty($leftORright_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $leftORright; ?>">
                    <option value="l">Left</option>
                    <option value="r">Right</option>
                </select>
                <span class="invalid-feedback"><?php echo $leftORright_err; ?>

                </span>
            </div>  


            <div class="form-group">




<?php 
if (isset($_GET['role'])) {
if ($_GET['role']=="admin") {
    ?>

              <label>Email Activation</label>
             <select name="activation_code" class="form-control " >
                    <option value="1">Required</option>
                    <option value="0">Not Required</option>
              </select>
<?php
}
}else{
  ?>
<input type="hidden" name="activation_code" value="1"> 
  <?php
}
?>


            </div>  

            <div class="form-group">

                <label>Role</label>
             <select name="role" class="form-control " >

<?php 
if (isset($_GET['role'])) {
if ($_GET['role']=="admin") {
    ?>


                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
    <?php
}
if ($_GET['role']=="member") {
    ?>


                    <option value="Member">Member</option>
    <?php
}
    ?>


    <?php
}else
{
    ?>

                    <option value="Member">Member</option>

    <?php

}

 ?>

            </select>

                </span>
            </div>  

            <div class="form-group">

                <input type="hidden" name="status" value="1">

<!--                 <select name="status" class="form-control " >
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select> -->
                <span class="invalid-feedback"><?php echo $status_err; ?>

                </span>
            </div>  



            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>


            <div class="form-group">
                <label>Bank Name</label>
          <input type="text" placeholder="Bank of Ceylon" name="bank_name" id="bank_name" class="form-control  <?php echo (!empty($bank_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $bank_name; ?>"  required/>

                <span class="invalid-feedback"><?php echo $bank_name_err; ?></span>

            </div>


            <div class="form-group">
                <label>Branch</label>
          <input type="text" name="branch_name" placeholder="Colombo"  id="branch_name" class="form-control  <?php echo (!empty($branch_name_err)) ? 'is-invalid' : ''; ?>"  value="<?php echo $branch_name; ?>" required/>

                <span class="invalid-feedback"><?php echo $branch_name_err; ?></span>
            </div>



            <div class="form-group">
                <label>Account Number</label>
          <input type="text"  placeholder="xxxxxxxxx"  name="acc_no" id="acc_no" class="form-control  <?php echo (!empty($acc_no_err)) ? 'is-invalid' : ''; ?>"  value="<?php echo $acc_no; ?>" required/>
                <span class="invalid-feedback"><?php echo $acc_no_err; ?></span>
            </div>



            <div class="form-group">
                <label>Your Slipt</label>
          <input type="file" name="user_image5" id="user_image5" class="form-control"  required/>
          <input type="hidden" name="hidden_user_image5">


            </div>


              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0">
<input type="checkbox" required="">

                  <span class="caption">I accept the <a href="https://www.gemmind.lk/terms-and-conditions/" style="text-decoration: none;" class="text-primary">terms of use </a> and  <a href="https://www.gemmind.lk/privacy-policy/" style="text-decoration: none;" class="text-primary">Privacy policy </a></span>
                  
                </label>
              </div>


            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>


      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div></div>






<?php } ?>













  </div>
<!-- /.register-box -->
</div>
<!-- jQuery -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
<script type="text/javascript">
  $(document).ready(function(){

   $("#username").keyup(function(){

     var username = $(this).val().trim();

     if(username != ''){

        $.ajax({
           url: 'proceser.php',
           type: 'post',
           data: {username:username},
           success: function(response){

              // Show response
              $("#uname_response").html(response);

        $('#username').val('');

           }
        });
     }else{
        $("#uname_response").html("");
     }

  });

});

</script>

  </body>
</html>
<?php 
    unset($pdo); ?>