<?php
//include('db.php');
include '../main.php';
function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM card");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
//echo $_POST["operation_b"];
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
	//echo $_POST['first_name_b'];

//echo $_POST["first_name"]."/".$_POST["last_name"]."/".$_POST["category"]."/".$_POST["noUnit"]."/".$_POST["i_id"];
		$statement = $pdo->prepare(
			"UPDATE income 
			SET note = :first_name,
			 amount = :last_name,
			 con_id = :category,
			 no_unit = :noUnit
			WHERE id = :i_id
			"
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':category'	=>	$_POST["category"],
				':noUnit'	=>	$_POST["noUnit"],
				':i_id'			=>	$_POST["i_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated==';
		}




	}}



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $pdo->prepare("
			INSERT INTO income (note,amount,con_id,no_unit,monthly_plan_id,created_by,type) 
			VALUES (:first_name,:last_name,:category,:noUnit,:acc_typeN,:created_by,:type)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':category'	=>	$_POST["category"],
				':noUnit'	=>	$_POST["noUnit"],
				':acc_typeN'	=>	$_POST["acc_typeN"],
				':created_by'	=>	$_SESSION["id"],
				':type'	=>	1
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}





}

?>