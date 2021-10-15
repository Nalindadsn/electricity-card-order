<?php
//include('db.php');
include '../main.php';

		//echo $_POST["ttwo_change"];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO tfour (tfour_name,tthree_id) 
			VALUES (:i_name,:tthree_result)
		");
		$result = $statement->execute(
			array(
				':i_name'	=>	$_POST["i_name"],
				':tthree_result'	=>	$_POST["tthree_result"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}


	if($_POST["operation"] == "Edit")
	{

		$statement = $pdo->prepare(
			"UPDATE tfour 
			SET tfour_name = :name
			WHERE tfour_id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["i_name"],
				':id'			=>	$_POST["i_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}



}

?>