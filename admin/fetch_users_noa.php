<?php
include('../main.php');
include '../pr.php';

function get_total_all_records_admin()
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts WHERE role='Member' AND  activation_code != 'activated'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function countCon($v){
	global $pdo;


	$statement = $pdo->prepare("SELECT * FROM account_con WHERE user_id='$v'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();

}

$query = '';
$output = array();
$query .= 'SELECT * FROM accounts WHERE (role="Member" AND activation_code != "activated") ';
if(isset($_POST["search"]["value"]))
{
	$query .= 'AND 
	(idno LIKE "%'.$_POST["search"]["value"].'%" ';
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



	if ($row["nicF"]=='') {
	$sub_array[] =" <a class=' btn btn-warning btn-sm'><i class='fas fa-exclamation-triangle'></i> NIC Front</a>";
	}else{

	$sub_array[] =" <a class='btn btn-primary btn-sm ' href='admin/nicF/".$row["nicF"]."'><i class='fa fa-check' aria-hidden='true'></i> NIC Front</a>";
	}


	if ($row["nicB"]=='') {
	$sub_array[] =" <a class=' btn btn-warning btn-sm'><i class='fas fa-exclamation-triangle'></i> NIC Back</a>";
	}else{

	$sub_array[] =" <a class='btn btn-primary btn-sm ' href='admin/nicB/".$row["nicB"]."'><i class='fa fa-check' aria-hidden='true'></i> NIC Back</a>";
	}


	if ($row["sign"]=='') {
	$sub_array[] =" <a class=' btn btn-warning btn-sm'><i class='fas fa-exclamation-triangle'></i>  Pass Book</a>";
	}else{

	$sub_array[] =" <a class='btn btn-primary btn-sm ' href='admin/sign/".$row["sign"]."'><i class='fa fa-check' aria-hidden='true'></i> Signature</a>";
	}


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
		$sub_array[] = '<span class="badge badge-pill badge-success">Activated</span>'.'<br><a href="userProfile.php?id='.$row['id'].'">view profile</a>';
	}
	else {
		# code...
		$sub_array[] = '<span class="badge badge-pill badge-danger">  Not Activated</span>'.'<br><a href="userProfile.php?id='.$row['id'].'">view profile</a>';
	}




	// if ($row['activation_code']=="activated") {
	// $sub_array[] =  '<button type="button"   class="btn btn-success btn-sm update">Activated</button>';

	// }else{


	// $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Activate</button>';



	// }
	


	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Activate</button>';




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