<?php 

function getPrivilege($v){


if($v==1 ) { return "1- Account Section"; }
elseif($v==2 ) { return "2-  View All Accounts  "; }
elseif($v==44) { return "  -View All Accounts / Update Account"; }
elseif($v==45) { return "  -View All Accounts / Deactivate Account"; }
elseif($v==3 ) { return "3-  Active Accounts"; }
elseif($v==46) { return "  -Active Accounts / Update Account"; }
elseif($v==47) { return "  -Active Accounts / Deactivate Account"; }
elseif($v==4 ) { return "4-  Add Accounts"; }
elseif($v==5 ) { return "5- Account types"; }
elseif($v==48) { return "  -Account types / update "; }
elseif($v==49) { return "  -Account types / Deactivate"; }
elseif($v==6 ) { return "6- Locatio Section"; }
elseif($v==7 ) { return " 7- Summary"; }
elseif($v==50) { return "  -Summary / Add post office"; }
elseif($v==51) { return "  -Summary / update"; }
elseif($v==8 ) { return "8-  Post Office"; }
elseif($v==52) { return "  -Post Office / update"; }
elseif($v==9 ) { return "9-  Area"; }
elseif($v==53) { return "  -Area / update"; }
elseif($v==10) { return " 10- village "; }
elseif($v==54) { return "  -village / update"; }
elseif($v==11) { return " 11- street"; }
elseif($v==55) { return "  -Street / update"; }
elseif($v==12) { return "12- Other Details"; }
elseif($v==13) { return " 13- Summary"; }
elseif($v==56) { return "  -Summary / add tap"; }
elseif($v==57) { return "  -Summary / update"; }
elseif($v==14) { return "14-  tap"; }
elseif($v==58) { return "  -tap / update"; }
elseif($v==15) { return "15-   GS Division"; }
elseif($v==59) { return "  -GS Division / update"; }
elseif($v==16) { return " 16- Billing Area"; }
elseif($v==60) { return "  -Billing Area / update"; }
elseif($v==17) { return "17- Users"; }
elseif($v==18) { return " 18- Admins"; }
elseif($v==61) { return "  -Admin / update"; }
elseif($v==62) { return "  -Admin / Deactivate"; }
elseif($v==19) { return " 19- Customers"; }
elseif($v==63) { return "  -Customers / update"; }
elseif($v==64) { return "  -Customers / Deactivate"; }
elseif($v==65) { return "  -Customers / view profile"; }
elseif($v==66) { return "  -Customers / view accounts"; }
elseif($v==20) { return "20- Reports"; }
elseif($v==21) { return "21-  Reports / Income"; }
elseif($v==22) { return " 22- Reports / Expenses"; }
elseif($v==23) { return " 23- Reports / cards"; }
elseif($v==24) { return "24- Income Section"; }
elseif($v==25) { return " 25- Income"; }
elseif($v==67) { return "  - Income / add or update"; }
elseif($v==68) { return "  -Income / bill"; }
elseif($v==26) { return " 26- Income Category"; }
elseif($v==69) { return "  -Income Category / add or update"; }
elseif($v==70) { return "  -Income Category / deactivate"; }
elseif($v==27) { return "27- Expenses Section"; }
elseif($v==28) { return " 28- Expenses"; }
elseif($v==71) { return "  -Expenses / add or update"; }
elseif($v==29) { return " 29- Expenses Category"; }
elseif($v==72) { return "  -Expenses Category / add or update"; }
elseif($v==30) { return "30- cards Section"; }
elseif($v==31) { return " 31-  cards"; }
elseif($v==73) { return "  -cards / bill"; }
elseif($v==74) { return "  -cards / add or update"; }
elseif($v==32) { return " 32- card Category"; }
elseif($v==75) { return "  - card Category / add or update"; }
elseif($v==33) { return "33- Bin"; }
elseif($v==34) { return " 34- Accounts Bin "; }
elseif($v==76) { return "  -Accounts Bin / Activate"; }
elseif($v==35) { return " 35- Account Types Bin"; }
elseif($v==77) { return "  -Account Types Bin / update "; }
elseif($v==78) { return "  -Account Types Bin / Activate"; }
elseif($v==36) { return " 36- Admins Bin"; }
elseif($v==79) { return "  -Admins Bin / view pofile"; }
elseif($v==80) { return "  -Admins Bin / Activate"; }
elseif($v==37) { return " 37- Customers Bin"; }
elseif($v==81) { return "  -Customers Bin / view pofile"; }
elseif($v==82) { return "  -Customers Bin / Activate"; }
elseif($v==38) { return " 38- Income Category Bin"; }
elseif($v==83) { return "  -Income Category Bin / update"; }
elseif($v==84) { return "  -Income Category Bin / Activate"; }
elseif($v==39) { return " 39- Expenses Category Bin"; }
elseif($v==85) { return "  -Expenses Category Bin / update"; }
elseif($v==86) { return "  -Expenses Category Bin / Activate"; }
elseif($v==40) { return "40- Settings"; }
elseif($v==41) { return " 41- Mounth Plan"; }
elseif($v==87) { return "  -Mounth Plan / update"; }
elseif($v==88) { return "  -Mounth Plan / Activate"; }
elseif($v==42) { return "  Add Privileges"; }
elseif($v==43) { return " Other"; }
elseif($v==89) { return "  -Other / update"; }
else{
	return "..";
}

}	
 ?>


