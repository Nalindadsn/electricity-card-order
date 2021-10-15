<?php
include('db.php');
include('privilege.php');

function get_total_all_records()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM user_privilege  WHERE user_privilege.user_id='".$_POST['actionE']."'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}



function get_name($v)
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts  WHERE id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	if (isset($result['name'])) {
		return $result['name'];
	}else{
		return '...';

	}
}



$query = '';
$output = array();
$query .= 'SELECT * FROM user_privilege
    WHERE (user_id='.$_POST['actionE'].')';
if(isset($_POST["search"]["value"]))
{
	$query .= ' AND (user_privilege.user_id LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY user_privilege.id DESC ';
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



	 $sub_array[] =getPrivilege($row["requirement_id"]);
	 $sub_array[] = get_name($row["created_by"]);
	$sub_array[] = $row["created_at"];
if ($row["created_at"]) {
	# code...
}


// 	if ($row['shippedSt']==0) {

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-danger btn-sm updateS">Not Yet</button>';
// }else{

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-success btn-sm updateS">shipped</button>';

// }





	// }
	


	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Delete</button>';
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