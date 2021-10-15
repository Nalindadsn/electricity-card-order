 

      <div class="row">
<?php 

include 'admin/db.php';
include 'acc_function.php';
$stmt_con = $pdo->prepare("SELECT * FROM account_con WHERE user_id='".$_POST['id']."'");
$stmt_con->execute();
$accounts_con = $stmt_con->fetchAll(PDO::FETCH_ASSOC);
$rc = $stmt_con->rowCount();
if ($rc<1) {
  echo '        <div class="col-xl-12 mb-12 mb-xl-0 my-1">
          <div class="card bg-gradient-default shadow">

            <div class="card-body">
              <!-- Chart -->
              Accounts not available 




            </div>
          </div>
        </div>';
}else{
foreach ($accounts_con as $keyAcc) {
?>

        <div class="col-xl-6 mb-6 mb-xl-0 my-1">
          <div class="card bg-gradient-default shadow">

            <div class="card-body">
              <!-- Chart -->
              <?php acc($keyAcc['id']) ?>




            </div>
          </div>
        </div>

<?php
}}

 ?>


      </div>