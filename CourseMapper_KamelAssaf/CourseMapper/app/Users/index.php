<?php
session_start();
if(!isset($_SESSION["Username"]))
	header("Location: ../index.php");
	?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/dashboard.css"/>
<link rel="stylesheet" href="../../css/bootstrap.css"/>
<script type="text/javascript" src="../js/dashboard.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../js/schoolScript.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Courses</title>
</head>
<body onload="bodyLoad()" background="../../images/wallpaper.png" width="1" height="700px">

<div class="sidebar">

  <a href="../dashboard.php">Home</a>
 
  <a href="../Courses">Courses</a>
  <a href="../Majors">Majors</a>
  <a href="../Departments">Departments</a>
  <a class="active" href="../Schools">Schools</a>
</div>

<div class="content">
	
		<div class="row">
			<div><img src="../../images/logo.png" height="100"/></div>
			<div class="col-md-4"></div>
		</div>
	<div id="pageContent">
	  <h1><span class="label label-primary">Users</span></h1>
	  
	  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNewSchool">New School</button>
	 <table id="schoolTable" class="table table-condensed schoolTable">
	 <tr>
				
				<th><label>School Name</label></th>
				
		</tr>

	
	</div>
</div>


<div class="container">
  <!-- Modal New School-->
  <div class="modal fade" id="modalNewSchool" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New School</h4>
        </div>
        <div class="modal-body">
			
		 <h4 class="h4">School Name<input type="text" id="school_name" class="form-control"/></h4>
          </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveSchool" class="btn btn-success" data-dismiss="modal" onclick="createNewSchool()">Save</button>
        </div>
      </div>
    </div>
  </div>


<!-- Modal Edit School-->
  <div class="modal fade" id="modalEditSchool" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit School</h4>
        </div>
        <div class="modal-body">
		  <input type="hidden" id="update_id"/>
          <h4 class="h4">School Name<input type="text" id="update_name" class="form-control"/></h4>
          </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateSchool" class="btn btn-primary btnUpdateSchool" data-dismiss="modal">Update</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>

</body>
</html>
