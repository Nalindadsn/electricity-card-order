<?php
include('db.php');
include('function3.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement1 = $pdo->prepare(
		"SELECT * FROM tone1 
		WHERE tone_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$n=0;
	$nn=0;
	$statement1->execute();
	$result1 = $statement1->fetchAll();
	foreach($result1 as $row1)
	{
	$statement2 = $pdo->prepare(
		"SELECT * FROM ttwo1 
		WHERE tone_id = '".$row1["tone_id"]."' "
	);
	$statement2->execute();
	$result2 = $statement2->fetchAll();
	foreach($result2 as $row2)
	{
		$statement3 = $pdo->prepare(
			"SELECT * FROM tthree1 
			WHERE ttwo_id = '".$row2["ttwo_id"]."' "
		);
		$statement3->execute();
		$result3 = $statement3->fetchAll();
		foreach ($result3 as  $value3) {
			$n++;


		}

	$output["tone_name"] = $row1["tone_name"];
		
	}

	



	}

		$output["countV"] = 0;
		$output["countV2"] = 0;
		$output["countV3"] = 0;

		$rowCount2=$statement2->rowCount();
		$output["countV"] = $rowCount2;
		$output["countV2"] = $n;
		$output["countV3"] = 0;

	echo json_encode($output);
}
?>