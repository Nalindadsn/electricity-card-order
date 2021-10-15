<?php

include('db.php');

if(isset($_POST["user_id"]))
{

	$statement = $pdo->prepare(
		"DELETE FROM user_privilege WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>