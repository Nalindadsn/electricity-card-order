<?php
include('db.php');
include('function1.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $pdo->prepare(
		"SELECT * FROM products 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["p_name"] = $row["p_name"];
		$output["price"] = $row["price"];
		$output["cat_id"] = $row["cat_id"];
		$output["description"] = $row["description"];
		$output["v_link"] = $row["v_link"];
		$output["direct_c"] = $row["direct_c"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="products/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>