<?php
//insert
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}



		$statement = $pdo->prepare("
			INSERT INTO accounts (username,salutation,name, idno, image,activation_code,role,password) 
			VALUES (:username,:salutation,:first_name, :last_name, :image,:status,:role,:password)
		");

		$result = $statement->execute(
			array(
				':username'	=>	$_POST["username"],
				':salutation'	=>	$_POST["salutation"],
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':image'		=>	$image,
				':status'		=>	"activated",
				':role'		=>	"Admin",
				':password'		=>	password_hash($_POST["password"], PASSWORD_DEFAULT)
			)
		);


		
		if(!empty($result))
		{
			echo 'Data Inserted';
		}


	}



	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
if ($_POST["password"]=='') {
		$statement = $pdo->prepare(
			"UPDATE accounts 
			SET username = :username,salutation = :salutation, first_name = :first_name, idno = :last_name, image = :image,activation_code=:status  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':username'	=>	$_POST["username"],
				':salutation'	=>	$_POST["salutation"],
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':image'		=>	$image,
				':status'		=>	"activated",
				':id'			=>	$_POST["user_id"]
			)
		);
}else{
		$statement = $pdo->prepare(
			"UPDATE accounts 
			SET username = :username,salutation = :salutation,first_name = :first_name, idno = :last_name, image = :image,activation_code=:status,password=:password  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':username'	=>	$_POST["username"],
				':salutation'	=>	$_POST["salutation"],
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':image'		=>	$image,
				':status'		=>	"activated",
				':password'		=>	password_hash($_POST["password"], PASSWORD_DEFAULT),
				':id'			=>	$_POST["user_id"]
			)
		);


}
		if(!empty($result))
		{
			echo 'Data Updated';
		}


	}



}



			//echo $_POST["user_idS"];

?>