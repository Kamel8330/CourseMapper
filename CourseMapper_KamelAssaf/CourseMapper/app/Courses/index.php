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
<link rel="stylesheet" href="../../css/bootstrap4.css"/>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<title>Courses #2 - Test</title>
<style type="text/css">
	.coursesTable tr[visible='false'],
.no-result{
  display:none;
}

.coursesTable tr[visible='true']{
  display:table-row;
}

</style>
</head>
<body onload="bodyLoad()">

<div class="sidebar">
  <a href="../dashboard.php">Home</a>
  <a class="active" href="#">Courses</a>
  <a href="../Majors">Majors</a>
  <a href="../Departments">Departments</a>
  <a href="../Schools">Schools</a>
</div>

<div class="content">
		<div class="row">
			<div><img src="../../images/logo.png" height="100"/></div>
			<div class="col-md-4"></div>
		</div>
	<div id="pageContent">
	  <h1><span class="">Courses Management</span><!--<span class="badge badge-secondary">Courses Management</span>--></h2>
	  <hr>
	  <div class="row">
	  <div class="col-md-8">
		  <button type="button" class="btn btn-success btn-arrow-right" data-toggle="modal" data-target="#modalNewCourse" data-toggle="tooltip" data-placement="left" title="Add new course to curriculum">New Course</button>
		  <button class='btn btn-warning btnEdit btnControl disabled' id='btnEdit'  style='width:100px;' data-toggle='modal' data-target='#modalEditCourse'>Edit</button>
		  <button class='btn btn-danger  btnControl disabled' onclick='deleteCourse(this.value)' id='btnDelete' style='width:100px;' data-toggle='modal' data-target='#modalDeleteCourse'>Delete</button>
		  <button class='btn btn-primary btnAddNewOffering btnControl disabled' id='btnAddNewOffering' style='width:100px;' data-toggle='modal' data-target='#modalNewCourseOffer'>Offer</button>
		  <button class='btn btn-info btnPreRequisite btnControl disabled' id='btnRequisite' style='width:100px;' data-toggle='modal' data-target='#modalPreRequisite'>Requisite</button>
		  <button class='btn btn-dark btnMapper btnControl disabled' id='btnAddNewMapper' style='width:100px;' data-toggle='modal' data-target='#modalNewCourseMapper'>Mapper</button>
	  </div>
	  <div class="col">
		<input class="form-control search" id="search" type="text" placeholder="Search..">
	</div>
	  </div>
	
	<hr>
	
	 <table id="coursesTable" class="table table-hover table-bordered coursesTable" cellspacing="0" width="100%">
	<thead>
	<tr>	
				<th width="150"><label>Course Code</label></th>
				<th ><label for="course_name">Course Name</label></th>
				<th><label>Course Description</label></th>
				<!--<th><label>Major</label></th>		-->
		</tr>
	<tr class="warning no-result">
		<td colspan="3"><i class="fa fa-warning"></i> No result</td>
    </tr>
	</thead>
	<tbody id="tbody">

	
	</div>
</div>


<div class="container">

  <!-- Modal New Course-->
  <div class="modal fade" id="modalNewCourse" tabindex="-1" role="dialog" aria-labelledby="modalTitleNewCourse" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <h4 class="modal-title" id="modalTitleNewCourse">Create New Course</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>
        <div class="modal-body">
          <h4 class="h4">Code<input type="text" id="course_code" class="form-control"/></h4>
          <h4 class="h4">Name<input type="text" id="course_name" class="form-control"/></h4>
          <h4 class="h4">Description<input type="text" id="course_description" class="form-control"/></h4>
          <h4 class="h4">Major</h4><select id="majorDropDown" class="form-control majorDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCourse" class="btn btn-primary" data-dismiss="modal" onclick="createNewCourse()">Save</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal New Course Offering-->
  <div class="modal fade" id="modalNewCourseOffer" tabindex="-1" role="dialog" aria-labelledby="modalTitleNewOffer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
        
          <h4 class="modal-title" id="modalTitleNewOffer">Course Offering</h4>
			 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
        <div class="modal-body">
		    <input type="hidden" id="course_id_fk"/>
			<h5>Create an offering for course:</h5><input type="text" id="_courseName" class="form-control" readonly />
			<h5>Academic semester</h5>
            <select id="semesterDropDown" class="form-control semesterDropDown"></select>
			<h5>Academic year</h5>
            <select id="yearDropDown" class="form-control yearDropDown"></select>
			<h5>Instructor</h5>
			<select id="instructorsDropDown" class="form-control instructorsDropDown"></select>
			<h5>Section</h5>
			<select id="sectionsDropDown" class="form-control sectionsDropDown"></select>
	
		 </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCourseOffering" class="btn btn-success" data-dismiss="modal">Create Course Offer</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Edit Course-->
  <div class="modal fade" id="modalEditCourse" tabindex="-1" role="dialog" aria-labelledby="modalTitleEditCourse" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
         
          <h4 class="modal-title" id="modalTitleEditCourse">Edit Course</h4>
			 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
        <div class="modal-body">
		  <input type="hidden" id="update_id"/>
          <h4 class="h4">Code<input type="text" id="update_code" class="form-control"/></h4>
          <h4 class="h4">Name<input type="text" id="update_name" class="form-control"/></h4>
          <h4 class="h4">Description<input type="text" id="update_description" class="form-control"/></h4>
          <h4 class="h4">Major</h4><select id="updateMajorDropDown" class="form-control-lg form-control updateMajorDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateCourse" class="btn btn-primary btnUpdateCourse" data-dismiss="modal">Save Changes</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Course PreREquisite -->
	<div class="modal fade" id="modalPreRequisite" tabindex="-1" role="dialog" aria-labelledby="modalTitlePreRequisite" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
         
          <h4 class="modal-title" id="modalTitlePreRequisite">Create Course Pre Requisite</h4>
			 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
        <div class="modal-body">
		    <input type="hidden" id="_courseNameID"/>
            <!--<select id="coursesDropDown" class="form-control coursesDropDown"></select>-->
			<h4>Create Requisite for: </h4><input type="text" id="courseNameRequisite" class="form-control" readonly />
            <h4>Select a course requisite:</h4><div class="form-group"><select id="courseRequisiteDropDown" class="form-control courseRequisiteDropDown"></select></div>
			<div class="form-group">
			
  </div>
		 </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCoursePreRequisite" class="btn btn-success" data-dismiss="modal">Set Course Pre Requisite</button>
        </div>
      </div>
    </div>
  </div>
  
  <!--Modal To Select a course offering to create a mapper for it-->
  <div class="modal fade" id="modalSelectCourseOffer" tabindex="-1" role="dialog" aria-labelledby="modalSelectCourseOffer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
         
          <h4 class="modal-title" id="modalSelectCourseOffer">Select a course offer.</h4>
			 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
        <div class="modal-body">
		    <input type="hidden" id="_courseNameID"/>
			 <h4>Select a course offering:</h4><div class="form-group"><select id="courseOfferingDropDown" class="form-control courseOfferingDropDown"></select></div>
			
		 </div>
        <div class="modal-footer">
          <button type="button" id="btnCreateCourseMapper" class="btn btn-success" data-dismiss="modal">Create Mapper</button>
        </div>
      </div>
    </div>
  </div>
 </div>

<script type="text/javascript" src="../js/dashboard.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../js/courseScript.js"></script>
<script type="text/javascript" src="../js/pagination.js"></script>
<script src="../../js/bootstrap4.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
  
</body>
</html>
