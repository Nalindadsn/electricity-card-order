<?php include 'admin/db.php';
include('function_locations.php');






    $statementIV = $pdo->prepare("SELECT income.*,accounts.name AS un, account_con.addressFour AS address,account_con.addressFour AS addressFour, account_con.user_id AS user_id, account_con.measurement_no AS measurement_no, account_con.phone_fixed AS fixed, account_con.phone_mobile AS mobile FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   INNER JOIN accounts
   ON accounts.id = account_con.user_id

   WHERE 
   income.id='".$_GET['id']."' 
     ");
    $statementIV->execute();
    $resultIV = $statementIV->fetch();


function set($v){
include 'admin/db.php';
    $statementSt = $pdo->prepare("SELECT * FROM settings_web WHERE type='".$v."'");
    $statementSt->execute();
    $resultSt = $statementSt->fetch();
    if (isset($resultSt['col_val'])) {
    return $resultSt['col_val'];
    }else{
        return '';

    }
} 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style type="text/css">
    #invoice > div.table-responsive.p-3 > table > tbody > tr:last-child {
        border-top: 2px solid #333;
    }
    #invoice > div.table-responsive.p-3 > table > tbody > tr:last-child > td:last-child{
        border-bottom: 5px double #333;
    }
</style>
</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
                <a href="income.php" class="btn btn-primary" id="download"> BACK</a>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">
                    <div class="card-header bg-transparent header-elements-inline">
                        <h6 class="card-title text-primary"> invoice</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">

                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li><strong><?php echo set("name"); ?></strong></li>
                                        <li><?php echo set("address1"); ?></li>
                                        <li><?php echo set("address2"); ?></li>
                                        <li><?php echo set("address3"); ?></li>
                                        <li><?php echo set("address4"); ?></li>
                                        <li><?php 
                                        if (set("postal_code")!='') {
                                            echo "Postal Code : ".set("postal_code");
                                        }
                                         ?></li>
                                        <li><?php 
                                        if (set("email")!='') {
                                            echo "Email : ".set("email");
                                        }
                                         ?></li>
                                        <li><?php 
                                        if (set("fax")!='') {
                                            echo "Fax : ".set("fax");
                                        }
                                         ?></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Transaction ID #IN00<?php echo $_GET['id']; ?></h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Date: <span class="font-weight-semibold"><?php echo $resultIV['created_at']; ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Invoice To:</span>
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2"><?php echo $resultIV['un'] ?></h5>
                                    </li>
                                    <li><span class="font-weight-semibold"></span></li>

                                    <li><?php 

$subjectVal  = getAll($resultIV['addressFour']);
       echo str_replace('/', '<br>', $subjectVal);

//echo getThreeN($resultVal['tthree_id']);

                                     ?></li>
                                    <li>

<?php 
if (isset($resultIV['mobile'])) {
    echo "Mobile : ".$resultIV['mobile'];
}
 ?>

                                    </li>
                                    <li>

<?php 
if (isset($resultIV['fixed'])) {
    echo "Fixed : ".$resultIV['fixed'];
}
 ?>

                                    </li>
                                    <li><a href="#" data-abc="true"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive p-3">


<?php 


// echo "<pre>";
// print_r($resultIV);
// echo "</pre>";


$_POST['acc_id']=$resultIV['con_id'];
$_SESSION['id']=$resultIV['user_id'];
$created_atV=$resultIV['created_at'];
// echo $_POST['s_id8'];

// $stmtIn = $pdo->prepare("
// SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
// FROM income
//   ");
// $stmtIn->execute();
// $inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);
// SELECT * FROM income
//   INNER JOIN account_con
//   ON income.con_id = account_con.id
//   WHERE account_con.user_id='".$_SESSION['id']."' AND
//   income.con_id='".$_POST['acc_id']."'
//   ORDER BY income.id DESC
$stmtIn = $pdo->prepare("
SELECT income.type AS ptype,'in' AS type ,income.amount, income.created_at
FROM income
   INNER JOIN account_con
   ON income.con_id = account_con.id
   WHERE account_con.user_id='".$_SESSION['id']."' AND
   income.con_id='".$_POST['acc_id']."' AND
   income.created_at<='".$created_atV."'
UNION ALL
SELECT card.note AS ptype,'py' AS type , (card.amount)*-1 AS amount, card.created_at
FROM card
   INNER JOIN account_con
   ON card.con_id = account_con.id
   WHERE account_con.user_id='".$_SESSION['id']."' AND
   card.con_id='".$_POST['acc_id']."' AND
   card.created_at<='".$created_atV."'

 ORDER BY created_at



  ");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);


$stmtCat = $pdo->prepare("SELECT * FROM account_con WHERE id='".$_POST['acc_id']."'");
$stmtCat->execute();
$inCat = $stmtCat->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($inC);
// echo "</pre>";
$tT=0;
$rCount=1;
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
    //echo "meetar Number : ".$keyCat['measurement_no'];
}
 //echo ($n-$rCount);

$t=$tT;
if ($tTV>0) {
echo "<div class='float-right px-1'><h5 class='my-2'>Total Due: LKR ".number_format($tTV,2,",",".")."</h5></div>";
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
    echo "<td align='right'>".number_format($t,2,",",".");
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
//echo "TYPE : ".$key['ptype']."<br>";
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
//echo $key['ptype']."<br>";
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

<br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div>......................................................</div>
                                
                                Authorized Officer
                            </div>
                            <div class="col-md-6">
                                <div>......................................................</div>
                                Customer
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                        </div>
                    </div>
                    <div class="card-footer"> <span class="text-muted">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.Duis aute irure dolor in reprehenderit</span> </div>
                





                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
function printDiv()
{
var divToPrint=document.getElementById('invoice');
var newWin=window.open('','Print-Window','width=400,height=400,top=100,left=100');
newWin.document.open();
    newWin.document.write('<html><head><style>#in {display:none}</style><body   onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
setTimeout(function(){newWin.close();},10);

}
    </script>
</body>

</html>