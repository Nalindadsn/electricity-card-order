<?php
include('db.php');
if(isset($_POST["i_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM ttwo2 
		WHERE ttwo_id = '".$_POST["i_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["i_name"] = $row["ttwo_name"];
		$output["i_idv"] = $row["tone_id"];

	}
	echo json_encode($output);
}
?>