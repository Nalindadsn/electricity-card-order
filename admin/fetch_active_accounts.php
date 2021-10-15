<?php
include('../main.php');
include '../pr.php';
include('../function.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM  account_con
INNER JOIN accounts
ON account_con.user_id=accounts.id WHERE account_con.status=1");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


$query = '';
$output = array();
$query .= 'SELECT account_con.*,accounts.id AS u_id FROM  account_con
INNER JOIN accounts
ON account_con.user_id=accounts.id
 WHERE account_con.status=1 ';
if(isset($_POST["search"]["value"]))
{
	$query .= 'AND (account_con.id	 LIKE "%'.$_POST["search"]["value"].'%" )';
	// $query .= 'OR account_con.id	 LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY account_con.id DESC ';
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



	 if ($row['status']==0) {
	 	$sub_array[] =  $row["id"].' <span class="badge badge-pill badge-danger">Inactive</span>';
	 }else{
	 	$sub_array[] =  $row["id"].' <span class="badge badge-pill badge-success">Active</span>';

	 }

	 $sub_array[] = $row["measurement_no"];
	
	 $sub_array[] = $row["no_beneficiaries"];
	 $sub_array[] = $row["phone_fixed"];
	 $sub_array[] = $row["phone_mobile"];



if (date('Y-m-d') == date('Y-m-d', strtotime($row["created_at"]))) {
	 $sub_array[] = '<i class="fas fa-circle text-success"></i> '.$row["created_at"];
}else{
	 $sub_array[] = $row["created_at"];
 }





// 	if ($row['shippedSt']==0) {

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-danger btn-sm updateS">Not Yet</button>';
// }else{

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-success btn-sm updateS">shipped</button>';

// }



	// $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Update</button>';



	// }
	


	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Update</button>';




	if ($row["status"]==0) {
		$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete" disabled>Deactivated</button>';
	}else{
		$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Deactivate</button>';
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