<?php

include('db.php');

if(isset($_POST["i_id"]))
{


		$statement = $pdo->prepare(
			"UPDATE incategory 
			SET status = :status
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':status'			=>	1,
				':id'			=>	$_POST["i_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Activated';
		}

}



?>