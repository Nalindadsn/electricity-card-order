 <?php
//Database pdo by using PHP PDO

include 'main.php';


if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
 {
  $statement = $pdo->prepare("SELECT * FROM account_con WHERE user_id='".$_POST['u_id']."' ORDER BY id ASC");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   
<ul class="list-group list-acc">
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    if ($row["status"]==1) {
      # code...
    $output .= '

     <li class="list-group-item py-1 text-left">'.$row["id"].'

<a  id="'.$row["id"].'" class="float-right  update1"><i class="fas fa-edit"></i></a>
     </li>

    ';
    }else{


    $output .= '

     <li class="list-group-item bg-danger text-white py-1 text-left">'.$row["id"].'
<a  id="'.$row["id"].'" class="float-right  update1"><i class="fas fa-edit"></i></a>

     </li>

    ';

    }
   }
  }
  else
  {
   $output .= '
<li class="list-group-item">Data not Found</li>

   ';
  }
  $output .= '</ul>';
  echo $output;
 }
 //For Load All Data
 if($_POST["action"] == "LoadCon") 
 {
  $statement = $pdo->prepare("SELECT * FROM account_con WHERE user_id='".$_POST['u_id']."' ORDER BY id ASC");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
 <nav class="navbar navbar-expand-lg ">  
<ul class="navbar-nav ml-lg-auto">
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    if ($row["status"]==1) {
      # code...
    $output .= '

     <li class="list-group-item  p-0 px-1 mx-1 "><a  class="btcon" id="'.$row["id"].'">'.$row["id"].'</a>

     </li>

    ';
    }else{


    $output .= '

     <li class="list-group-item  text-danger p-0 px-1 mx-1"><a  class="btcon" id="'.$row["id"].'">'.$row["id"].'</a>

     </li>

    ';

    }
   }
  }
  else
  {
   $output .= '
<li class="list-group-item">Data not Found</li>

   ';
  }
  $output .= '</ul></nav>';
  echo $output;
 }

 //This code for Create new Records
 if($_POST["action"] == "Create")
 {
  $statement = $pdo->prepare("
   INSERT INTO account_con (card_type, no_beneficiaries,user_id,status) 
   VALUES (:card_type, :no_beneficiaries,:user_id,:status)
  ");
  $result = $statement->execute(
   array(
    ':card_type' => $_POST["firstName"],
    ':no_beneficiaries' => $_POST["lastName"],
    ':status' => $_POST["status"],
    ':user_id' => $_POST["u_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }

 //This Code is for fetch single customer data for display on Modal
 if($_POST["action"] == "Select")
 {
  $output = array();
  $statement = $pdo->prepare(
   "SELECT * FROM account_con 
   WHERE id = '".$_POST["id"]."' 
   LIMIT 1"
  );
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output["first_name"] = $row["card_type"];
   $output["last_name"] = $row["no_beneficiaries"];
   $output["status"] = $row["status"];
  }
  echo json_encode($output);
 }

 if($_POST["action"] == "Update")
 {
  $statement = $pdo->prepare(
   "UPDATE account_con 
   SET card_type = :card_type, no_beneficiaries = :no_beneficiaries , status = :status
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':card_type' => $_POST["firstName"],
    ':no_beneficiaries' => $_POST["lastName"],
    ':status' => $_POST["status"],
    ':id'   => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }

}

?>
 