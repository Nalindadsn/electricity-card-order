<?php
  // const DBHOST = 'localhost';        // Database Hostname
  // const DBUSER = 'root';             // MySQL Username
  // const DBPASS = '';                 // MySQL Password
  // const DBNAME = 'ceb';  // MySQL Database name

  // // Data Source Network
  // $dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . '';

  // // Connection Variable
  // $pdo = null;

  // // Connect Using PDO (PHP Data Output)
  // try {
  //   $pdo = new PDO($dsn, DBUSER, DBPASS);
  //   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  // } catch (PDOException $e) {
  //   die('Error : ' . $e->getMessage());
  // }
include 'admin/db.php'
?>
<?php

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT idno FROM accounts WHERE  idno LIKE :idno LIMIT 4';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['idno' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-0 rounded-0 bg-gradient-default text-white a_list">' . $row['idno'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-0 rounded-0 bg-danger text-white ">No NIC</p>';
    }
  }
?>