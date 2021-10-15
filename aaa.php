<?php
// mysql connection


   include('admin/db.php');

function getMonthlyRate($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
      INNER JOIN acc_cat
      ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE (monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."') ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


   $statement1 = $pdo->prepare("SELECT  * FROM monthly_plan
      INNER JOIN acc_cat
      ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE (monthly_plan.condition_v<'".$x."'  AND monthly_plan.acc_cat_id='".$y."') ORDER BY monthly_plan.condition_v ");
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
 return $x-$result['condition_v'];

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
return ($x-$result['condition_v']);

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
$defX=$x-$result['condition_v'];

return $defX*$result['amount'];

// $finalV=$total+$exV;
//$total;
}

function getMonthlyRateDefAmUni($x,$y){
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

return $result['amount'];

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


function getMonthlyRateAmountMax($x,$y){
include('admin/db.php');

   $statement = $pdo->prepare("SELECT  * FROM monthly_plan
      INNER JOIN acc_cat
      ON monthly_plan.acc_cat_id=acc_cat.id
      WHERE monthly_plan.condition_v<'".$x."' AND monthly_plan.acc_cat_id='".$y."' ORDER BY monthly_plan.condition_v  DESC LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();


return $result['condition_v'];
}


function getCon_id(){
   include('admin/db.php');
   $statement = $pdo->prepare("SELECT  * FROM account_con LIMIT 1");
   $statement->execute();
   $result = $statement->fetch();

return $result['acc_type'];
}


$_POST["username"]=440;
$_POST["a_id"]=2;
//$_POST["username"]=55;
if (isset($_POST["username"]) && isset($_POST["a_id"]))
{


   $output = array();

      $output["num"] = getMonthlyRateAmount($_POST["username"],$_POST['a_id']);
      $output["arrData"] = getMonthlyRateData($_POST["username"],$_POST['a_id']);
      $output["exc"] = getMonthlyRateExc($_POST["username"],$_POST['a_id']);
      $output["defAm"] = getMonthlyRateDefAm($_POST["username"],$_POST['a_id']);
      $output["defAmUni"] = getMonthlyRateDefAmUni($_POST["username"],$_POST['a_id']);
      $output["defAmMax"] = getMonthlyRateAmountMax($_POST["username"],$_POST['a_id']);

    echo json_encode($output);
// echo "<pre>";
// echo getCon_id($_POST['a_id']);


// print_r(getMonthlyRateData(400,2))
// ;

}
?>