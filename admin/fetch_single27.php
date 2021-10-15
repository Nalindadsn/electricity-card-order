<?php
include('db.php');
if(isset($_POST["i_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM card 
		WHERE id = '".$_POST["i_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["con_id"] = $row["con_id"];
		$output["note"] = $row["note"];

	}
	echo json_encode($output);
}
?>