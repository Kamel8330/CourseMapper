   function bodyLoad(){
        $(document).ready(function () {
			
               populateTable();
			   populateDropDownSchool();
			/*This part is when you click on the edit button in the table*/
			$("body").on("click", ".btnEdit", function (){
					var id = $(this).attr("value");
					var departmentName =$(this).parent("td").siblings(":first").text();
					//$("#department_name").val("asd");
					
					$("#update_id").val(id);
				//	alert(id +" - " + departmentName);
					$(".department_name").val(departmentName);
				 
			 });
			 /*This part is when you apply the update from the modal.*/
		    $("body").on("click",".btnUpdateDepartment", function(){
					var departmentId = $("#update_id").val();
					var departmentName = $(".department_name").val();
					
					var schoolId = $(".updateSchoolDropDown option:selected").attr("value");
					var dataString = {
						department_id : departmentId,
						department_name : departmentName,
						school_id_fk : schoolId 
					};
					//alert(dataString.department_name);
					 $.ajax({
					type: 'POST',
					url: '../../API/UpdateDepartment.php',
					data:dataString,
					success : function(data, status, jqXHR) {
						$("#departmentsTable").find("tr").remove();
						$("#departmentsTable").append("<tr><th><label>Department Name</label></th><th><label>School Name</label></th></tr>");
						populateTable();
						//alert("Department updated!");
						
					}//end success
				});//end ajax request
					//$("#coursesTable").addClass("table table-condensed");
					//populateTable();
					
			 });
        });
    }
    function populateDropDownSchool(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/GetSchools.php',
					
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
							$.each(myObj, function(i, schools){
	
								$(".schoolDropDown").append("<option value=" + myObj[i].SchoolId + ">"+myObj[i].SchoolName+"</option>");
								$(".updateSchoolDropDown").append("<option value=" + myObj[i].SchoolId + ">"+myObj[i].SchoolName+"</option>");
								
										
							});
						
							
				}});
		});
		
	}
    function deleteDepartment(value){
             
         var deleteItem = confirm("Do you really want to delete this department?");
         if(deleteItem){
             //then Delete.
             var dataString = { department_id : value};
             $.ajax({
                //type:"POST",
				url:"../../API/DeleteDepartments.php",
                
                type:"POST",
				data : dataString,
			//	cache:false,
               // crossDomain : true,
				success : function (){
					//$("#coursesTable").removeClass(".coursesTable tr");
					//$("#coursesTable").removeClass("<table table table-condensed>");
					//populateTable();
					$("#departmentsTable").find("tr").remove();
					$("#departmentsTable").append("<tr><th><label>Department Name</label></th><th><label>School Name</label></th></tr>");
					populateTable();
					alert("Department Deleted!");
				}
			});
		 }
         else{
             alert('Department not deleted');
             window.open('index.php', '_self');
         }
    }
 
    function populateTable() {
        $(document).ready(function () {
				$.ajax({
                url: '../../API/GetDepartments.php',
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
						
						$.each(myObj, function(i, departments){
						
						$btnEdit = "<button class='btn btn-warning btnEdit' id='btnEdit' value='"+myObj[i].DepartmentId+"' data-toggle='modal' data-target='#modalEditDepartment'>Edit</button>";
						$btnDelete = "<button onclick='deleteDepartment(this.value)' class='btn btn-danger' id='btnDelete' value='"+myObj[i].DepartmentId+"'>Delete</button>";
						
						$("#departmentsTable").append("<tr><td>" + myObj[i].DepartmentName + "</td><td>" + myObj[i].SchoolName + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
								  
						});
						$("#departmentsTable").append("</table>");
           
				}
			});
   
		});
	}
	function createNewDepartment(){
		var schoolName = $(".schoolDropDown option:selected").html();
		$(document).ready(function () {
			//e.preventDefault();
            var dataString = {
				department_name : $("#department_name").val(),
				
				school_id_fk : $(".schoolDropDown option:selected").attr("value")
				};
			  $.ajax({
				type: 'POST',
                url: '../../API/InsertDepartment.php',
				data:dataString,
				
				success : function() {
						$("#departmentsTable").append("<tr><td>" + dataString.department_name + "<td>" + schoolName + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
						//alert("New course Created!");
					
				}
			});
   
		});
		
	}
