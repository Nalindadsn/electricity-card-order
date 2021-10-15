<?php
include('db.php');
include('function3.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement1 = $pdo->prepare(
		"SELECT * FROM tone 
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
		"SELECT * FROM ttwo 
		WHERE tone_id = '".$row1["tone_id"]."' "
	);
	$statement2->execute();
	$result2 = $statement2->fetchAll();
	foreach($result2 as $row2)
	{
		$statement3 = $pdo->prepare(
			"SELECT * FROM tthree 
			WHERE ttwo_id = '".$row2["ttwo_id"]."' "
		);
		$statement3->execute();
		$result3 = $statement3->fetchAll();
		foreach ($result3 as  $value3) {
			$n++;
		$statement4 = $pdo->prepare(
			"SELECT * FROM tfour 
			WHERE tthree_id = '".$value3["tthree_id"]."' "
		);
		$statement4->execute();
		$result4 = $statement4->fetchAll();
		foreach ($result4 as  $value4) {


			$nn++;
		}
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
		$output["countV3"] = $nn;

	echo json_encode($output);
}
?>