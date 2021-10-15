<?php
//include('db.php');
include '../main.php';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO ttwo (ttwo_name,tone_id) 
			VALUES (:i_name,:i_idv)
		");
		$result = $statement->execute(
			array(
				':i_name'	=>	$_POST["i_name"],
				':i_idv'	=>	$_POST["i_idv"]
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
			"UPDATE ttwo 
			SET ttwo_name = :name
			WHERE ttwo_id = :id
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