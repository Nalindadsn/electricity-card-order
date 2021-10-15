<?php
include('db.php');
include('function4.php');
if(isset($_POST["user_id4"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM accounts 
		WHERE id = '".$_POST["user_id4"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["first_name4"] = $row["name"];
		$output["idno4"] = $row["idno"];
		if($row["nicB"] != '')
		{
			$output['user_image4'] = '<img src="admin/nicB/'.$row["nicB"].'" class="img-thumbnail" width="150"  /><input type="hidden" name="hidden_user_image4" value="'.$row["nicB"].'" />';
		}
		else
		{
			$output['user_image4'] = '<input type="hidden" name="hidden_user_image4" value="" />';
		}
	}
	echo json_encode($output);
}
?>