<?php
include('db.php');
include('function3.php');
if(isset($_POST["user_id"]))
{
	$output = array();

	$statement2 = $pdo->prepare(
		"SELECT * FROM ttwo 
		WHERE ttwo_id = '".$_POST["user_id"]."' LIMIT 1"
	);
	$statement2->execute();
	$result2 = $statement2->fetchAll();
	foreach($result2 as $row2)
	{

	$statement1 = $pdo->prepare(
		"SELECT * FROM tone 
		WHERE tone_id = '".$row2["tone_id"]."' LIMIT 1"
	);
	$statement1->execute();
	$result1 = $statement1->fetchAll();
	foreach ($result1 as $key1) {
		
	$output["parent"] = $key1["tone_name"];
	$output["parentID"] = $key1["tone_id"];
	}



	$output["tone_name"] = $row2["ttwo_name"];

	}

	




	echo json_encode($output);
}
?>