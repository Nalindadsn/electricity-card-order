<?php 

include 'main.php';
// echo $_POST['user_id8'];
// echo $_POST['s_id8'];

// SELECT * FROM income
//   INNER JOIN account_con
//   ON income.con_id = account_con.id
//   WHERE account_con.user_id='".$_SESSION['id']."' AND
//   income.con_id='".$_POST['user_id8']."'
//   ORDER BY income.id DESC
$stmtIn = $pdo->prepare("
SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE account_con.user_id='".$_SESSION['id']."' AND
   income.con_id='".$_POST['user_id8']."'
UNION ALL
SELECT payment.note AS ptype,'py' AS type , (payment.amount)*-1 AS amount, payment.created_at
FROM payment
   INNER JOIN account_con
   ON payment.con_id = account_con.id
   WHERE account_con.user_id='".$_SESSION['id']."' AND
   payment.con_id='".$_POST['user_id8']."'
 ORDER BY created_at



  ");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);


$stmtCat = $pdo->prepare("SELECT * FROM account_con WHERE id='".$_POST['user_id8']."'");
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
	echo "meetar Number : ".$keyCat['measurement_no'];
}
 //echo ($n-$rCount);

$t=$tT;
if ($tTV>0) {
echo "<div class='float-right px-1'>LKR ".number_format($tTV,2,",",".")."</div>";
}else{

echo "<div class='float-right px-1 text-danger'>LKR ".number_format($tTV,2,",",".")."</div>";
}

echo "<table class='table'>";

	echo "<tr class='bg-primary text-white'>";
	echo "<td>Timestamp";
	echo "</td>";
	echo "<td align='right'>Debit";
	echo "</td>";
	echo "<td align='right'>Creadit";
	echo "</td>";
	echo "<td align='right'>Amount";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan='2'><strong>brought forward from</strong>";
	echo "</td>";
	echo "<td align='right'>";
	echo "</td>";
	echo "<td align='right'>".$t;
	echo "</td>";
	echo "</tr>";
	$nn=0;
foreach ($inC as $key) {
$nn++;
if (($n-$rCount)<=0) {

//if ($rCount<$nn) {
	echo "<tr>";
	echo "<td>";
if ($key['type']=="in") {
echo "TYPE : ".$key['ptype']."<br>";
}
	echo $key['created_at'].' ';
if (date('Y-m-d') == date('Y-m-d', strtotime($key['created_at']))) {
    echo " &nbsp;".' <i class="fas fa-circle text-success"></i>';
}
	echo "</td>";
	echo "<td align='right'>";
if ($key['type']=="in") {
echo number_format($key['amount'],2,",",".");


}
	echo "</td>";
	echo "<td align='right'>";
if ($key['type']=="py") {
	# code...
echo number_format(($key['amount']*-1),2,",",".");
}
	echo "</td>";
	echo "<td align='right'>";
	$t=$t+$key['amount'];
if ($t<0) {
	echo "<span class='text-danger'>";
echo number_format($t,2,",",".");
	echo "</span>";
	# code...
}else{

echo number_format($t,2,",",".");
}

	echo "</td>";
	echo "</tr>";
//}
}else{


if (($n-$rCount)<$nn) {
	echo "<tr>";
	echo "<td>";

if ($key['type']=="in") {
echo $key['ptype']."<br>";
}
	echo $key['created_at'];

	echo "</td>";
	echo "<td align='right'>";
if ($key['type']=="in") {

echo number_format($key['amount'],2,",",".");

}
	echo "</td>";
	echo "<td align='right'>";
if ($key['type']=="py") {
	# code...
echo number_format(($key['amount']*-1),2,",",".");
}
	echo "</td>";
	echo "<td align='right'>";
	$t=$t+$key['amount'];
if ($t<0) {
	echo "<span class='text-danger'>";
echo number_format($t,2,",",".");
	echo "</span>";
	# code...
}else{

echo number_format($t,2,",",".");
}


	echo "</td>";
	echo "</tr>";
}
}
}
echo "</table>";


 ?>