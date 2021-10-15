<?php 

function getTypeV($x){
	include 'admin/db.php';
$stmtIn = $pdo->prepare("
SELECT * FROM incategory WHERE id='".$x."'

  ");
$stmtIn->execute();
$inC = $stmtIn->fetch();
if (isset($inC['name'])) {
return $inC['name'];
}else{
	return $x;
}
}
function acc($x){

include 'admin/db.php';
$stmtIn = $pdo->prepare("
SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
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
   card.con_id='".$x."'
 ORDER BY created_at



  ");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);


$stmtCat = $pdo->prepare("SELECT * FROM account_con WHERE id='".$x."'");
$stmtCat->execute();
$inCat = $stmtCat->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($inC);
// echo "</pre>";
$tT=0;
$rCount=10;
$n=0;
$tTV=0;
$vDate=date('Y-m-01');
foreach ($inC as $keyT) {
	$n++;
		$tTV=$tTV+$keyT['amount'];
}
$nx=0;
foreach ($inC as $keyTT) {
	$nx++;
	if (($n-$rCount)>=$nx) {
		$tT=$tT+$keyTT['amount'];

	}
}

foreach ($inCat as $keyCat) {
	if ($keyCat['status']==0) {
		echo "<a class='btn btn-danger btn-sm ml-4 float-right'>Not Activated</a>";
	}else{
		echo "<a class='btn btn-success btn-sm ml-4 float-right'>Activated</a>";
	}
	echo "Accounts Number : ".$keyCat['id']." <br>";
	echo "meetar Number : ".$keyCat['measurement_no'];
}
 //echo ($n-$rCount);





}

 ?>