<?php

include('db.php');

if(isset($_POST["user_id"]))
{


		$statement = $pdo->prepare(
			"UPDATE acc_cat 
			SET status = :status
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':status'			=>	0,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Deleted';
		}

}



?>