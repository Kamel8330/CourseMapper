/*
 Script to build the course mapper for the student.
 It could be regarding to which major he is registrated on.
 It will only show the courses for the registred major.
 
 Date & Time => jan/06/2019 9:00 p.m.
 
*/
function bodyLoad(){
	
	var year = 1;
	while(year<=4){
		
		populateCourseMapper(year);
		//window.alert(year);
		year++;
	}
	
}
function populateCourseMapper(year){
	$(document).ready(function (){
			var majorID = 17;
			var _year = year;
			//alert(year);
			var dataString = {
				YearID : _year,
				MajorID  : majorID
				
			};
			//alert(dataString.YearID + " - " +dataString.MajorID);
			$.ajax({
				url: '../API/GetCoursesByMajor.php',
                type: 'POST',
                dataType: 'json',
				data: dataString,
				crossDomain: true,
				cache: false,
				success : function(data, status, jqXHR) {
						
						var obj = JSON.stringify(data);
						myObj = JSON.parse(obj);
						//alert(obj);
						$.each(myObj, function(i, courses){
							//alert(myObj[i].CourseName);
							//alert(myObj[i].CourseName);
							$("#year"+dataString.YearID).append("<h3><span class='label label-primary'>"+myObj[i].CourseCode+"</span></h3>");
						
							
						});
					},
					 error: function(jqXHR, exception) {
						if (jqXHR.status === 0) {
							alert('Not connect.\n Verify Network.');
						} else if (jqXHR.status == 404) {
							alert('Requested page not found. [404]');
						} else if (jqXHR.status == 500) {
							alert('Internal Server Error [500].');
						} else if (exception === 'parsererror') {
							alert('Requested JSON parse failed.');
						} else if (exception === 'timeout') {
							alert('Time out error.');
						} else if (exception === 'abort') {
							alert('Ajax request aborted.');
						} else {
							alert('Uncaught Error.\n' + jqXHR.responseText);
						}
					}
				});
		});
}