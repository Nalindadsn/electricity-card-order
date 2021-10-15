<?php
include('db.php');




// echo "<pre>";
// print_r(balUser(1,1));
// echo "</pre>";

function getTypeV($x){
	include 'db.php';
$stmtIn = $pdo->prepare("
SELECT * FROM incategory WHERE id='".$x."'

  ");
$stmtIn->execute();
$inC = $stmtIn->fetch();
if (isset($inC['name'])) {
return $inC['name'];
}else{
	return "...";
}
}
function get_total_all_records_member($x)
{


	include('db.php');
	$statement = $pdo->prepare("SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE 
   income.con_id='".$x."'
UNION ALL
SELECT card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE 
   card.con_id='".$x."' ");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "

SELECT income.con_id AS con_id, income.type AS ptype,'in' AS type ,income.amount AS amount, income.created_at created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE 
   income.con_id='".$_POST['id']."'
UNION ALL
SELECT card.con_id AS con_id, card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE 
   (card.con_id='".$_POST['id']."') ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'AND 
	(amount LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY created_at DESC ';
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

if ($row["type"]=='in') {
	 $sub_array[] = getTypeV($row['ptype'])."<br>".$row['created_at'];
}else{

	 $sub_array[] = '<span class="text-success">card<br>'.$row['created_at']."</span>";
}
	 $sub_array[] = "<span style='float:right'>".number_format($row['amount'],2,",",".")."</span>";
	// $sub_array[] = $row["last_name"];
	//$sub_array[] = $row["status"];



// 	if ($row['shippedSt']==0) {

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-danger btn-sm updateS">Not Yet</button>';
// }else{

// 	$sub_array[] = '<button type="button" name="updateS" id="'.$row["id"].'" class="btn btn-success btn-sm updateS">shipped</button>';

// }




	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_member($_POST['id']),
	"data"				=>	$data
);
echo json_encode($output);
?>