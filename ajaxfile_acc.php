<?php
// mysql connection


   include('admin/db.php');


if (isset($_POST["username"]))
{

   $statement = $pdo->prepare("select accounts.* from accounts where idno='".$_POST["username"]."' limit 1");

   $statement->execute();
   $result = $statement->fetch();
   $n=$statement->rowCount();


   $output = array();

if ($n>0) {
      $output["count"] = $n;
      $output["acc_un"] = $result['username'];
      $output["id"] = $result['id'];
      $output["name"] = $result['name'];
      $output["image"] = $result['image'];
}else{
      $output["count"] = $n;
      $output["acc_un"] = '';
      $output["id"] = '';
      $output["name"] = '';
      $output["image"] ='';
}



    echo json_encode($output);

}
?>