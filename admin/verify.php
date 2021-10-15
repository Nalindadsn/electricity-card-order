<?php include '../main.php';


$stmt = $pdo->prepare("SELECT * FROM accounts WHERE username='".$_SESSION['name']."'");
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);


$im=$_SESSION['name'];



$stmt = $pdo->prepare("select username as id, email as email, user_id as parent_id,created_at from accounts WHERE status=1");
$stmt->execute();
// fetching rows into array
$tree_data = $stmt->fetchAll();


$currentid=$im;

function fetch_recursive($tree_data, $currentid, $parentfound = false, $cats = array())
{
    foreach($tree_data as $row)
    {
        if((!$parentfound && $row['id'] == $currentid) || $row['parent_id'] == $currentid)
        {
            $rowdata = array();
            foreach($row as $k => $v)
                $rowdata[$k] = $v;
            $cats[] = $rowdata;
            if($row['parent_id'] == $currentid)
                $cats = array_merge($cats, fetch_recursive($tree_data, $row['id'], true));
        }
    }
    return $cats;
}

$allRef=sizeof(fetch_recursive($tree_data,$im));

//-1

$stmt22 = $pdo->prepare("SELECT * FROM pointvalue");
$stmt22->execute();
$accounts22 = $stmt22->fetchAll(PDO::FETCH_ASSOC);

foreach ($accounts22 as $keyRow) {
  if ($keyRow['timeDuration']=="" && $keyRow['endDuration']=="") {
    $pV=$keyRow['pointVal'];
  }
}


 ?>
<html>
  <head>
    <title>Verify</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">








    <style>
      body
      {
        margin:0;
        padding:0;
        background-color:#f1f1f1;
      }
      .box
      {
        width:1270px;
        padding:20px;
        background-color:#fff;
        border:1px solid #ccc;
        border-radius:5px;
        margin-top:25px;
      }
    </style>
  </head>
  <body  class="hold-transition sidebar-mini">






<div class="wrapper">
  <!-- Navbar -->
  <nav class="





<?php 
foreach ($accounts as $keySes) { ?>


<?php if($keySes['role']=="Admin"){ ?>

main-header navbar navbar-expand navbar-dark navbar-danger
  <?php
}else{


 ?>
main-header navbar navbar-expand navbar-white navbar-light

  <?php
}}
 ?>


  ">    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://gemmind.lk/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../all_products.php" class="nav-link">Products</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link"><span class="badge badge-pill badge-dark">Role : <?php echo $_SESSION['role']; ?></span></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
 
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link navbar-navy">
      <span class="brand-text font-weight-light"><img src="../dist/img/AdminLTELogo3.png" style="width: 80%;"></span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">



<?php 
foreach ($accounts as $keySes) {
if($keySes['image']==""){

 ?>
          <img src="../img/user-profile.png" class="img-circle elevation-2" alt="User Image" style="background-color: #fff;">

  <?php
}else{

?>

          <img src="upload/<?php echo $keySes['image'] ?>" class="img-circle elevation-2" alt="User Image">

<?php

}
}
?>

        </div>
        <div class="info" style="width: 100%;">


<?php 
foreach ($accounts as $keySes) { ?>
   <span class="badge rounded-pill 

   

<?php if($keySes['role']=="Admin"){
  echo "bg-success";
}else if($keySes['role']=="Member"){

  echo "bg-danger";

} ?>



   " style="float: right;"> <?php echo $keySes['username']; ?></span>
  <?php
}
 ?>


          <a href="../profile.php" class="d-block">


<?php 
foreach ($accounts as $keySes) {
  

echo $keySes['first_name']." ".$keySes['idno'];


}
 ?>


          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="../index.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../tree.php" class="nav-link">
   
              <i class="fas fa-network-wired"></i>         
              <p>
                 &nbsp;&nbsp;Genealogy
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../compose.php" class="nav-link ">

              <i class="nav-icon fas fa-envelope"></i>              
              <p>
                Contact
                
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="verify.php" class="nav-link active">

              <i class="nav-icon fas fa-user"></i>              
              <p>
                Verify Account




<?php 
foreach ($accounts as $keySes) { ?>

   

<?php if($keySes['status']=="1"){
  echo '<i class="fa fa-check" aria-hidden="true"></i>';
}else if($keySes['status']=="0"){

  echo '<i class="fas fa-times-circle"></i>';

}

 

 } ?>


                
              </p>
            </a>
          </li>

<?php 
foreach ($accounts as $keySes) { ?>
<?php if($keySes['role']=="Admin"){ ?>
          <li class="nav-item">
            <a href="products.php" class="nav-link ">

              <i class="nav-icon fab fa-product-hunt"></i>               
              <p>
                Products
                
              </p>
            </a>
          </li>

<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>   
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="users.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="member_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../adminNew.php?" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Member</p>
                </a>
              </li>


              


            </ul>
          </li>



  <?php
}
 ?>


  <?php
}
 ?>





<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-money-bill"></i> &nbsp;&nbsp;   
              <p>
                card Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">



<?php 
foreach ($accounts as $keySes) { ?>
<?php if($keySes['role']=="Admin"){ ?>

              <li class="nav-item">
                <a href="../userBalance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paymens</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transactions.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Transactions</p>
                </a>
              </li>
  <?php
}
 ?>
  <?php
}
 ?>

              <li class="nav-item">
                <a href="../transactions.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Transactions</p>
                </a>
              </li>

              


            </ul>
          </li>

          <li><hr></li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link " style="background-color: #d81b60;color: #fff;">
<i class="nav-icon fas fa-sign-out-alt"></i>
              <i class="nav-icon fas fa-sign-out"></i>              
              <p>
                Sign Out
                
              </p>
            </a>
          </li>



        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">









        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Verify</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">











                <!-- Info boxes -->
 

                <!-- Info boxes -->
        <div class="row">
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">



<?php 
foreach ($accounts as $keySes) { ?>

   

<?php if($keySes['role']=="Admin"){

  echo  "New Members";


}else if($keySes['role']=="Member"){

  echo  "All Referral Members";

} ?>



  <?php
}
 ?>



















                </span>
                <span class="info-box-number">


                <?php

                if ($allRef==0) {
                   echo $allRef;
                }else{
                   echo $allRef-1;

                }

                ?>
                  


              </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                  

<?php 
$numC=0;
foreach (fetch_recursive($tree_data,$im) as $key) {
$current = strtotime(date("Y-m-d"));
 $date    = strtotime($key['created_at']);

 $datediff = $date - $current;
 $difference = floor($datediff/(60*60*24));
 if($difference==0)
 {
    //echo 'today';
if ($key['id']!=$_SESSION['name']) {
    $numC++;
$keyv[]= $key['id'];
}
 }
 else if($difference > 1)
 {
    //echo 'Future Date';
 }
 else if($difference > 0)
 {
    //echo 'tomorrow';
 }
 else if($difference < -1)
 {
    //echo 'Long Back';
 }
 else
 {
    //echo 'yesterday';
 }  






}
?>




                <span class="info-box-text">

<?php 
  echo  "New Members";
?>               
<?php if ($numC==0) {
?>
<span class="badge badge-pill badge-danger">TODAY</span>
<?php

} ?>
<?php if ($numC>0) {
?>
<span class="badge badge-pill badge-success">TODAY</span>
<?php
} ?>

                </span>


                <span class="info-box-number">

<?php
//echo sizeof($key)
  echo $numC;
if($numC==1){
foreach ($keyv as $keyIt) {
  if ($keyIt!=$_SESSION['name']) {
    # code...
 
  echo "&nbsp;&nbsp;&nbsp;<span class='badge badge-pill badge-danger'> <a class='text-white' href='userProfile.php?id=".$keyIt."'> ".$keyIt." </a></span>"; 

}

}
}

  //echo $numC;
  

 ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                  



<?php 


$stmt1 = $pdo->prepare("select username as id,image as image,first_name,email as email,idno, username as name, user_id as parent_id ,created_at from accounts WHERE status='1'");
$stmt1->execute();
// fetching rows into array
$tree_data1 = $stmt1->fetchAll();

function fetch_recursive2x($tree_data1, $currentid, $parentfound = false, $cats = array())
{
    foreach($tree_data1 as $row)
    {
        if((!$parentfound && $row['id'] == $currentid) || $row['parent_id'] == $currentid)
        {
            $rowdata = array();
            foreach($row as $k => $v)
                $rowdata[$k] = $v;
            $cats[] = $rowdata;
            if($row['parent_id'] == $currentid)
                $cats = array_merge($cats, fetch_recursive2x($tree_data1, $row['id'], true));
        }
    }
    return $cats;
}
// echo "<pre>";
// print_r(fetch_recursive2x($tree_data1,$im)) ;
// echo "</pre>"; 

foreach (fetch_recursive2x($tree_data1,$im) as $key11) {
  //echo $key11['created_at']."<br>";
}

?>
<?php 


// $startDate = new DateTime('2021-01-24');
// $endDate = new DateTime('2021-02-22');




$day22 = date('w');
$week_start22 = date('Y/m/d', strtotime('-'.$day22.' days'));
$week_end22 = date('Y/m/d', strtotime('+'.(6-$day22).' days'));



$date11=date_create($week_start22);
$date22=date_create($week_end22);



$startDate = new DateTime(date_format($date11,"Y/m/d"));
$endDate = new DateTime(date_format($date22,"Y/m/d"));



$sundays = array();

while ($startDate <= $endDate) {
    if ($startDate->format('w') == 0) {
        $sundays[] = $startDate->format('Y-m-d');
 


/////////////////////////////////////////////

$n=0;
foreach (fetch_recursive2x($tree_data1,$im) as $key11) {
 // echo $key11['created_at']."<br>";

if ($key11['id']!=$_SESSION['name']) {

$tm=$key11['created_at'];

$time = $startDate->format('Y-m-d');

$date_one = $time; 
$date_one = strtotime($date_one);
$date_one = strtotime("+60 minutes", $date_one);
$date_one =  date('Y-m-d h:i A', $date_one);

$date_ten = strtotime($time); 
$date_ten = strtotime("-12 minutes", $date_ten); 
$date_ten = date('Y-m-d h:i A', $date_ten);

$cardDate= date('Y-m-d', strtotime($tm) );

$contractDateBegin = date('Y-m-d h:i A', strtotime($date_ten)); 
$contractDateEnd = date('Y-m-d h:i A', strtotime($date_one));



$contractDateEnd=date('Y-m-d', strtotime($startDate->format('Y-m-d'). ' + 7 days'));



if($cardDate > $contractDateBegin && $cardDate < $contractDateEnd)  
{  
  $n++;

?>

<?php
} 


}


}



?>


                <span class="info-box-text">New Members


<?php if ($n==0) {
?>

<span class="badge badge-pill badge-danger">THIS WEEK</span>
<?php

} ?>

<?php if ($n>0) {
?>

<span class="badge badge-pill badge-success">THIS WEEK</span>
<?php

} ?>

                </span>
                <span class="info-box-number">
<?php

echo $n;



//////////////////////////////////////


    }
    
    $startDate->modify('+1 day');
}



 ?>













                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->





















        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Verify Your Account</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


<div class="row">
  <div class="col-md-4 text-center">
    <h4>NIC Front <button type="button" name="update" id="<?php echo $_SESSION['id'] ?>" class="btn btn-warning btn-xs update">Update</button></h4>

<div id="showD1">
  
</div>
  </div>
  <div class="col-md-4 text-center">
    <h4>NIC Back <button type="button" name="update" id="<?php echo $_SESSION['id'] ?>" class="btn btn-warning btn-xs update4">Update</button></h4>
<div id="showD2">
  
</div>

  </div>
  <div class="col-md-4 text-center">
    <h4>NIC Back <button type="button" name="update" id="<?php echo $_SESSION['id'] ?>" class="btn btn-warning btn-xs update5">Update</button></h4>
<div id="showD3">
  
</div>
  </div>

</div>









              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

























  </body>



</html>

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
          <label>sign</label>
          <input type="text" name="first_name5" id="first_name5" class="form-control" />
          <br />
          <label>Account Number</label>
          <input type="text" name="acc_no" id="acc_no" class="form-control" />
          <br />
          <label>branch</label>
          <input type="text" name="branch_name" id="branch_name" class="form-control" />
          <br />
          <label>Select User Image</label>
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


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script type="text/javascript" language="javascript" >


$(document).ready(function(){


  });
$(document).ready(function(){



    showAll();
    function showAll(){

    var keyword = "0";

  $.ajax({
    method: 'POST',
    url: 'a.php',
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
    url: 'b.php',
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
    url: 'c.php',
    data:'request='+keyword,

    success: function(response){
      $('#showD3').html(response);


    }
  });
    }








  $('#add_button').click(function(){
    $('#user_form')[0].reset();
    $('.modal-title').text("Add User");
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#user_uploaded_image').html('');
    $('#user_uploaded_image4').html('');
    $('#user_uploaded_image5').html('');
  });
  
  var dataTable = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"fetch3.php",
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[0, 3, 4],
        "orderable":false,
      },
    ],

  });

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
        url:"insert3.php",
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
        url:"insert4.php",
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
        url:"insert5.php",
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
  
  $(document).on('click', '.update', function(){
    var user_id = $(this).attr("id");
    $.ajax({
      url:"fetch_single3.php",
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
      url:"fetch_single4.php",
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
      url:"fetch_single5.php",
      method:"POST",
      data:{user_id5:user_id5},
      dataType:"json",
      success:function(data)
      {
        $('#userModal5').modal('show');
        $('#first_name5').val(data.sign_name);
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
  









  $(document).on('click', '.delete', function(){
    var user_id = $(this).attr("id");
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        url:"delete3.php",
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

<script>
</script>