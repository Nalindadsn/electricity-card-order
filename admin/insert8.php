<?php
include('db.php');
include('function3.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO expenses (name,amount,cat_id) 
			VALUES (:first_name,:last_name,:category)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
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
			"UPDATE expenses 
			SET name = :first_name,
			 amount = :last_name,
			 cat_id = :category
			WHERE id = :user_id
			"
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
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