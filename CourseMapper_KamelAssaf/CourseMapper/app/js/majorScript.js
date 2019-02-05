   function bodyLoad(){
        $(document).ready(function () {
			
               populateTable();
			   populateDropDownDepartment();
			/*This part is when you click on the edit button in the table*/
			$("body").on("click", ".btnEdit", function (){
					var id = $(this).attr("value");
					var majorName =$(this).parent("td").siblings(":first").text();
					//alert(majorName);
					$("#update_id").val(id);
					$(".update_major_name").val(majorName);
					
			 });
			 /*This part is when you apply the update from the modal.*/
		    $("body").on("click",".btnUpdateMajor", function(){
				
					var majorId = $("#update_id").val();
					var _majorName = $(".update_major_name").val();
					alert(_majorName);
					var departmentId = $(".updateDepartmentDropDown option:selected").attr("value");
					var dataString = {
						major_id : majorId,
						major_name : _majorName,
						department_id_fk : departmentId 
					};
					console.log(dataString);
					//alert("id: " + dataString.major_id + "\nname:" + dataString.major_name + "\ndepartment: " + dataString.department_id_fk);
					 $.ajax({
					type: 'POST',
					url: '../../API/UpdateMajor.php',
					data:dataString,
					success : function(data, status, jqXHR) {
						$("#majorsTable").find("tr").remove();
						$("#majorsTable").append("<tr><th><label>Major Name</label></th><th><label>Department</label></th></tr>");
						populateTable();
						//alert("Major updated!");
						
					}//end success
				});//end ajax request
					//$("#coursesTable").addClass("table table-condensed");
					//populateTable();
					
			 });
        });
    }
    function populateDropDownDepartment(){
		$(document).ready(function (){
			
			$.ajax({
					type:'POST',
					url:'../../API/GetDepartments.php',
					
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
							$.each(myObj, function(i, departments){
	
								$(".departmentDropDown").append("<option value=" + myObj[i].DepartmentId + ">"+myObj[i].DepartmentName+"</option>");
								$(".updateDepartmentDropDown").append("<option value=" + myObj[i].DepartmentId + ">"+myObj[i].DepartmentName+"</option>");
								
							});
							
				}});
		});
		
	}
    function deleteMajor(value){
             
         var deleteItem = confirm("Do you really want to delete this department?");
	

		
         if(deleteItem){
             //then Delete.
             var dataString = { major_id : value};
             $.ajax({
                type:'POST',
				url:'../../API/DeleteMajor.php',
                data : dataString,
				//cache:false,
               // crossDomain : true,
				success : function (data){
					//$("#coursesTable").removeClass(".coursesTable tr");
					//$("#coursesTable").removeClass("<table table table-condensed>");
					//populateTable();
					$("#majorsTable").find("tr").remove();
					$("#majorsTable").append("<tr><th><label>Major Name</label></th><th><label>Deparment Name</label></th></tr>");
					populateTable();
					alert("Major Deleted!");
				}
			});
		 }
         else{
             alert('Major not deleted');
             window.open('index.php', '_self');
         }
    }
 
    function populateTable() {
        $(document).ready(function () {
				$.ajax({
                url: '../../API/GetMajors.php',
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
						
						$.each(myObj, function(i, majors){
						
						$btnEdit = "<button class='btn btn-warning btnEdit' id='btnEdit' value='"+myObj[i].MajorId+"' data-toggle='modal' data-target='#modalEditMajor'>Edit</button>";
						$btnDelete = "<button onclick='deleteMajor(this.value)' class='btn btn-danger' id='btnDelete' value='"+myObj[i].MajorId+"'>Delete</button>";
						
						$("#majorsTable").append("<tr><td>" + myObj[i].MajorName + "</td><td>" + myObj[i].DepartmentName + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
								  
						});
						$("#majorsTable").append("</table>");
           
				}
			});
   
		});
	}
	function createNewMajor(){
		var departmentName = $(".departmentDropDown option:selected").html();
		alert($(".major_name").val());
		$(document).ready(function () {
			//e.preventDefault();
            var dataString = {
				major_name : $("#major_name").val(),
				
				department_id_fk : $(".departmentDropDown option:selected").attr("value")
				};
			  $.ajax({
				type: 'POST',
                url: '../../API/InsertMajor.php',
				data:dataString,
				
				success : function() {
						$("#majorsTable tbody").append("<tr><td>" + dataString.major_name + "<td>" + departmentName + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
						//alert("New course Created!");
					
				}
			});
   
		});
		
	}
