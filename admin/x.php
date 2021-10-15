<?php
include('db.php');
$_POST["user_id5"]=1;
include('function5.php');
if(isset($_POST["user_id5"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM income 
		INNER JOIN account_con
		ON income.con_id = account_con.id
		WHERE account_con.user_id='".$_POST['id']."' AND income.created_at > '".$_POST['request']."'"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	$rowC=$statement->rowCount();

		$output["reloadedTime"] =$_POST['request'];
		$output["id"] =$_POST['id'];
		$output["rc"] =$rowC;

	
	echo json_encode($output);
}
?>