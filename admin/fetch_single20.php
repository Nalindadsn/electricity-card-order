<?php
include('db.php');
include('../function_locations.php');
include('../function_locations1.php');
if(isset($_POST["i_id_a"]))
{

	$statementValM = $pdo->prepare("SELECT * FROM account_con 
		WHERE id = '".$_POST["i_id_a"]."' 
		LIMIT 1");
	$statementValM->execute();
	$resultValM = $statementValM->fetch();


	$statementValUser = $pdo->prepare("SELECT * FROM accounts 
		WHERE id = '".$resultValM["user_id"]."' 
		LIMIT 1");
	$statementValUser->execute();
	$resultValUser = $statementValUser->fetch();







	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM account_con 
		WHERE id = '".$_POST["i_id_a"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["acc_no_a"] = $row["id"];
		$output["acc_cat_a"] = $row["acc_type"];
		$output["no_beneficiaries_a"] = $row["no_beneficiaries"];
		$output["measurement_no_a"] = $row["measurement_no"];
		$output["phone_fixed_a"] = $row["phone_fixed"];
		$output["phone_mobile_a"] = $row["phone_mobile"];
		$output["house_no_a"] = $row["house_no"];
		$output["note_a"] = $row["note"];
		
		

		$output["userN"] = $resultValUser['name'];
		$output["userId"] = $resultValUser['idno'];
		$output["userImg"] = $resultValUser['image'];

		// $output["tthreeV"] = getThreeN($row['tthree_id']);
		// $output["ttwoV"] = getTwoN(getThreeI($row['tthree_id']));
		// $output["toneV"] = getOneN(getTwoI(getThreeI($row['tthree_id'])));


	}
	echo json_encode($output);
}
?>