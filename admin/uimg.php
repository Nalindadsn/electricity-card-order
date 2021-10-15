<a href="#">
<?php
include '../main.php';
$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($accounts as $key ) {
  if ($key['image']=='') {
    ?>

    <img src="img/user-profile.png"  class="rounded-circle"><br>

    <?php
  }else{
    ?>


    <img  src="admin/upload/<?php echo $key['image']; ?>"  class="rounded-circle"><br>
    <?php
  }
  ?>

  <?php

}
?>


</a>

<div style="background-color: red;">
  <?php 

echo "-".$_POST['request'];
   ?>
</div>