   function bodyLoad(){
        $(document).ready(function () {
			//alert("Page Load!");
            $('#btnNewSchool').click(function(){
          
               window.open('createSchool.php', '_self'); 
            });
               populateTable();
			/*This part is when you click on the edit button in the table*/
			$("body").on("click", ".btnEdit", function (){
					var id = $(this).attr("value");
					var school_name = $(this).parent("td").prev("td").text();
					$("#update_id").val(id);
					$("#update_name").val(school_name);
			 });
			 /*This part is when you apply the update from the modal.*/
		    $("body").on("click",".btnUpdateSchool", function(){
					var id = $("#update_id").val();
					var schoolName = $("#update_name").val();
					var dataString = {
						school_id : id,
						school_name : schoolName
					};
					 $.ajax({
					type: 'POST',
					url: '../../API/UpdateSchool.php',
					data:dataString,
					success : function(data, status, jqXHR) {
						$("#schoolTable").find("tr").remove();
						$("#schoolTable").append("<tr><th><label>School Name</label></th>");
						//populateTable();
						alert("School updated!");
						
					}//end success
				});//end ajax request
					//$("#coursesTable").addClass("table table-condensed");
					populateTable();
					
			 });
        });
    }
   
    function deleteSchool(value){
             
         var deleteItem = confirm("Do you really want to delete this school?");
	

		
         if(deleteItem){
             //then Delete.
             var dataString = { school_id : value};
             $.ajax({
                type:'POST',
				url:'../../API/DeleteSchool.php',
                data : dataString,
				//cache:false,
               // crossDomain : true,
				success : function (data){
					//$("#coursesTable").removeClass(".coursesTable tr");
					//$("#coursesTable").removeClass("<table table table-condensed>");
					//populateTable();
					$("#schoolTable").find("tr").remove();
					$("#schoolTable").append("<tr><th><label>School Name</label></th></tr>");
					populateTable();
					alert("School Deleted!");
				}
			});
		 }
         else{
             alert('School not deleted');
             window.open('index.php', '_self');
         }
    }
 
    function populateTable() {
        $(document).ready(function () {
	
            $.ajax({
                url: '../../API/GetSchools.php',
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
						
						$.each(myObj, function(i, courses){
						$btnEdit = "<button class='btn btn-warning btnEdit' id='btnEdit' value='"+myObj[i].SchoolId+"' data-toggle='modal' data-target='#modalEditSchool'>Edit</button>";
						$btnDelete = "<button onclick='deleteSchool(this.value)' class='btn btn-danger' id='btnDelete' value='"+myObj[i].SchoolId+"'>Delete</button>";
						
						$("#schoolTable").append("<tr><td>" + myObj[i].SchoolName + "</td><td>"+$btnEdit+"</td><td> "+$btnDelete+"</td></tr>");
								  
						});
						$("#schoolTable").append("</table>");
           
			}});
   
		});
	}
	function createNewSchool(){
		$(document).ready(function () {
			//e.preventDefault();
            var dataString = {
				
				school_name : $("#school_name").val(),
				};
				
            $.ajax({
				type: 'POST',
                url: '../../API/InsertSchool.php',
				data:dataString,
				
				success : function() {
					alert("New School!");
						$("#schoolTable").find("tr").remove();
						$("#schoolTable").append("<tr><th><label>School Name</label></th>");
						populateTable();
				}
			});
   
		});
		
	}
