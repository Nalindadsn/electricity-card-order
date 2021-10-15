<?php
include('db.php');



function noAcc($u){
   include('db.php');
   $statement = $pdo->prepare("SELECT * FROM account_con WHERE user_id='".$u."'");
   $statement->execute();
   $result = $statement->fetchAll();
   return $statement->rowCount();

}
function selectAccType($u)
{
   include('db.php');
   $statement = $pdo->prepare("SELECT * FROM  acc_cat WHERE id='".$u."'");
   $statement->execute();
   $result = $statement->fetch();
   if (isset($result['name'])) {
   return $result['name'];
   }else{
   return 'Not Found';

   }
}


function balUser($b){

   include('db.php');
$stmtIn = $pdo->prepare("
SELECT type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE 
   income.con_id='".$b."'
UNION ALL
SELECT payment.note AS ptype,'py' AS type , (payment.amount)*-1 AS amount, payment.created_at
FROM payment
   INNER JOIN account_con
   ON payment.con_id = account_con.id
   WHERE 
   payment.con_id='".$b."'
 ORDER BY created_at

  ");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);
$tTV=0;
foreach ($inC as $keyT) {
      $tTV=$tTV+$keyT['amount'];
}
return $tTV;
}


if(isset($_POST["i_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT income.type AS type,income.monthly_plan_id AS acc_typeN, income.amount AS amount, income.con_id AS con_id, income.no_unit AS no_unit,account_con.name AS un,account_con.measurement_no AS measurement_no,account_con.acc_type AS acc_type,account_con.id AS acc_id,account_con.user_id AS user_id,accounts.id AS user_id_user FROM income 

   INNER JOIN account_con
   ON income.con_id = account_con.id
   INNER JOIN accounts
   ON accounts.id = account_con.user_id

		WHERE income.id = '".$_POST["i_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["un"] = $row["un"];
		$output["meter"] = $row["measurement_no"];
       $output["noAcc"] = noAcc($row['user_id_user']);
      $output["bal"] = balUser($row["acc_id"]);
      $output["acc_typeV"] = selectAccType($row["acc_type"]);
      $output["first_name"] = $row["type"];
      $output["acc_typeN"] = $row["acc_typeN"];
      $output["acc_type"] = $row["acc_type"];
		$output["last_name"] = $row["amount"];
		$output["con_id"] = $row["con_id"];
		$output["noUnit"] = $row["no_unit"];

	}
	echo json_encode($output);
}
?>