<?php
include('db.php');
if(isset($_POST["i_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM settings_web 
		WHERE id = '".$_POST["i_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["i_name"] = $row["col_val"];
		$output["i_type"] = $row["type"];

	}
	echo json_encode($output);
}
?>