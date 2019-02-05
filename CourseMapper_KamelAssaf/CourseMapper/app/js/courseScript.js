function bodyLoad(){
        $(document).ready(function () {

               populateTable();
			  
			   populateDropDownMajor();
			   populateSemester();
			   populateYear();
			   populateDropDownCourse();
			   populateDropDownSection();
			   populateDropDownInstructors();
			//$('#coursesTable').DataTable();

				/*Table Search - Filter
			   $("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#coursesTable tbody tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
			  */
			  //Search in table manually
			
					  $(".search").keyup(function () {
						var searchTerm = $(".search").val();
						var listItem = $('.coursesTable tbody').children('tr');
						var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
						
					  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
							return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
						}
					  });
						
					  $(".coursesTable tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
						$(this).attr('visible','false');
					  });

					  $(".coursesTable tbody tr:containsi('" + searchSplit + "')").each(function(e){
						$(this).attr('visible','true');
					  });

					  var jobCount = $('.coursesTable tbody tr[visible="true"]').length;
						$('.counter').text(jobCount + ' item');

					  if(jobCount == '0') {$('.no-result').show();}
						else {$('.no-result').hide();}
							  });
			
			$("body").on("click", ".btnMapper", function (){
				/*First check if the selected course is being offered in an academic year and a semester*/
				var dataString = {courseID : $(this).val()};
				$.ajax({
					type: 'POST',
					url: '../../API/CheckCourseOffer.php',
					data:dataString,
					success : function(data, status, jqXHR) {
						var obj = JSON.stringify(data);
						myObj = JSON.parse(obj);
						if(myObj[0].Results == 0){
							//No offering has been made for this course.
							var courseName = window.localStorage.getItem("_cName");
							alert("Course "+courseName+" has no offering, please go back and set a course offer.");
							
						}
						
					},
					complete: function(){
					
						//alert("complete");
						/*ajax to get the offerings for the selected course*/
												var ds = {course_id_fk:$(".btnMapper").val()};
												//clean the dropdown first (courseOfferingDropDown)
												$(".courseOfferingDropDown").empty();
												$.ajax({
													type:'POST',
													url:'../../API/GetOfferingbyCourse.php',
													crossDomain: true,
													cache: false,
													dataType:'json',
													data:ds,
													success:function (data,status,jqXHR){
														//alert(data);
														var obj = JSON.stringify(data);
														myObj = JSON.parse(obj);
														
														$.each(myObj, function (i,o){
															
															//alert(object[i].CourseId);
															$(".courseOfferingDropDown").append("<option value="+myObj[i].CourseId+">"+myObj[i].CourseName+" - " +myObj[i].SemesterName+ " - " + myObj[i].Year + " - "+myObj[i].InstructorName+" - " + myObj[i].SectionRoom +"</option>");
														});
													}
												});
									$("#modalSelectCourseOffer").modal("show");
					}
					
				});
		
			});
			$("body").on("click", "#coursesTable tbody tr", function (){
				//$(this).css('background-color', 'lightyellow');
				//$(this).css('color', 'blue');
				//$(this).removeClass("trDesign");
				$(this).toggleClass("trDesign").siblings().removeClass('trDesign');;
				var id = $(this).attr('value');
				//alert(id);
				$(".btnControl").removeClass("disabled");
				$("#btnEdit").val(id);
				$("#btnDelete").val(id);
				$("#btnAddNewOffering").val(id);
				$("#btnRequisite").val(id);
				$("#btnAddNewMapper").val(id);
				
				var courseCode = $(this).find('td').eq(0).text();
				var courseName = $(this).find('td').eq(1).text();
				var courseDescription = $(this).find('td').eq(2).text();
				
				window.localStorage.setItem("_cCode", courseCode);
				window.localStorage.setItem("_cName", courseName);
				window.localStorage.setItem("_cDescription", courseDescription);
				
			});
			
		    $("body").on("click", ".btnPreRequisite", function (){
			
				var id = $(this).attr("value");
				var course_name = window.localStorage.getItem("_cName");
				$("#_courseNameID").val(id);
				$("#courseNameRequisite").val(course_name);
				
		    });
			$("body").on("click", "#btnSaveCoursePreRequisite", function (){
				
				var course_id_fk = $("#_courseNameID").val();
				var course_prerequisite_id_fk = $(".courseRequisiteDropDown option:selected").attr("value");
				var dataString = {
					_course_id_fk : course_id_fk,
					_course_prerequisite_id_fk : course_prerequisite_id_fk
				
				};
				//alert("Course Id : " +course_id_fk);
				$.ajax({
					type: 'POST',
					url: '../../API/InsertCourseRequisite.php',
					data:dataString,
					
					success : function() {
						alert("New course requisite created!");
					}
					
				});
			});
			/*This part is for the add course to an offering term such as semester and year.*/
			$("body").on("click", ".btnAddNewOffering", function (){
				var id = $(this).attr("value");
				//alert(id);
				var _courseName = window.localStorage.getItem("_cName");
				$("#course_id_fk").val(id);
				$("#_courseName").val(_courseName);
				
			});
			$("body").on("click", "#btnSaveCourseOffering", function (){
		
				var course_id_fk = $("#course_id_fk").val();
			    var semester_id_fk = $(".semesterDropDown option:selected").attr("value");
				var year_id_fk = $(".yearDropDown option:selected").attr("value");
				var section_id_fk = $(".sectionsDropDown option:selected").attr("value");
				var instructor_id_fk = $(".instructorsDropDown option:selected").attr("value");
				var dataString = {
					_course_id_fk : course_id_fk,
					_semester_id_fk : semester_id_fk,
					_year_id_fk : year_id_fk,
					_section_id_fk: section_id_fk,
					_instructor_id_fk: instructor_id_fk
					
				};
				//alert("Course Id : " +course_id_fk +"\nSemester Id: " + semester_id_fk+"\nYear Id: "+year_id_fk+"\nSection: "+dataString._section_id_fk+"\nInstructor:"+dataString._instructor_id_fk);
				$.ajax({
					type: 'POST',
					url: '../../API/InsertCourseOffer.php',
					data:dataString,
					
					success : function() {
						alert("New course offering added!");
					}
					
				});
			});
			
			/*This part is when you click on the edit button in the table*/
			$("body").on("click", ".btnEdit", function (){
					var id = $(this).attr("value");
					var course_code = window.localStorage.getItem("_cCode");
					var course_name = window.localStorage.getItem("_cName");
					var course_description = window.localStorage.getItem("_cDescription");
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
					var _major_id_fk = $(".updateMajorDropDown option:selected").attr("value");
				    //var _departmentId = $('#deptDropDown option:selected').val();
					//alert("course id : "+courseId+"\ncourse code: " + courseCode+ "\ncourse name: "+ courseName + "course description: " + courseDescription+"\nMajor id: " + _major_id_fk);
					var dataString = {
						course_id : courseId,
						course_code : courseCode,
						course_name : courseName,
						course_description : courseDescription,
						major_id_fk : _major_id_fk 
					};
					 $.ajax({
					type: 'POST',
					url: '../../API/UpdateCourse.php',
					data:dataString,
					success : function(data, status, jqXHR) {
						$("#coursesTable").find("tr").remove();
						$("#coursesTable").append("<tr><th><label>Course Code</label></th><th><label for='course_name'>Course Name</label></th><th><label>Course Description</label></th><th><label>Major</label></th></tr>");
						populateTable();
						//alert("Course updated!");
						
					}//end success
				});//end ajax request
					//$("#coursesTable").addClass("table table-condensed");
					//populateTable();
					
			 });
        });
    }
	function pagination(){
		
		
		$('#coursesTable').after('<ul id="_nav" class="pagination"></ul>');
			var rowsShown = 3;
			var rowsTotal = $('#coursesTable tbody tr').length;
			var numPages = rowsTotal/rowsShown;
			for(i = 0;i < numPages;i++) {
				var pageNum = i + 1;
				$('#_nav').append('<li class="page-item"><a href="#" rel="'+i+'" class="page-link">'+pageNum+'</a></li>');
			}
			$('#coursesTable tbody tr').hide();
			$('#coursesTable tbody tr').slice(0, rowsShown).show();
			$('#_nav li:first').addClass('active');
			$('#_nav li a').bind('click', function(){
				$('#_nav li').removeClass('active');
				$(this).closest("li").addClass('active');
				var currPage = $(this).attr('rel');
				var startItem = currPage * rowsShown;
				var endItem = startItem + rowsShown;
				$('#coursesTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
				css('display','table-row').animate({opacity:1}, 300);
			});
}
	function populateSemester(){
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
							$.each(myObj, function(i, semester){
								//alert("Department Id : " +myObj[i].DepartmentId);
								$(".semesterDropDown").append("<option value=" + myObj[i].SemesterId + ">"+myObj[i].Semester+"</option>");
										
							});
						
							
				}});
		});
		
	}
	function populateYear(){
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
							$.each(myObj, function(i, year){
								$(".yearDropDown").append("<option value=" + myObj[i].YearId + ">"+myObj[i].Year+"</option>");
										
							});
						
							
				}});
		});
		
	}
	/*Modified to get majors 09-01-2019*/
    function populateDropDownMajor(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/GetMajors.php',
					
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
							$.each(myObj, function(i, majors){
								//alert("Department Id : " +myObj[i].DepartmentId);
								$(".majorDropDown").append("<option value=" + myObj[i].MajorId + ">"+myObj[i].MajorName+"</option>");
								$(".updateMajorDropDown").append("<option value=" + myObj[i].MajorId + ">"+myObj[i].MajorName+"</option>");
										
							});
						
							
				}});
		});
		
	}
	function populateDropDownSection(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/Settings/Sections/GetSections.php',
					
					crossDomain: true,
					cache: false,
					dataType: 'json',
					contentType: 'application/json; charset=utf-8',
					crossDomain: true,
					cache: false,
					success : function(data, status, jqXHR) {
							
							var obj = JSON.stringify(data);
							myObj = JSON.parse(obj);
							
							$.each(myObj, function(i, sections){
								
								$("#sectionsDropDown").append("<option value=" + myObj[i].SectionId + ">"+myObj[i].SectionRoom+"</option>");
										
							});
						
							
				}});
		});
		
		
	}
	function populateDropDownInstructors(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/Instructors/GetInstructors.php',
					
					crossDomain: true,
					cache: false,
					dataType: 'json',
					contentType: 'application/json; charset=utf-8',
					crossDomain: true,
					cache: false,
					success : function(data, status, jqXHR) {
							
							var obj = JSON.stringify(data);
							myObj = JSON.parse(obj);
							
							$.each(myObj, function(i, sections){
								
								$("#instructorsDropDown").append("<option value=" + myObj[i].InstructorId + ">"+myObj[i].InstructorName+"</option>");
										
							});
						
							
				}});
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
								//alert("Department Id : " +myObj[i].DepartmentId);
								//$("#coursesDropDown").append("<option value=" + myObj[i].CourseId + ">"+myObj[i].CourseName+"</option>");
								var __courseName = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
								$("#courseNameRequisite").val(__courseName);
								//alert(__courseName);
								$("#courseRequisiteDropDown").append("<option value=" + myObj[i].CourseId + ">"+myObj[i].CourseName+"</option>");
										
							});
						
							
				}});
		});
		
	}
	
    function deleteCourse(value){
             
         var deleteItem = confirm("Do you really want to delete this course?");
	

		
         if(deleteItem){
             //then Delete.
             var dataString = { courseId : value};
             $.ajax({
                type:'POST',
				url:'../../API/DeleteCourses.php',
                data : dataString,
				//cache:false,
               // crossDomain : true,
				success : function (data){
					//$("#coursesTable").removeClass(".coursesTable tr");
					//$("#coursesTable").removeClass("<table table table-condensed>");
					//populateTable();
					$("#coursesTable").find("tr").remove();
					$("#coursesTable").append("<tr><th><label>Course Code</label></th><th><label for='course_name'>Course Name</label></th><th><label>Course Description</label></th><th><label>Major</label></th></tr>");
					populateTable();
					alert("Course Deleted!");
				}
			});
		 }
         else{
             alert('Course not deleted');
             window.open('index.php', '_self');
         }
    }
 
    function populateTable() {
        $(document).ready(function () {
	
					//$("#coursesTable").append("<tr><th><label>Course Code</label></th><th><label for='course_name'>Course Name</label></th><th><label>Course Description</label></th><th><label>Department</label></th></tr>");
				
          //  var dataString = {viewCourses : 'getAllCourses'};
            $.ajax({
                url: '../../API/GetCourses.php',
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
						$("#coursesTable tbody").append("<tr value='"+myObj[i].CourseId+"'></td><td>" + myObj[i].CourseCode + "</td><td>" + myObj[i].CourseName + "</td><td>" + myObj[i].CourseDescription + "</td></tr>");
								  
						});
						$("#coursesTable").append("</tbody></table>");
						pagination();
						
			}});
   
		});
	}
	function createNewCourse(){
		var majorName = $(".majorDropDown option:selected").html();
		$(document).ready(function () {
			//e.preventDefault();
            var dataString = {
				course_code : $("#course_code").val(),
				course_name : $("#course_name").val(),
				course_description : $("#course_description").val(),
				major_id_fk : $(".majorDropDown option:selected").attr("value")
				};
			//	alert(dataString.course_code + " - " + dataString.course_name + " " + dataString.course_description +" - " + dataString.major_id_fk);
						
            $.ajax({
				type: 'POST',
                url: '../../API/InsertCourse.php',
				data:dataString,
				
				success : function() {
					//	$("#coursesTable").append("<tr><td>" + dataString.course_code + "</td><td>" + dataString.course_name + "</td><td>" + dataString.course_description + "</td><td>" + dataString.department_id_fk + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
						//var name = $("#name").val();
						//var email = $("#email").val();
						//var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
						$("#coursesTable").append("<tr><td>" + dataString.course_code + "</td><td>" + dataString.course_name + "</td><td>" + dataString.course_description + "</td><td>" + majorName + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td><td> "+$btnCourseOffer+"</td></tr>");
						//alert("New course Created!");
						
				}
			});
   
		});
		
	}
