<?php

include('../main.php');
include '../pr.php';

function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM monthly_plan 
   INNER JOIN acc_cat
   ON monthly_plan.acc_cat_id = acc_cat.id  WHERE monthly_plan.acc_cat_id='".$_POST['actionE']."'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}



$query = '';
$output = array();
$query .= 'SELECT monthly_plan.*, acc_cat.name AS categoryN FROM monthly_plan
   INNER JOIN acc_cat
   ON monthly_plan.acc_cat_id = acc_cat.id WHERE (acc_cat_id='.$_POST['actionE'].')';
if(isset($_POST["search"]["value"]))
{
	$query .= ' AND (monthly_plan.condition_v LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY monthly_plan.condition_v asc ';
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



	 $sub_array[] = $row["categoryN"];
	 $sub_array[] = $row["condition_v"];
	 $sub_array[] = $row["amount"];



// 	if ($row['shippedSt']==0) {

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-danger btn-sm updateS">Not Yet</button>';
// }else{

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-success btn-sm updateS">shipped</button>';

// }



if ( pr($prArray[87])==1) {


	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">update</button>';

}else{
	$sub_array[] = '<button type="button"  class="btn btn-warning btn-sm " disabled>Update</button>';
}



	// }
	
if ( pr($prArray[88])==1) {



	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Delete</button>';
}else{

	$sub_array[] = '<button type="button"  class="btn btn-danger btn-sm " disabled>Deactivate</button>';
}




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