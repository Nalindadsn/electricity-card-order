<?php
include('db.php');
include('function3.php');
if(isset($_POST["operation_a"]))
{

	if($_POST["operation_a"] == "Edit")
	{



		$statement = $pdo->prepare(
			"UPDATE account_con 
			SET acc_type = :acc_cat_a, 
			no_beneficiaries = :no_beneficiaries_a, 
			phone_mobile=:phone_mobile_a,
			phone_fixed=:phone_fixed_a,
			house_no=:house_no_a,
			measurement_no=:measurement_no_a,
			note=:note_a
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':acc_cat_a'	=>	$_POST["acc_cat_a"],
				':no_beneficiaries_a'	=>	$_POST["no_beneficiaries_a"],
				':phone_mobile_a'	=>	$_POST["phone_mobile_a"],
				':phone_fixed_a'	=>	$_POST["phone_fixed_a"],
				':house_no_a'	=>	$_POST["house_no_a"],
				':measurement_no_a'	=>	$_POST["measurement_no_a"],
				':note_a'	=>	$_POST["note_a"],
				':id'			=>	$_POST["i_id_a"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>