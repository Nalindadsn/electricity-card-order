<?php

include('db.php');

if(isset($_POST["user_id"]))
{


		$statement = $pdo->prepare(
			"DELETE FROM card
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'deleted';
		}

}



?>