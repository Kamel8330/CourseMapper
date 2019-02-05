   function bodyLoad(){
        $(document).ready(function () {
			//alert("Page Load!");
            
               populateTable();
			   populateDropDownDepartment();
			/*This part is when you click on the edit button in the table*/
			$("body").on("click", ".btnEdit", function (){
					var id = $(this).attr("value");
					var course_id_fk = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
					var semester_id_fk = $(this).parent("td").prev("td").prev("td").prev("td").text();
					var course_description = $(this).parent("td").prev("td").prev("td").text();
					$("#update_id").val(id);
					$("#update_code").val(course_code);
					$("#update_name").val(course_name);
					$("#update_description").val(course_description);
				 
			 });
			 /*This part is when you apply the update from the modal.*/
		    $("body").on("click",".btnUpdateCourse", function(){
					var courseId = $("#update_id").val();
					var courseCode = $("#update_code").val();
					var courseName = $("#update_name").val();
					var courseDescription = $("#update_description").val();
					var departmentId = $(".deptDropDown option:selected").attr("value");
					var dataString = {
						course_id : courseId,
						course_code : courseCode,
						course_name : courseName,
						course_description : courseDescription,
						department_id_fk : departmentId 
					};
					 $.ajax({
					type: 'POST',
					url: '../../API/UpdateCourseOffering.php',
					data:dataString,
					success : function(data, status, jqXHR) {
						$("#courseOfferTable").find("tr").remove();
						$("#courseOfferTable").append("<tr><th><label>Course</label></th><th><label for='course_name'>Semester</label></th><th><label>Year</label></th></tr>");
						populateTable();
						
					}//end success
				});//end ajax request
					//$("#coursesTable").addClass("table table-condensed");
					//populateTable();
					
			 });
        });
    }
    function populateDropDownCourse(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/GetCourses.php',
					
					crossDomain: true,
					cache: false,
					dataType: 'json',
					contentType: 'application/json; charset=utf-8',
					crossDomain: true,
					cache: false,
					success : function(data, status, jqXHR) {
							
							var obj = JSON.stringify(data);
							myObj = JSON.parse(obj);
							//var _products = [];
							//$("#deptDropDown").append("<select>");
							$.each(myObj, function(i, courses){
	
								$(".courseDropDown").append("<option value=" + myObj[i].DepartmentId + ">"+myObj[i].DepartmentName+"</option>");
								
										
							});
						
							
				}});
		});
		
	}
	function populateDropDownSemester(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/GetSemesters.php',
					
					crossDomain: true,
					cache: false,
					dataType: 'json',
					contentType: 'application/json; charset=utf-8',
					crossDomain: true,
					cache: false,
					success : function(data, status, jqXHR) {
							
							var obj = JSON.stringify(data);
							myObj = JSON.parse(obj);
							//var _products = [];
							//$("#deptDropDown").append("<select>");
							$.each(myObj, function(i, courses){
	
								$(".semesterDropDown").append("<option value=" + myObj[i].SemesterId + ">"+myObj[i].Semester+"</option>");
								
										
							});
						
							
				}});
		});
		
	}
	function populateDropDownYear(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/GetYear.php',
					
					crossDomain: true,
					cache: false,
					dataType: 'json',
					contentType: 'application/json; charset=utf-8',
					crossDomain: true,
					cache: false,
					success : function(data, status, jqXHR) {
							
							var obj = JSON.stringify(data);
							myObj = JSON.parse(obj);
							//var _products = [];
							//$("#deptDropDown").append("<select>");
							$.each(myObj, function(i, courses){
	
								$(".yearDropDown").append("<option value=" + myObj[i].YearId + ">"+myObj[i].Year+"</option>");
								
										
							});
						
							
				}});
		});
		
	}
    function deleteCourseOffering(value){
             
         var deleteItem = confirm("Do you really want to delete this course offering?");
	

		
         if(deleteItem){
             //then Delete.
             var dataString = { courseId : value};
             $.ajax({
                type:'POST',
				url:'../../API/DeleteCourseOffering.php',
                data : dataString,
				
				success : function (data){
				
					$("#courseOfferTable").find("tr").remove();
					$("#courseOfferTable").append("<tr><th><label>Course </label></th><th><label for='course_name'>Semester</label></th><th><label>Year</label></th></tr>");
					populateTable();
					alert("Course Offer Deleted!");
				}
			});
		 }
         else{
             alert('Course not delete');
             window.open('index.php', '_self');
         }
    }
 
    function populateTable() {
        $(document).ready(function () {
	
		$.ajax({
                url: '../../API/GetCourseOffering.php',
                type: 'POST',
                crossDomain: true,
                cache: false,
                dataType: 'json',
				contentType: 'application/json; charset=utf-8',
				crossDomain: true,
				cache: false,
				success : function(data, status, jqXHR) {
						
						var obj = JSON.stringify(data);
						myObj = JSON.parse(obj);
						//var _products = [];
						
						$.each(myObj, function(i, courses){
						
						$btnEdit = "<button class='btn btn-warning btnEdit' id='btnEdit' value='"+myObj[i].CourseOfferId+"' data-toggle='modal' data-target='#modalEditCourse'>Edit</button>";
						$btnDelete = "<button onclick='deleteCourseOffering(this.value)' class='btn btn-danger' id='btnDelete' value='"+myObj[i].CourseOfferId+"'>Delete</button>";
						
						$("#courseOfferTable").append("<tr><td>" + myObj[i].CourseName + "</td><td>" + myObj[i].SemesterName + "</td><td>" + myObj[i].Year + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
								  
						});
						$("#courseOfferTable").append("</table>");
           
			}});
   
		});
	}
	function createNewCourseOffering(){
		var courseName = $(".courseDropDown option:selected").html();
		var semesterName = $(".semesterDropDown option:selected").html();
		var year = $(".yearDropDown option:selected").html();
		$(document).ready(function () {
			
            var dataString = {
				course_id : $(".courseDropDown option:selected").attr("value"),
				semester_id : $(".semesterDropDown option:selected").attr("value"),
				year_id : $(".yearDropDown option:selected").attr("value")
				};			
            $.ajax({
				type: 'POST',
                url: '../../API/InsertCourseOffer.php',
				data:dataString,
				
				success : function() {
						$("#courseOfferTable").append("<tr><td>" + dataString.course_id + "</td><td>" + dataString.semester_id + "</td><td>" + dataString.year_id + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
						
				}
			});
   
		});
		
	}
