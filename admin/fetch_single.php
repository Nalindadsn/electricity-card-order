<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM accounts 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["username"] = $row["username"];
		$output["salutation"] = $row["salutation"];
		$output["last_name"] = $row["idno"];
		$output["status"] = $row["activation_code"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="admin/upload/'.$row["image"].'" class="img-thumbnail" width="150"  /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>