<?php
include('db.php');
include('function1.php');
$query = '';
$output = array();
$query .= "SELECT * FROM products ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE p_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR price LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR cat_id LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR description LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="products/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["p_name"];
	$sub_array[] = "Rs. ".$row["price"];
	$sub_array[] = "Rs. ".$row["price"]." * ".$row["direct_c"]."% <hr> Rs. ".($row["price"]*$row["direct_c"])/100;
	$sub_array[] = $row["cat_id"];
	$sub_array[] = $row["description"];
	$sub_array[] = $row["v_link"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>