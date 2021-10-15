<?php
include('db.php');
include('function3.php');
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
		$output["first_name"] = $row["name"];
		$output["idno"] = $row["idno"];
		if($row["nicF"] != '')
		{
			$output['user_image'] = '<img src="admin/nicF/'.$row["nicF"].'" class="img-thumbnail" width="150"  /><input type="hidden" name="hidden_user_image" value="'.$row["nicF"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>