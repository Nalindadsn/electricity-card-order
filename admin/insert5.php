<?php
include('db.php');
include('function5.php');
if(isset($_POST["operation5"]))
{
	if($_POST["operation5"] == "Add")
	{
		$image = '';
		if($_FILES["user_image5"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $pdo->prepare("
			INSERT INTO accounts (name,  bank) 
			VALUES (:first_name5, :image)
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["first_name5"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation5"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image5"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image5"];
		}
		$statement = $pdo->prepare(
			"UPDATE accounts 
			SET name = :first_name,  sign = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name5"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id5"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
			//header("Location: http://www.example.com/another-page.php", true, 301);
		}
	}
}

?>