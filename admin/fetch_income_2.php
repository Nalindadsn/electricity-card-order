<?php
include('../main.php');
include '../pr.php';
include('function8.php');

function selectUser($u)
{
	include('db.php');
	$statement = $pdo->prepare("SELECT * FROM  accounts WHERE id='".$u."'");
	$statement->execute();
	$result = $statement->fetch();
	if (isset($result['username'])) {
	return $result['username'];
	}else{
	return '<span class="text-danger">No User</span>';

	}
}

$query = '';
$output = array();
$query .= 'SELECT income.*,accounts.idno AS idno,acc_cat.name AS acc_type,incategory.name AS inName,account_con.status AS ac_status, account_con.measurement_no AS measurement_no,accounts.username AS username FROM income 
INNER JOIN account_con
ON income.con_id=account_con.id
INNER JOIN accounts
ON account_con.user_id=accounts.id
INNER JOIN acc_cat
ON acc_cat.id=account_con.acc_type
INNER JOIN incategory
ON incategory.id=income.type
 WHERE income.type!=1 AND ';
if(isset($_POST["search"]["value"]))
{
	$query .= '(income.type LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR income.con_id LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY income.id DESC ';
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



if ( pr($prArray[68])==1) {

	 $sub_array[] = "IN00".$row["id"].'<br><a href="printAcc.php?id='.$row["id"].'">print</a>';

}else{

	 $sub_array[] = "IN00".$row["id"].'<br>';

}



	 $sub_array[] = $row["measurement_no"];

if ($row["ac_status"]==1) {
	 $sub_array[] = $row["idno"].'<br>Acc No : <span class="text-success">'.$row["con_id"]."</span><br><span class='btn btn-sm btn-primary'>".$row['acc_type'].'</span>';
}else{
	 $sub_array[] = $row["idno"].'<br>Acc No : <span class="text-danger">'.$row["con_id"]."</span><br><span class='btn btn-sm btn-primary'>".$row['acc_type'].'</span>';

}

	  $sub_array[] = $row["inName"];
	  $sub_array[] = $row["no_unit"];
	  $sub_array[] = $row["amount"];
	 $sub_array[] = $row["note"];
if (date('Y-m-d') == date('Y-m-d', strtotime($row["created_at"]))) {
	 $sub_array[] = '<i class="fas fa-circle text-success"></i> '.$row["created_at"].'<br> by '.selectUser($row["created_by"]);
}else{
	 $sub_array[] = $row["created_at"].'<br> by '.selectUser($row["created_by"]);
 }





// 	if ($row['shippedSt']==0) {

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-danger btn-sm updateS">Not Yet</button>';
// }else{

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-success btn-sm updateS">shipped</button>';

// }



if ( pr($prArray[67])==1) {

	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Update</button>';


}else{
	$sub_array[] = '<button type="button"  class="btn btn-warning btn-sm" disabled>Update</button>';

}




	// }
	


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