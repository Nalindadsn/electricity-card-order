<?php

if(isset($_POST['tone_id']))
{
	$tone_id = $_POST['tone_id'];
	
	include 'dropdown.php';
	
	$obj = new Dropdown();
	
	$rows = $obj->fetchTwo($tone_id);

	echo json_encode($rows);	
}

?>