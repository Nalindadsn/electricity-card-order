<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<form method="POST" id="myForm">
    <input type="text" name="fontSize" id="fontSize">
    <input type="submit" name="submit" id="submit">
    
</form>
<div id="fontSizeTxt"></div>

         <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/settings.js"></script>
  
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/settings.js"></script>

<script type="text/javascript">

   $(document).ready(function () {
$(document).on('submit', '#myForm', function(event){

event.preventDefault();
    let myObj={
        name:"fontSize",
        fontSizeV:$('#fontSize').val()
    }
    let myObj_serialized=JSON.stringify(myObj)
    localStorage.setItem("myObj",myObj_serialized);
location.reload();
})

fetchVal()
function fetchVal(){
    let myObj_deserialized=JSON.parse(localStorage.getItem('myObj'))
    console.log(myObj_deserialized.fontSizeV)
    if (myObj_deserialized.fontSizeV) {
        $('#fontSize').val(myObj_deserialized.fontSizeV)
        $('#fontSizeTxt').html("<span >"+myObj_deserialized.fontSizeV+"</span>")
        $('#fontSizeTxt > *').css({'fontSize':'28px'})

    }   
    }

   })
</script>
</body>
</html>