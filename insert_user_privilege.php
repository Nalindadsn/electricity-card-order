<?php 
if(isset($_POST['services'])){
    $sql="INSERT INTO  user_privilege (`dealer_id`, `service_id`) VALUES (:dealer, :services)";
    $stmt = $DB->prepare($sql);
    foreach ($_POST['services'] as $service) {
        $stmt->execute(array(
                           ':dealer'       =>  1,
                           ':services'     =>  1
                           ));
    }
}

 ?>