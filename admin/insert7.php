<?php
include('db.php');
include('function3.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO tone (tone_name) 
			VALUES (:tone_name)
		");
		$result = $statement->execute(
			array(
				':tone_name'	=>	$_POST["tone_name"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Add1")
	{

		$statement = $pdo->prepare("
			INSERT INTO ttwo (tone_id,ttwo_name) 
			VALUES (:tone_id,:ttwo_name)
		");
		$result = $statement->execute(
			array(
				':tone_id'	=>	$_POST["user_id"],
				':ttwo_name'	=>	$_POST["tone_name"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Add2")
	{

		$statement = $pdo->prepare("
			INSERT INTO tthree (ttwo_id,tthree_name) 
			VALUES (:ttwo_id,:tthree_name)
		");
		$result = $statement->execute(
			array(
				':ttwo_id'	=>	$_POST["user_id"],
				':tthree_name'	=>	$_POST["tone_name"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Add3")
	{

		$statement = $pdo->prepare("
			INSERT INTO tfour (tthree_id,tfour_name) 
			VALUES (:tthree_id,:tfour_name)
		");
		$result = $statement->execute(
			array(
				':tthree_id'	=>	$_POST["user_id"],
				':tfour_name'	=>	$_POST["tone_name"]
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
			"UPDATE tone 
			SET tone_name = :tone_name
			WHERE tone_id = :tone_id
			"
		);
		$result = $statement->execute(
			array(
				':tone_name'	=>	$_POST["tone_name"],
				':tone_id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
	if($_POST["operation"] == "Edit1")
	{

		$statement = $pdo->prepare(
			"UPDATE ttwo 
			SET ttwo_name = :ttwo_name
			WHERE ttwo_id = :ttwo_id
			"
		);
		$result = $statement->execute(
			array(
				':ttwo_name'	=>	$_POST["tone_name"],
				':ttwo_id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
	if($_POST["operation"] == "Edit2")
	{

		$statement = $pdo->prepare(
			"UPDATE tthree 
			SET tthree_name = :tthree_name
			WHERE tthree_id = :tthree_id
			"
		);
		$result = $statement->execute(
			array(
				':tthree_name'	=>	$_POST["tone_name"],
				':tthree_id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
	if($_POST["operation"] == "Edit3")
	{

		$statement = $pdo->prepare(
			"UPDATE tfour 
			SET tfour_name = :tfour_name
			WHERE tfour_id = :tfour_id
			"
		);
		$result = $statement->execute(
			array(
				':tfour_name'	=>	$_POST["tone_name"],
				':tfour_id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>