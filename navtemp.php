        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link " href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

<?php if (pr($prArray[1])==1) { ?>

    
                    <i class="ni ni-bullet-list-67 text-red"></i> Accounts විස්තර </a>

<?php if (pr($prArray[2])==1) { ?>
                                <i class="fas fa-dot-circle"></i> All Accounts </a>
                           
<?php } ?>

<?php if (pr($prArray[3])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="viewActiveAccounts.php">
                                <i class="fas fa-dot-circle"></i>active Accounts </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[4])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="allAccounts.php">
                                <i class="fas fa-dot-circle"></i> new Accounts </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[5])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="accountTypes.php">
                                <i class="fas fa-dot-circle"></i>Account Types </a>
                            </a>
                        </li>
<?php } ?>
<!--                         <li class="nav-item">
                            <a  class="nav-link" href="printAcc.php">
                                <i class="fas fa-dot-circle"></i>Print Bill </a>
                            </a>
                        </li> -->
                    </ul>

          </li>

<?php } ?>


<?php if (pr($prArray[6])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#locationsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-square-pin ni text-orange"></i> ලිපිනය </a>
                    <ul class="collapse list-unstyled mx-3" id="locationsubmenu" >

<?php if (pr($prArray[7])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="location.php">
                                <i class="fas fa-dot-circle"></i> සාරාංශය </a>
                            </a>
                        </li>

<?php } ?>
<?php if (pr($prArray[8])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="postOffice.php">
                                <i class="fas fa-dot-circle"></i>  තැපැල් කාර්යාල </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[9])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="areas.php">
                                <i class="fas fa-dot-circle"></i>  ප්‍රදේශ </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[10])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="villages.php">
                                <i class="fas fa-dot-circle"></i>  ගම් </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[11])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="street.php">
                                <i class="fas fa-dot-circle"></i>  මාර්ග </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>


<?php } ?>


<?php if (pr($prArray[12])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#otherInfosubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-info text-blue"></i> Other විස්තර </a>
                    <ul class="collapse list-unstyled mx-3" id="otherInfosubmenu" >

<?php if (pr($prArray[13])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="allOther.php">
                                <i class="fas fa-dot-circle"></i> සාරාංශය </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[14])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="tap.php">
                                <i class="fas fa-dot-circle"></i> කරාම </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[15])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="gsDivision.php">
                                <i class="fas fa-dot-circle"></i> ග්‍රාම නිලධාරි වසම් </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[16])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="billingDivision.php">
                                <i class="fas fa-dot-circle"></i> බිල් කලාපය </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>

<?php } ?>

<?php if (pr($prArray[17])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users text-yellow"></i> පරිශීලකයන් </a>
                    <ul class="collapse list-unstyled mx-3" id="homesubmenu" >



<?php if (pr($prArray[18])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="admins.php">
                                <i class="fas fa-dot-circle"></i> Admins </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[19])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i> Customers </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>
<?php } ?>
<?php if (pr($prArray[20])==1) { ?>
          <li class="nav-item  active ">
            
              <a class="nav-link" href="#reportSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-books text-danger"></i> වාර්තා </a>
                    <ul class="collapse list-unstyled mx-3" id="reportSub" >


<?php if (pr($prArray[21])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="incomeReport.php">
                                <i class="fas fa-dot-circle"></i> ආදායම් වාර්තා </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[22])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="expensesReport.php">
                                <i class="fas fa-dot-circle"></i> expenses වාර්තා </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[23])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="cardReport.php">
                                <i class="fas fa-dot-circle"></i>  ගෙවීම් වාර්තා </a>
                            </a>
                        </li>
<?php } ?>
<!--                         <li class="nav-item">
                            <a  class="nav-link" href="users.php">
                                <i class="fas fa-dot-circle"></i>Print Invoice </a>
                            </a>
                        </li> -->
                    </ul>

          </li>

<?php } ?>
<?php if (pr($prArray[24])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#incomeSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> ආදායම් </a>
                    <ul class="collapse list-unstyled mx-3" id="incomeSub" >

<?php if (pr($prArray[25])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="income.php">
                                <i class="fas fa-dot-circle"></i>  ආදායම් </a>
                            </a>
                        </li>
<?php } ?>


<?php if (pr($prArray[26])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="incomeCat.php">
                                <i class="fas fa-dot-circle"></i> ආදායම් categories  </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[90])==1) { ?>

<li class="nav-item">
    <a  class="nav-link" href="otherIncome.php">
        <i class="fas fa-dot-circle "></i> Other ආදායම්   </a>
    </a>
</li>
<?php } ?>


                    </ul>

          </li>
<?php } ?>
<?php if (pr($prArray[27])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#expSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> expenses </a>
                    <ul class="collapse list-unstyled mx-3" id="expSub" >

<?php if (pr($prArray[28])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="expenses.php">
                                <i class="fas fa-dot-circle"></i>  expenses </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[29])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="expensesCat.php">
                                <i class="fas fa-dot-circle"></i> expenses categories </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>
<?php } ?>
<?php if (pr($prArray[30])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#paySub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-align-left-2 text-blue"></i> ගෙවීම් </a>
                    <ul class="collapse list-unstyled mx-3" id="paySub" >

<?php if (pr($prArray[31])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="cards.php">
                                <i class="fas fa-dot-circle"></i> ගෙවීම්  </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[32])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="cardTypes.php">
                                <i class="fas fa-dot-circle"></i> ගෙවීම් ක්‍රම  </a>
                            </a>
                        </li>
<?php } ?>


                    </ul>

          </li>
<?php } ?>

<?php if (pr($prArray[33])==1) { ?>

          <li class="nav-item  active ">
            
              <a class="nav-link" href="#binSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-trash text-red"></i> බඳුන </a>
                    <ul class="collapse list-unstyled mx-3" id="binSub" >


<?php if (pr($prArray[34])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="accountsBin.php">
                                <i class="fas fa-dot-circle"></i> Accounts </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[35])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="accountTypesBin.php">
                                <i class="fas fa-dot-circle"></i> Account Types </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[36])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="adminsBin.php">
                                <i class="fas fa-dot-circle"></i> Admins  </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[37])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="usersBin.php">
                                <i class="fas fa-dot-circle"></i> Customers </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[38])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="incomeCatBin.php">
                                <i class="fas fa-dot-circle"></i> ආදායම් categories </a>
                            </a>
                        </li>
<?php } ?>

<?php if (pr($prArray[39])==1) { ?>

                        <li class="nav-item">
                            <a  class="nav-link" href="expensesCatBin.php">
                                <i class="fas fa-dot-circle"></i> expenses categories </a>
                            </a>
                        </li>
<?php } ?>
                    </ul>

          </li>

<?php } ?>
<?php if (pr($prArray[40])==1) { ?>

          <li class="nav-item  active shadow">
            
              <a class="nav-link active" href="#settingsSub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="ni ni-settings-gear-65 text-blue"></i> සැකසුම් </a>
                    <ul class="collapse show list-unstyled mx-3" id="settingsSub" >

<?php if (pr($prArray[41])==1) { ?>


                        <li class="nav-item">
                            <a  class="nav-link" href="monthPlan.php">
                                <i class="fas fa-dot-circle"></i> මාසික සැලසුම් </a>
                            </a>
                        </li>
<?php } ?>



<?php if (pr($prArray[42])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="viewPrivilege.php">
                            <i class="fas fa-dot-circle text-primary"></i> වරප්‍රසාද </a>
                            </a>
                        </li>
<?php } ?>
<?php if (pr($prArray[43])==1) { ?>
                        <li class="nav-item">
                            <a  class="nav-link" href="settings.php">
                                <i class="fas fa-dot-circle"></i> Other </a>
                            </a>
                        </li>
<?php } ?>



                    </ul>

          </li>
<?php } ?>


        </ul>

<!-- sidenav end -->