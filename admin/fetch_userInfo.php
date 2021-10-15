<?php 

include '../main.php';

$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id='".$_SESSION['id']."'");
$stmt->execute();
$accounts = $stmt->fetch();
 ?>                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-idno">Full Name</label>
                        <input type="text" id="input-idno" class="form-control form-control-alternative" placeholder="Full Name" value="<?php echo $accounts['name']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-idno">NIC</label>
                        <input type="text" id="input-idno" class="form-control form-control-alternative" placeholder="idno" value="<?php echo $accounts['idno']; ?>">
                      </div>
                    </div>
                  </div>