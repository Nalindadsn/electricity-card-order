<?php 

function income($y){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%M-%Y") AS Month, DATE_FORMAT(created_at, "%m") AS MonthN, DATE_FORMAT(created_at, "%Y") AS MonthY,SUM(amount) AS amount, COUNT(*) AS rowV FROM income
		WHERE YEAR(date(created_at))="'.$y.'"
GROUP BY DATE_FORMAT(created_at, "%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
}
function incomeM($y,$m){	
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%d") AS DateV,SUM(amount) AS amount,  COUNT(*) AS rowV FROM income
		WHERE YEAR(date(created_at))="'.$y.'"  AND MONTH(date(created_at))="'.$m.'"
GROUP BY DATE_FORMAT(created_at, "%d-%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}

function expenses($y){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%M-%Y") AS Month, DATE_FORMAT(created_at, "%m") AS MonthN, DATE_FORMAT(created_at, "%Y") AS MonthY,SUM(amount) AS amount, COUNT(*) AS rowV FROM expenses
		WHERE YEAR(date(created_at))="'.$y.'"
GROUP BY DATE_FORMAT(created_at, "%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}

function expensesCat($y){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS amount, COUNT(*) AS rowV, cat_id AS cat_id FROM expenses
		WHERE YEAR(date(created_at))="'.$y.'"
GROUP BY cat_id 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}
function incomeCat($y){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS amount, COUNT(*) AS rowV, type AS cat_id FROM income
		WHERE YEAR(date(created_at))="'.$y.'"
GROUP BY cat_id 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}

function expensesCatM($y,$m){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS amount, COUNT(*) AS rowV, cat_id AS cat_id FROM expenses
		WHERE  YEAR(date(created_at))="'.$y.'"  AND MONTH(date(created_at))="'.$m.'"
GROUP BY cat_id 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}
function incomeCatM($y,$m){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT SUM(amount) AS amount, COUNT(*) AS rowV, type AS cat_id FROM income
		WHERE  YEAR(date(created_at))="'.$y.'"  AND MONTH(date(created_at))="'.$m.'"
GROUP BY cat_id 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}

function expensesM($y,$m){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%d") AS DateV,SUM(amount) AS amount,  COUNT(*) AS rowV FROM expenses
		WHERE YEAR(date(created_at))="'.$y.'"  AND MONTH(date(created_at))="'.$m.'"
GROUP BY DATE_FORMAT(created_at, "%d-%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}
function cards($y){
	
}
function cardsM($m){
	
}
function yearsL(){
		include('admin/db.php');
	$statement = $pdo->prepare('
SELECT EXTRACT(year from created_at) as year
FROM income
GROUP BY year ORDER BY year DESC

');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}
function getExCatR($x){
	include 'admin/db.php';
$stmtIn = $pdo->prepare("
SELECT * FROM excategory WHERE id='".$x."'

  ");
$stmtIn->execute();
$inC = $stmtIn->fetch();
if (isset($inC['name'])) {
return $inC['name'];
}else{
	return "...";
}
}
function getInCatR($x){
	include 'admin/db.php';
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
// echo "<pre>";
//  print_r(expensesCat('2020')) ;


function cardF($y){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%M-%Y") AS Month, DATE_FORMAT(created_at, "%m") AS MonthN, DATE_FORMAT(created_at, "%Y") AS MonthY,SUM(amount) AS amount, COUNT(*) AS rowV FROM card
		WHERE YEAR(date(created_at))="'.$y.'"
GROUP BY DATE_FORMAT(created_at, "%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}

function cardM($y,$m){
	include('admin/db.php');
	$statement = $pdo->prepare('SELECT DATE_FORMAT(created_at, "%d") AS DateV,SUM(amount) AS amount,  COUNT(*) AS rowV FROM card
		WHERE YEAR(date(created_at))="'.$y.'"  AND MONTH(date(created_at))="'.$m.'"
GROUP BY DATE_FORMAT(created_at, "%d-%m-%Y") 
');
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	
}

 ?>