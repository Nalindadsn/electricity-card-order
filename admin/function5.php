<?php

function upload_image()
{
	if(isset($_FILES["user_image5"]))
	{
		$extension = explode('.', $_FILES['user_image5']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './sign/' . $new_name;
		move_uploaded_file($_FILES['user_image5']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id5)
{
	include('db.php');
	$statement = $pdo->prepare("SELECT sign FROM accounts WHERE id = '$user_id5'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["sign"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>