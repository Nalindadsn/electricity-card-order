<?php 

function getOneI($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tone WHERE tone_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tone_id'];

}
function getOneN($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tone WHERE tone_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tone_name'];

}
function getTwoI($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM ttwo WHERE ttwo_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tone_id'];

}
function getTwoN($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM ttwo WHERE ttwo_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['ttwo_name'];

}
function getThreeI($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tthree WHERE tthree_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['ttwo_id'];

}
function getThreeN($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tthree WHERE tthree_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tthree_name'];

}
function getFour($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tfour WHERE tfour_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return getOneN(getTwoI(getThreeI($result['tthree_id'])));

}
function getFourN($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tfour WHERE tfour_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tfour_name'];

}
function getAllThree($v){
	include('admin/db.php');


	$statementS = $pdo->prepare("SELECT * FROM tfour WHERE tfour_id='".$v."'");
	$statementS->execute();
	$resultS = $statementS->fetch();

	$statement = $pdo->prepare("SELECT * FROM tfour WHERE tthree_id='".$resultS['tthree_id']."'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

}
function getAll($v){
	include('admin/db.php');
	$statementVal = $pdo->prepare("SELECT * FROM tfour WHERE tfour_id='".$v."'");
	$statementVal->execute();
	$resultVal = $statementVal->fetch();
	return getOneN(getTwoI(getThreeI($resultVal['tthree_id'])))." / ".getTwoN(getThreeI($resultVal['tthree_id']))." / ".getThreeN($resultVal['tthree_id'])." / ".getFourN($v);

}
function getTrIh($v){
	include('admin/db.php');
	$statementVal = $pdo->prepare("SELECT * FROM tfour WHERE tfour_id='".$v."'");
	$statementVal->execute();
	$resultVal = $statementVal->fetch();
	return getOneI(getTwoI(getThreeI($resultVal['tthree_id'])))." / ".getTwoI(getThreeI($resultVal['tthree_id']))." / ".getThreeI($resultVal['tthree_id'])." / ".getFour($v);

}
function getTrI($v){
	include('admin/db.php');
	$statementVal = $pdo->prepare("SELECT * FROM tfour WHERE tfour_id='".$v."'");
	$statementVal->execute();
	$resultVal = $statementVal->fetch();
	return getThreeI($resultVal['tthree_id']);

}
function getTrIN($v){
	include('admin/db.php');
	$statementVal = $pdo->prepare("SELECT * FROM tfour WHERE tfour_id='".$v."'");
	$statementVal->execute();
	$resultVal = $statementVal->fetch();
	return getThreeN($resultVal['tthree_id']);

}

//echo getTrI((15));

 ?>

