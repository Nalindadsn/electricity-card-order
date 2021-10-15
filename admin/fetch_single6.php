<?php
include('db.php');
include('function6.php');
if(isset($_POST["user_id6"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM accounts 
		WHERE id = '".$_POST["user_id6"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["first_name6"] = $row["name"];
		$output["idno6"] = $row["idno"];
		if($row["image"] != '')
		{
			$output['user_image6'] = '<img src="admin/upload/'.$row["image"].'" class="img-thumbnail" width="150"  /><input type="hidden" name="hidden_user_image6" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image6'] = '<input type="hidden" name="hidden_user_image6" value="" />';
		}
	}
	echo json_encode($output);
}
?>