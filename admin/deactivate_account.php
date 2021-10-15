<?php

include('db.php');

if(isset($_POST["i_id_a"]))
{


		$statement = $pdo->prepare(
			"UPDATE account_con 
			SET status = :status
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':status'			=>	0,
				':id'			=>	$_POST["i_id_a"]
			)
		);
		if(!empty($result))
		{
			echo 'Account Disconnected  ';
		}

}



?>