<?php
include('db.php');
include('function6.php');
if(isset($_POST["operation6"]))
{
	if($_POST["operation6"] == "Add")
	{
		$image = '';
		if($_FILES["user_image6"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $pdo->prepare("
			INSERT INTO accounts (first_name, last_name, nicB) 
			VALUES (:first_name, :last_name, :image)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name6"],
				':last_name'	=>	$_POST["idno6"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation6"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image6"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image6"];
		}
		$statement = $pdo->prepare(
			"UPDATE accounts 
			SET name = :first_name,  image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name6"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id6"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>