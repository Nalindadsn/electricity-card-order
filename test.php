<?php
// mysql connection


   include('admin/db.php');


function getMonthlyRate($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v ");
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   $num= $statement1->rowCount();
$n=0;
$total=0;
$dArr = array();
foreach ($result1 as $key => $value) {
   $n++;
   if ($n<$num) {
   $statement2 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v > '".$value['condition_v']."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v   LIMIT 1");
   $statement2->execute();
   $result2 = $statement2->fetch();
$def=($result2['condition_v']-$value['condition_v'])*$value['amount'];
$total+=$def;
//echo "----".$def."====";

      echo $result2['condition_v']."-".$value['condition_v']."=".($result2['condition_v']-$value['condition_v'])."*".$value['amount']."|".$def;

$dArr[]= ['max'=>$result2['condition_v'],'les'=>$value['condition_v'],'points'=>($result2['condition_v']-$value['condition_v']),'val'=>$value['amount'],'rowam'=>$def];
 }


   echo "<br>";


   
}
echo "<hr>";
$defX=$x-$result['condition_v'];

$exV=$defX*$result['amount'];
echo $exV."-".$defX."--".$result['condition_v']."--".$result['amount']."-";

$finalV=$total+$exV;
echo $finalV;
echo "<pre>";
print_r($dArr);
echo "</pre>";
}
function getMonthlyRateData($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v ");
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   $num= $statement1->rowCount();
$n=0;
$total=0;
$dArr = array();
foreach ($result1 as $key => $value) {
   $n++;
   if ($n<$num) {
   $statement2 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v > '".$value['condition_v']."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v   LIMIT 1");
   $statement2->execute();
   $result2 = $statement2->fetch();
$def=($result2['condition_v']-$value['condition_v'])*$value['amount'];
$total+=$def;
      
$dArr[]= ['max'=>$result2['condition_v'],'les'=>$value['condition_v'],'points'=>($result2['condition_v']-$value['condition_v']),'val'=>$value['amount'],'rowam'=>$def];
 }
}
$defX=$x-$result['condition_v'];

$exV=$defX*$result['amount'];

$finalV=$total+$exV;
return $dArr;
}

function getMonthlyRateTotalSub($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v ");
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   $num= $statement1->rowCount();
$n=0;
$total=0;
$dArr = array();
foreach ($result1 as $key => $value) {
   $n++;
   if ($n<$num) {
   $statement2 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v > '".$value['condition_v']."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v   LIMIT 1");
   $statement2->execute();
   $result2 = $statement2->fetch();
$def=($result2['condition_v']-$value['condition_v'])*$value['amount'];
$total+=$def;
      
$dArr[]= ['max'=>$result2['condition_v'],'les'=>$value['condition_v'],'points'=>($result2['condition_v']-$value['condition_v']),'val'=>$value['amount'],'rowam'=>$def];
 }
}
// $defX=$x-$result['condition_v'];

// $exV=$defX*$result['amount'];

// $finalV=$total+$exV;
return $total;
}
function getMonthlyRateExc($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v ");
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   $num= $statement1->rowCount();
$n=0;
$total=0;
$dArr = array();
foreach ($result1 as $key => $value) {
   $n++;
   if ($n<$num) {
   $statement2 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v > '".$value['condition_v']."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v   LIMIT 1");
   $statement2->execute();
   $result2 = $statement2->fetch();
$def=($result2['condition_v']-$value['condition_v'])*$value['amount'];
$total+=$def;
      
$dArr[]= ['max'=>$result2['condition_v'],'les'=>$value['condition_v'],'points'=>($result2['condition_v']-$value['condition_v']),'val'=>$value['amount'],'rowam'=>$def];
 }
}
// $defX=$x-$result['condition_v'];

// $exV=$defX*$result['amount'];

// $finalV=$total+$exV;
//$total;
}
function getMonthlyRateDef($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v ");
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   $num= $statement1->rowCount();
$n=0;
$total=0;
$dArr = array();
foreach ($result1 as $key => $value) {
   $n++;
   if ($n<$num) {
   $statement2 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v > '".$value['condition_v']."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v   LIMIT 1");
   $statement2->execute();
   $result2 = $statement2->fetch();
$def=($result2['condition_v']-$value['condition_v'])*$value['amount'];
$total+=$def;
      
$dArr[]= ['max'=>$result2['condition_v'],'les'=>$value['condition_v'],'points'=>($result2['condition_v']-$value['condition_v']),'val'=>$value['amount'],'rowam'=>$def];
 }
}
return $x-$result['condition_v'];

// $exV=$defX*$result['amount'];

// $finalV=$total+$exV;
//$total;
}
function getMonthlyRateDefAm($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v ");
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   $num= $statement1->rowCount();
$n=0;
$total=0;
$dArr = array();
foreach ($result1 as $key => $value) {
   $n++;
   if ($n<$num) {
   $statement2 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v > '".$value['condition_v']."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v   LIMIT 1");
   $statement2->execute();
   $result2 = $statement2->fetch();
$def=($result2['condition_v']-$value['condition_v'])*$value['amount'];
$total+=$def;
      
$dArr[]= ['max'=>$result2['condition_v'],'les'=>$value['condition_v'],'points'=>($result2['condition_v']-$value['condition_v']),'val'=>$value['amount'],'rowam'=>$def];
 }
}
//$x-$result['condition_v'];

return $defX*$result['amount'];

// $finalV=$total+$exV;
//$total;
}


function getMonthlyRateAmount($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v ");
   $statement1->execute();
   $result1 = $statement1->fetchAll();
   $num= $statement1->rowCount();
$n=0;
$total=0;
foreach ($result1 as $key => $value) {
   $n++;
   if ($n<$num) {
   $statement2 = $pdo->prepare("SELECT  * FROM monthly_plan
   	INNER JOIN acc_cat
   	ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v > '".$value['condition_v']."'  AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v   LIMIT 1");
   $statement2->execute();
   $result2 = $statement2->fetch();
$def=($result2['condition_v']-$value['condition_v'])*$value['amount'];
$total+=$def;
//echo "----".$def."====";
 }
}
$defX=$x-$result['condition_v'];

$exV=$defX*$result['amount'];

$finalV=$total+$exV;
return $finalV;
}




$_POST["username"]=55;
if (isset($_POST["username"]))
{


   $output = array();

      $output["num"] = getMonthlyRateAmount($_POST["username"],1);
      $output["arrData"] = getMonthlyRateExc($_POST["username"],1);

    echo json_encode($output);

}
?>