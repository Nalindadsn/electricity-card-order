<?php

function upload_image()
{
	if(isset($_FILES["user_image6"]))
	{
		$extension = explode('.', $_FILES['user_image6']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['user_image6']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id6)
{
	include('db.php');
	$statement = $pdo->prepare("SELECT image FROM accounts WHERE id = '$user_id6'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM  account_con
INNER JOIN accounts
ON account_con.user_id=accounts.id");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>