<?php

if(isset($_POST['tone_id']))
{
	$tone_id = $_POST['tone_id'];
	
	include 'dropdown1.php';
	
	$obj = new Dropdown1();
	
	$rows = $obj->fetchTwo($tone_id);

	echo json_encode($rows);	
}

?>