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

function countCon($v){
	global $pdo;


	$statement = $pdo->prepare("SELECT * FROM account_con WHERE user_id='$v'");
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


function incomeThisM(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%M") AS Month,SUM(amount) AS amount, COUNT(*) AS rowV FROM income
		 WHERE  year(created_at) > year(curdate()) or
      (year(created_at) = year(curdate()) and month(created_at) >= month(curdate()) )
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

}
function incomeLastM(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%M") AS Month,SUM(amount) AS amount, COUNT(*) AS rowV FROM income
		WHERE YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)
AND MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)

');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

}


function bal(){
	include('admin/db.php');
$stmtIn = $pdo->prepare("
SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id 
UNION ALL
SELECT card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
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

function balThisM(){
	include('admin/db.php');
$stmtIn = $pdo->prepare("
SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE  year(income.created_at) > year(curdate()) or
      (year(income.created_at) = year(curdate()) and month(income.created_at) >= month(curdate()) )
UNION ALL
SELECT card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE  year(card.created_at) > year(curdate()) or
      (year(card.created_at) = year(curdate()) and month(card.created_at) >= month(curdate()) )
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
function balLastM(){
	include('admin/db.php');
$stmtIn = $pdo->prepare("
SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE  YEAR(income.created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)
AND MONTH(income.created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)
UNION ALL
SELECT card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE  YEAR(card.created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)
AND MONTH(card.created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)
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


function activeAcc(){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM account_con WHERE status=1");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();

}

function activeAccThisM(){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM account_con WHERE status=1 AND (year(account_con.created_at) > year(curdate()) or
      (year(account_con.created_at) = year(curdate()) and month(account_con.created_at) >= month(curdate()) ))");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();

}

function activeAccLastM(){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM account_con WHERE status=1 AND  (YEAR(account_con.created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)
AND MONTH(account_con.created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH))");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();

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

function expensesThisM(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS incAm FROM expenses WHERE year(expenses.created_at) > year(curdate()) or
      (year(expenses.created_at) = year(curdate()) and month(expenses.created_at) >= month(curdate()) )
');
	$statement->execute();
	$result = $statement->fetchAll();

foreach ($result as $val) {
  $sum= $val['incAm'];
}

return $sum;
}
function expensesLastM(){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS incAm FROM expenses WHERE  YEAR(expenses.created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)
AND MONTH(expenses.created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)
');
	$statement->execute();
	$result = $statement->fetchAll();

foreach ($result as $val) {
  $sum= $val['incAm'];
}

return $sum;
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






function balUser($a,$b){

	include('admin/db.php');
$stmtIn = $pdo->prepare("


SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE  account_con.user_id='".$a."' AND
   income.con_id='".$b."'
UNION ALL
SELECT card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE  account_con.user_id='".$a."' AND
   card.con_id='".$b."'
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
// echo "<pre>";
// print_r(balUser(1,1));
// echo "</pre>";


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