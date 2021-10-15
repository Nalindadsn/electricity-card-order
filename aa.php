<?php
include 'main.php';
include 'pr.php';
?>
<style>
body > div.main-content > div.container-fluid.mt--7 ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.box {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.box::before {
  content: "\2610";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.check-box::before {
  content: "\2611"; 
  color: dodgerblue;
}

.nested {
  display: none;
}

.active {
  display: block;
}
/*ul{
  border-bottom: 1px solid #ccc;
  border-top: 1px solid #ccc;
}*/
body > div.main-content > div.container-fluid.mt--7 ul ul{
  background-color: rgba(228, 241, 254, .8);
  border-left: 1px solid #fff;
  margin-left: 5px;
  box-shadow: -10px 0px 10px 1px rgba(77, 19, 209, .1);
}
body > div.main-content > div.container-fluid.mt--7 ul li{
  padding: 10px 0;
  border-bottom: 1px solid #ccc
}
.update1,.update2,.update3{
margin-left: 20px ;
margin-right: 5px ;
cursor: pointer;
padding:0 5px  ;
}
.add2,.add3{
  cursor: pointer;
}
</style>

<?php   


$stmtIn = $pdo->prepare("SELECT * FROM tone");
$stmtIn->execute();
$inC = $stmtIn->fetchAll(PDO::FETCH_ASSOC);

// print_r($inC);
echo "<ul id='myUL'  class='list-group list-group-flush list my--3'>";


foreach ($inC as $key) {
echo "<li class='list-group-item px-0'><span class='box'></span>";
  echo $key['tone_name'];

if ( pr($prArray[51])==1) {
  echo '
<a  id="'.$key["tone_id"].'" class="float-right btn btn-warning btn-sm  text-white update"> <i class="fas fa-edit"></i></a>
';
}
  echo "<ul  class='nested'>";
  $stmtIn2 = $pdo->prepare("SELECT * FROM ttwo WHERE tone_id='".$key['tone_id']."'");
  $stmtIn2->execute();
  $inC2 = $stmtIn2->fetchAll(PDO::FETCH_ASSOC);
  foreach ($inC2 as $key2) {
    echo "<li><span class='box'></span>";
      echo $key2['ttwo_name'];

if ( pr($prArray[51])==1) {
echo '<a  id="'.$key2["ttwo_id"].'" class="   text-warning   update1"> <i class="fas fa-edit"></i></a>';

}
        echo "<ul class='nested'>";

        $stmtIn3 = $pdo->prepare("SELECT * FROM tthree WHERE ttwo_id='".$key2['ttwo_id']."'");
        $stmtIn3->execute();
        $inC3 = $stmtIn3->fetchAll(PDO::FETCH_ASSOC);
        foreach ($inC3 as $key3) {
          echo "<li><span class='box'></span>";
          echo $key3['tthree_name'];



if ( pr($prArray[51])==1) {
echo '<a  id="'.$key3["tthree_id"].'" class="  text-warning  update2"> <i class="fas fa-edit"></i></a>
';

}     



        echo "<ul class='nested'>";
        $stmtIn4 = $pdo->prepare("SELECT * FROM tfour WHERE tthree_id='".$key3['tthree_id']."'");
        $stmtIn4->execute();
        $inC4 = $stmtIn4->fetchAll(PDO::FETCH_ASSOC);
        foreach ($inC4 as $key4) {
          echo "<li>";
          echo $key4['tfour_name'];

if ( pr($prArray[51])==1) {
          echo '<a  id="'.$key4["tfour_id"].'" class="  text-warning  update3"> <i class="fas fa-edit"></i></a>';
}

          echo "</li>";
        }
        
        echo "</ul>";

        }

        echo "</ul>";
    echo "</li>";
  }
  echo "</ul>";
echo "</li>";
}
echo "</ul>";


// $stmt = $conn->prepare("SELECT * from tone");
// $stmt->execute();
// $chars = $stmt->fetchAll();

// $stmt = $conn->prepare("SELECT * from ttwo WHERE id=?");
// $stmt->execute(array($id));
// $item = $stmt->fetch();

// $stmt = $conn->prepare("SELECT name FROM tthree WHERE id=?");
// $stmt->execute(array($id));
// $base = $stmt->fetchColumn();


 ?>

<script>
var toggler = document.getElementsByClassName("box");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("check-box");
  });
}
</script>
