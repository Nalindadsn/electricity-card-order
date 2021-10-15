<?php
//include('db.php');
include '../main.php';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO tone1 (tone_name) 
			VALUES (:i_name)
		");
		$result = $statement->execute(
			array(
				':i_name'	=>	$_POST["i_name"]
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
			"UPDATE tone1 
			SET tone_name = :name
			WHERE tone_id = :id
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