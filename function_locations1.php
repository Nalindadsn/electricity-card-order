<?php 

function getOneI1($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tone1 WHERE tone_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tone_id'];

}
function getOneN1($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tone1 WHERE tone_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tone_name'];

}
function getTwoI1($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM ttwo1 WHERE ttwo_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tone_id'];

}
function getTwoN1($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM ttwo1 WHERE ttwo_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['ttwo_name'];

}
function getThreeI1($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tthree1 WHERE tthree_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['ttwo_id'];

}
function getThreeN1($v){
	include('admin/db.php');
	$statement = $pdo->prepare("SELECT * FROM tthree1 WHERE tthree_id='".$v."'");
	$statement->execute();
	$result = $statement->fetch();
	return $result['tthree_name'];

}

function getAll1($v){
	include('admin/db.php');
	$statementVal = $pdo->prepare("SELECT * FROM tthree1 WHERE tthree_id='".$v."'");
	$statementVal->execute();
	$resultVal = $statementVal->fetch();
	return getOneN1(getTwoI1(getThreeI1($resultVal['tthree_id'])))." / ".getTwoN1(getThreeI1($resultVal['tthree_id']))." / ".getThreeN1($resultVal['tthree_id'])." / ";

}
function getTrI1h1($v){
	include('admin/db.php');
	$statementVal = $pdo->prepare("SELECT * FROM tthree1 WHERE tthree_id='".$v."'");
	$statementVal->execute();
	$resultVal = $statementVal->fetch();
	return getOneI1(getTwoI1(getThreeI1($resultVal['tthree_id'])))." / ".getThreeI1($resultVal['tthree_id'])." / ".$v." / ";

}

 //echo getAll1((1));

 ?>

