<?php

include('db.php');

if(isset($_POST["user_id"]))
{

		$statement = $pdo->prepare(
			"UPDATE accounts 
			SET activation_code = :status
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':status'			=>	sprintf("%06d", mt_rand(1, 999999)),
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Activated';
		}

}



?>