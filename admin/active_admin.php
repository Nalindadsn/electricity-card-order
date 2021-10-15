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
				':status'			=>	'activated',
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Activated';
		}

}



?>