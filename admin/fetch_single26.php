<?php
include('db.php');
if(isset($_POST["i_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM expenses 
		WHERE id = '".$_POST["i_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["name"] = $row["name"];
		$output["cat_id"] = $row["cat_id"];
		$output["amount"] = $row["amount"];

	}
	echo json_encode($output);
}
?>