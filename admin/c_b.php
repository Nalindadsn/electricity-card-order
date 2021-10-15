<?php 
include '../main.php';
$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_POST['request']."'");
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($accounts as $key ) {
	if ($key['sign']=='') {
		?>
<img src="./img/img.png" style="width: 100%;">
		<?php
	}else{
		?>
<img style="width: 100%" src="admin/sign/<?php echo $key['sign']; ?>">
		<?php
	}
	?>
	<?php
	if ($key['status']==1) {
		?>
<div style="background: green;height: 12px;"></div>
		<?php
	}else{
		?>
<div style="background: red;height: 12px;"></div>
		<?php
	}
}
?>

