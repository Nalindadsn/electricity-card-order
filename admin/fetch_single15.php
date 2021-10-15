<?php
include('db.php');
if(isset($_POST["i_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM incategory 
		WHERE id = '".$_POST["i_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["i_name"] = $row["name"];

	}
	echo json_encode($output);
}
?>