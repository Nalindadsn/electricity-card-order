<?php
include('db.php');
include('function.php');
if(isset($_POST["user_idS"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM accounts 
		WHERE id = '".$_POST["user_idS"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["shippedSt"] = $row["shippedSt"];

	}
	echo json_encode($output);
}
?>