<?php
include('../main.php');
include '../pr.php';

function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM incategory WHERE status=0");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query .= 'SELECT * FROM incategory WHERE status=0 ';
if(isset($_POST["search"]["value"]))
{
	$query .= 'AND  name LIKE "%'.$_POST["search"]["value"].'%" ';
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


	$sub_array = array();



	 $sub_array[] = $row["name"];
	 // if ($row['status']==0) {
	 // 	$sub_array[] =  '<span class="badge badge-pill badge-danger">Inactive</span>';
	 // }else{
	 // 	$sub_array[] =  '<span class="badge badge-pill badge-success">Active</span>';

	 // }

if ( pr($prArray[83])==1) {
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Update</button>';


}else{
	$sub_array[] = '<button type="button"  class="btn btn-warning btn-sm " disabled>Update</button>';
}


if ( pr($prArray[84])==1) {

	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Deactivate</button>';
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