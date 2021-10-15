<?php
include('db.php');
include('function5.php');
if(isset($_POST["user_id5"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM accounts 
		WHERE id = '".$_POST["user_id5"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["first_name5"] = $row["name"];
		$output["idno5"] = $row["idno"];
		if($row["sign"] != '')
		{
			$output['user_image5'] = '<img src="admin/sign/'.$row["sign"].'" class="img-thumbnail" width="150"  /><input type="hidden" name="hidden_user_image5" value="'.$row["sign"].'" />';
		}
		else
		{
			$output['user_image5'] = '<input type="hidden" name="hidden_user_image5" value="" />';
		}
	}
	echo json_encode($output);
}
?>