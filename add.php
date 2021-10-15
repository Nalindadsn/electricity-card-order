<?php 

include('main.php');

	$statement = $pdo->prepare("SELECT * FROM user_privilege WHERE user_id='".$_POST['idv']."'");
	$statement->execute();
	$result = $statement->fetchAll();


	if(isset($_POST['submit']))
	{
		$multi=$_POST['multi'];
		$u_id=$_POST['idv'];




foreach ($result as $key) {
	$arr[]= $key['requirement_id'];

}
//print_r($arr);
$n=0;
foreach ($multi as $key) {

	if (in_array($key, $arr)) {
	}else{
		$n++;
	}
}


if ($n>0) {

foreach ($multi as $key) {

	if (in_array($key, $arr)) {
	}else{

				$statement = $pdo->prepare("
					INSERT INTO user_privilege (requirement_id,user_id,created_by) 
					VALUES (:multi,:user_id,:created_by)
				");
				$statement->bindParam(":multi",$key);
				$statement->bindParam(":user_id",$u_id);
				$statement->bindParam(":created_by",$_SESSION['id']);
				$statement->execute();
	header('location:user_privilege.php?status=updated&count='.$n.'&id='.$_POST['idv']);

	}
}
}else{
	header('location:user_privilege.php?status=already&count='.$n.'&id='.$_POST['idv']);

}



	}

 ?>