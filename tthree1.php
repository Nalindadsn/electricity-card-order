<?php

if(isset($_POST['ttwo_id']))
{
	$ttwo_id = $_POST['ttwo_id'];
	
	include 'dropdown1.php';
	
	$obj = new Dropdown1();
	
	$rows = $obj->fetchThree($ttwo_id);

	echo json_encode($rows);	
}

?>