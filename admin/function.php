<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id)
{
	include('db.php');
	$statement = $pdo->prepare("SELECT image FROM accounts WHERE id = '$user_id'");
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
	$statement = $pdo->prepare("SELECT * FROM accounts");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records_payments()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM payments");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records_admin()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts WHERE role='Admin'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_member()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts WHERE role='Member'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>