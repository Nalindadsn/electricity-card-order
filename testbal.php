<?php

function upload_imageA()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_nameA($user_id)
{
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT image FROM accounts WHERE id = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_recordsA()
{
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records_cardsA()
{
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM cards");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function get_total_all_records_adminA()
{
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts WHERE role='Admin'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_all_records_memberA()
{
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM accounts WHERE role='Member'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
function activeAcc(){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM account_con WHERE status=1");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();

}
function inactiveAcc(){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM account_con WHERE status=0");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();

}
function monthWiseIncome(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%M") AS Month,SUM(amount) AS amount, COUNT(*) AS rowV FROM income
		WHERE YEAR(created_at) = YEAR(CURRENT_DATE())
GROUP BY DATE_FORMAT(created_at, "%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

}
function monthWiseAcc(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%M") AS Month, COUNT(*) AS rowV FROM account_con
		WHERE YEAR(created_at) = YEAR(CURRENT_DATE())
GROUP BY DATE_FORMAT(created_at, "%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

}
function income(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS incAm FROM income
		WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) 
');
	$statement->execute();
	$result = $statement->fetchAll();

foreach ($result as $val) {
  $sum= $val['incAm'];
}

return $sum;


}
function expenses(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS incAm FROM expenses
		WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) 
');
	$statement->execute();
	$result = $statement->fetchAll();

foreach ($result as $val) {
  $sum= $val['incAm'];
}

return $sum;
}

function bal(){

	include('admin/db.php');
$stmtIn = $pdo->prepare("
SELECT type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
UNION ALL
SELECT note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
 ORDER BY created_at
  ");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);
$tTV=0;
foreach ($inC as $keyT) {
		$tTV=$tTV+$keyT['amount'];
}
return $tTV;
}
function balUser($a,$b){

	include('admin/db.php');
$stmtIn = $pdo->prepare("
SELECT type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE 
   income.con_id='".$b."'
UNION ALL
SELECT note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE account_con.user_id='".$a."' AND
   card.con_id='".$b."'
 ORDER BY created_at

  ");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);
$tTV=0;
foreach ($inC as $keyT) {
		$tTV=$tTV+$keyT['amount'];
}

print_r($inC);
return $tTV;
}
echo "<pre>";
print_r(balUser(1,1));
echo "</pre>";


function excat()
{
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM excategory");
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
}

function acc_cat(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT * FROM acc_cat');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

}
function card_cat(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT * FROM card_cat');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

}
?>