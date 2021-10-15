<?php
include('db.php');

function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM expenses 
   INNER JOIN excategory
   ON expenses.cat_id = excategory.id  WHERE expenses.cat_id='".$_POST['actionE']."'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_cat_name()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM  excategory  WHERE id='".$_POST['actionE']."'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $result['name'];
}


$query = '';
$output = array();
$query .= 'SELECT expenses.*, excategory.name AS categoryN FROM expenses
   INNER JOIN excategory
   ON expenses.cat_id = excategory.id WHERE (cat_id='.$_POST['actionE'].')';
if(isset($_POST["search"]["value"]))
{
	$query .= ' AND (expenses.name LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY expenses.id DESC ';
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


	$sub_array = array();


	 $sub_array[] = "EX00".$row["id"];

	 $sub_array[] = $row["categoryN"];
	 $sub_array[] = $row["name"]."--".$_POST['actionE'];
	 $sub_array[] = $row["amount"];
	$sub_array[] = $row["created_at"];
// if ($row["created_at"]) {
// 	# code...
// }


// 	if ($row['shippedSt']==0) {

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-danger btn-sm updateS">Not Yet</button>';
// }else{

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-success btn-sm updateS">shipped</button>';

// }



	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">update</button>';


	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">delete</button>';



	// }
	


	// $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Delete</button>';
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