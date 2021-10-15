<?php include '../main.php';
$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($accounts as $key ) {
	if ($key['nicB']=='') {
		?>


<img src="./img/img.png" style="width: 100%;">

		<?php
	}else{
		?>


<img style="width: 100%" src="admin/nicB/<?php echo $key['nicB']; ?>">
		<?php
	}
	?>

	<?php



	if ($key['status']==1) {
		?>
<div style="border-top: 12px solid green;"></div>
		<?php
	}else{
		?>
<div style="border-top: 12px solid red;"></div>
		<?php
	}
}

?>

