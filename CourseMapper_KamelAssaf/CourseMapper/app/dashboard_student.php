<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bootstrap.css"/>
<script type="text/javascript" src="js/dashboard_student.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
#bg {
  position: fixed; 
  top: 0; 
  left: 0; 
	
  /* Preserve aspet ratio */
  min-width: 100%;
  min-height: 100%;
}
</style>
<title>Student </title>
</head>

<body onload="bodyLoad()" background="../images/wallpaper.png" width="100%" height="auto">


	<div class="container">
		<div class="row">
			<center><img src="../images/logo.png" width="60%" height="auto" /></center>
		</div>
	</div>
	<br>
	<hr>
	<div class="container-fluid">
		<div class="row" style="background:green">
			<center><h2 style="color:white;">Course Mapper </h2></center>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h2>1<sup>st</sup> Year</h2>
				<div id="year1" class="col-md-4"></div>
			</div>
			<div class="col-md-3">
				<h2>2<sup>nd</sup> Year</h2>
				<div id="year2" class="col-md-4"></div>
			</div>
			<div class="col-md-3">
				<h2>3<sup>rd</sup> Year</h2>
				<div id="year3" class="col-md-4"></div>
			</div>
			<div class="col-md-3">
				<h2>4<sup>th</sup> Year</h2>
				<div id="year4" class="col-md-4"></div>
			</div>
		</div>
	</div>
</body>
</html>