<?php
//include('db.php');
include '../main.php';
function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM card");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


if(isset($_POST["operation1"]))
{
	if($_POST["operation1"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO card (note,con_id) 
			VALUES (:first_name,:category)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name1"],
				':category'	=>	$_POST["category1"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
}

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO card (note,con_id) 
			VALUES (:first_name,:category)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':category'	=>	$_POST["category"]
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
			"UPDATE card 
			SET note = :first_name,
			 con_id = :category
			WHERE id = :user_id
			"
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':category'	=>	$_POST["category"],
				':user_id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>