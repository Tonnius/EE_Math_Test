$(document).ready(function() {
	$("#protip").click(function(){
		$.getJSON("/protip",function(result){
			$("#tip").html(result.html);
		});
	});
 });
