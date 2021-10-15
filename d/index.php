<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
	
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	
	<!-- Bootstrap Bundle with Popper -->
	
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	
	<!-- jQuery library -->
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Dynamic Dependent Select Box PHP OOP Ajax : Onlyxcodes</title>
	
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3f51b5;">
	  <div class="container-fluid">
		<a class="navbar-brand" href="https://www.onlyxcodes.com/">Onlyxcodes</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="https://www.onlyxcodes.com/2021/07/dynamic-dependent-select-box-php-oop-ajax.html">Back to Tutorial</a>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>
	
    <div class="container">
        <div class="row">        
			<div class="col-md-12 mt-5">
			<?php
			
			include 'dropdown.php';
			
			$obj = new Dropdown();
			
			$rows = $obj->fetchOne();
			
			?>
			<label class="form-label" style="font-size:20px; font-style:bold;">Select One</label>
			<select id="country_change" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
				<option>-- select country --</option>
			  <?php
				if(!empty($rows))
				{
					foreach($rows as $row)
					{
					?>
						<option value="<?php echo $row['tone_id']; ?>"><?php echo $row['tone_name']; ?></option>	
					<?php
					}
				}
			  ?>
			  
			</select>

			<label class="form-label" style="font-size:20px; font-style:bold;">Select Two</label>
			<select id="ttwo_change" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
			  <option>-- select ttwo --</option>
			</select>
	
			<label class="form-label" style="font-size:20px; font-style:bold;">Select Three</label>
			<select id="tthree_result" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
			  <option>-- select tthree --</option>
			</select>

			<label class="form-label" style="font-size:20px; font-style:bold;">Select Four</label>
			<select id="tfour_result" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
			  <option>-- select tfour --</option>
			</select>

            </div>
        </div>
    </div>

  </body>
</html>

<script>
// country dependent ajax
 $(document).on("change","#country_change", function(e){
	e.preventDefault();
		
	var country = $("#country_change").val();	
		
	$.ajax({
        type: "POST",
        url: "ttwo.php",
		dataType: "json",
        data: "tone_id="+country,
        success: function(response)
        {
			var ttwoBody = "";
			ttwoBody = "<option>-- select ttwo --</option>"
			for(var key in response)
			{
				ttwoBody += "<option value="+ response[key]['ttwo_id'] +">"+ response[key]['ttwo_name'] +"</option>";
				$("#ttwo_change").html(ttwoBody);
			}		
        }
    });
 });

// ttwo dependent ajax
 $(document).on("change","#ttwo_change", function(e){
	e.preventDefault();
		
	var ttwo = $("#ttwo_change").val();	
		console.log(ttwo)
	$.ajax({
        type: "POST",
        url: "tthree.php",
		dataType: "json",
        data: "ttwo_id="+ttwo,
        success: function(response)
        {
			var tthreeBody = "";
			tthreeBody = "<option>-- select tthree --</option>"
			for(var key in response)
			{
				tthreeBody += "<option value="+ response[key]['tthree_id'] +">"+ response[key]['tthree_name'] +"</option>";
				$("#tthree_result").html(tthreeBody);
			}		
        }
    });
 });
// ttwo dependent ajax
 $(document).on("change","#tthree_result", function(e){
	e.preventDefault();
		
	var tthree = $("#tthree_result").val();
	console.log(tthree)	
		
	$.ajax({
        type: "POST",
        url: "tfour.php",
		dataType: "json",
        data: "tthree_id="+tthree,
        success: function(response)
        {
			var tfourBody = "";
			tfourBody = "<option>-- select tfour --</option>"
			for(var key in response)
			{


				tfourBody += "<option value="+ response[key]['tfour_id'] +">"+ response[key]['tfour_name'] +"</option>";
				$("#tfour_result").html(tfourBody);

			}		
        }
    });
 });	
</script>