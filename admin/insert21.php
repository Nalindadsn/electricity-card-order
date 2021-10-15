<?php
//include('db.php');
include '../main.php';

		//echo $_POST["ttwo_change"];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO tthree (tthree_name,ttwo_id) 
			VALUES (:i_name,:ttwo_change)
		");
		$result = $statement->execute(
			array(
				':i_name'	=>	$_POST["i_name"],
				':ttwo_change'	=>	$_POST["ttwo_change"]
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
			"UPDATE tthree 
			SET tthree_name = :name
			WHERE tthree_id = :id
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