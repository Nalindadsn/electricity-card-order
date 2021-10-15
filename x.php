<?php include 'main.php';

$stmtAll = $pdo->prepare("SELECT * FROM accounts WHERE idno='".$_GET['id']."' limit 1");
$stmtAll->execute();
$accounts = $stmtAll->fetch();
 ?>
<?php echo $accounts['id']; ?>
<!DOCTYPE html>
<html>

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        // Instead of button click, change this.
function fetchdata(){

    var keyword = "<?php echo date('Y-m-d H:i:s', time()); ?>";
    var keyword2 = "<?php echo $accounts['id']; ?>";

 $.ajax({
  url: 'admin/x.php',
  type: 'post',

    data:{request:keyword,id:keyword2},
      dataType:"json",
  success: function(response){
   // Perform operation on the return value
   console.log(response);
  }
 });
}

$(document).ready(function(){
 setInterval(fetchdata,3000);
});

      });

    </script>
  </head>

  <body>

    <div id="div1">
      <h2>Let jQuery AJAX Change This Text</h2></div>

    <button>Get External Content</button>
    <div id="div2">
      <h2>Complete</h2>
    </div>
  </body>

</html>