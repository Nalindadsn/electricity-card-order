<?php

if(isset($_POST['tthree_id']))
{
	$tthree_id = $_POST['tthree_id'];
	
	include 'dropdown.php';
	
	$obj = new Dropdown();
	
	$rows = $obj->fetchFour($tthree_id);

	echo json_encode($rows);	
}

?>