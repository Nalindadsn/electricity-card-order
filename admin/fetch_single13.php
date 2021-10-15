<?php
include('db.php');
if(isset($_POST["i_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM tone 
		WHERE tone_id = '".$_POST["i_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["i_name"] = $row["tone_name"];

	}
	echo json_encode($output);
}
?>