          <?php 
/*
1->acc section

*/

  include('./main.php');
  //echo $_SESSION['id'];

function pr($v)
{
  include('admin/db.php');
  $statement = $pdo->prepare("SELECT * FROM user_privilege WHERE user_id='".$_SESSION['id']."' AND requirement_id='".$v."'");
  $statement->execute();
  $result = $statement->fetchAll();
  
  if ($statement->rowCount()>0) {
    return 1;
  }else{
    return 0;
  }
}
function prRd($v)
{
  include('admin/db.php');
  $statement = $pdo->prepare("SELECT * FROM user_privilege WHERE user_id='".$_SESSION['id']."' AND requirement_id='".$v."'");
  $statement->execute();
  $result = $statement->fetchAll();
  
  if ($statement->rowCount()>0) {
    return '';
  }else{
    header('index.php');
  }
}

/*
1 add prilage supper admin
2 add prilage 

*/
$prArray = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,];
echo pr($prArray[0]);
?>

<?php if (pr($prArray[0])==1) { ?>

<?php } ?>