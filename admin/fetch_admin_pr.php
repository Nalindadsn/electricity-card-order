<?php
include('db.php');
include('function.php');

function countCon($v){
	global $pdo;


	$statement = $pdo->prepare("SELECT * FROM account_con WHERE user_id='$v'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();

}

$query = '';
$output = array();
$query .= 'SELECT * FROM accounts WHERE role="Admin"';
if(isset($_POST["search"]["value"]))
{
	$query .= 'AND 
	(first_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR username LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR last_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR idno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR status LIKE "%'.$_POST["search"]["value"].'%") ';
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

		$image = '<img src="admin/upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '<img src="./img/user-profile.png" class="img-thumbnail" width="50" height="35" />';
	}
	$sub_array = array();
	$sub_array[] = $image;




$sub_array[] ="USER TYPE : ".$row['role']."<br>USERNAME : ".$row['username']."<br><span class='badge badge-pill badge-primary'>".$row['email']."</span><br>NIC : ".$row['idno']."<br>No of Accounts : ".countCon($row['id']);

	// $sub_array[] = $row["first_name"];
	// $sub_array[] = $row["last_name"];
	//$sub_array[] = $row["status"];



// 	if ($row['shippedSt']==0) {

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-danger btn-sm updateS">Not Yet</button>';
// }else{

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-success btn-sm updateS">shipped</button>';

// }





	if ($row['activation_code']=="activated") {
		# code...
		$sub_array[] = '<span class="badge badge-pill badge-success">Activated</span><hr class="mt-3 mb-2"><a href="user_privilege.php?id='.$row['id'].'">ADD PRIVILEGES</a><hr class="mt-3 mb-2"><a href="view_privilege.php?id='.$row['id'].'">VIEW/DELETE</a>';
	}
	else {
		# code...
		$sub_array[] = '<span class="badge badge-pill badge-danger">  Not Activated</span><hr class="mt-3 mb-2"><a href="user_privilege.php?id='.$row['id'].'">ADD PRIVILEGES</a><hr class="mt-3 mb-2"><a href="view_privilege.php?id='.$row['id'].'">VIEW/DELETE</a>';
	}

	// if ($row['activation_code']=="activated") {
	// $sub_array[] =  '<button type="button"   class="btn btn-success btn-sm update">Activated</button>';

	// }else{



	// }





	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_admin(),
	"data"				=>	$data
);
echo json_encode($output);
?>