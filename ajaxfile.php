<?php
// mysql connection


   include('admin/db.php');

function noAcc($u){
   include('admin/db.php');
   $statement = $pdo->prepare("SELECT * FROM account_con WHERE user_id='".$u."'");
   $statement->execute();
   $result = $statement->fetchAll();
   return $statement->rowCount();

}
function selectAccType($u)
{
   include('admin/db.php');
   $statement = $pdo->prepare("SELECT * FROM  acc_cat WHERE id='".$u."'");
   $statement->execute();
   $result = $statement->fetch();
   if (isset($result['name'])) {
   return $result['name'];
   }else{
   return 'Not Found';

   }
}



if (isset($_POST["username"]))
{

   $statement = $pdo->prepare("select account_con.id AS id ,account_con.acc_type AS acc_type , account_con.name AS un,measurement_no , account_con.user_id AS user_id, accounts.idno AS usn from account_con
   INNER JOIN accounts
   ON account_con.user_id = accounts.id

    where account_con.id='".$_POST["username"]."'");

   $statement->execute();
   $result = $statement->fetch();
   $n=$statement->rowCount();


   $output = array();
if ($n>0) {
      $output["count"] = $n;
      $output["acc_type"] = $result['acc_type'];
      $output["acc_typeV"] = selectAccType($result['acc_type']);
      $output["un"] = $result['un'];
      $output["usn"] = $result['usn'];
      $output["meter"] = $result['measurement_no'];
      $output["noAcc"] = noAcc($result['user_id']);
}else{
      $output["count"] = $n;
      $output["acc_type"] = '';
      $output["acc_typeV"] = '';
      $output["noAcc"] ='';
      $output["un"] = '';
      $output["usn"] = '';
      $output["meter"] = '';

}


    echo json_encode($output);

}
?>