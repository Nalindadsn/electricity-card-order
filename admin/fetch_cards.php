<?php
include('../main.php');
include '../pr.php';
include('function8.php');


$query = '';
$output = array();
$query .= 'SELECT card.*,acc_cat.name AS acc_type,account_con.status AS ac_status, account_con.measurement_no AS measurement_no,accounts.username AS username FROM card 
INNER JOIN account_con
ON card.con_id=account_con.id
INNER JOIN accounts
ON account_con.user_id=accounts.id
INNER JOIN acc_cat
ON acc_cat.id=account_con.acc_type
 WHERE ';
if(isset($_POST["search"]["value"]))
{
	$query .= 'card.note LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR card.con_id LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY card.id DESC ';
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


if ( pr($prArray[73])==1) {

	 $sub_array[] = "PY00".$row["id"].'<br>';

}else{

	 $sub_array[] = "PY00".$row["id"].'<br>';

}



	 $sub_array[] = $row["measurement_no"];

if ($row["ac_status"]==1) {
	if ($row['acc_type']=="business") {
	 $sub_array[] = $row["username"].'<br>Acc No : <span class="text-success">'.$row["con_id"]."</span><br><span class='btn btn-sm btn-primary'>".$row['acc_type'].'</span>';
	}else{

	 $sub_array[] = $row["username"].'<br>Acc No : <span class="text-warning">'.$row["con_id"]."</span><br><span class='btn btn-sm btn-primary'>".$row['acc_type'].'</span>';
	}
}else{
	 $sub_array[] = $row["username"].'<br>Acc No : <span class="text-danger">'.$row["con_id"]."</span><br><span class='btn btn-sm btn-primary'>".$row['acc_type'].'</span>';

}
	 $sub_array[] = $row["note"];
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




	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Update</button>';








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