<?php

if(isset($_POST['ttwo_id']))
{
	$ttwo_id = $_POST['ttwo_id'];
	
	include 'dropdown.php';
	
	$obj = new Dropdown();
	
	$rows = $obj->fetchThree($ttwo_id);

	echo json_encode($rows);	
}

?>