$(document).ready(function() {

var data = new Object();
$(".submit").click(function(){
	data.email = $("input[name=email]").val();
	data.username = $("input[name=username]").val();
	data.password = $("input[name=password]").val();
	alert(data);
});



});