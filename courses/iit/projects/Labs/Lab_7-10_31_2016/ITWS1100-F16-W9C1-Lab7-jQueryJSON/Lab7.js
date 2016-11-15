

$(document).ready(function() {
	$.ajax({
		url: '../../resources/json/lab7.json',
		type: 'GET',
		dataType: 'json',
		success: function(responseData, status) {
			var output = "<ul>";
				$.each(responseData.menuItem, function(i, item) {
	       		output += '<li><a href="'+ item.menuURL;
	       		output += '">' + item.menuName + '</a><br/>';
	        	output += item.menuDesc;
	        	output += '</li>';
	      	});
	      	output += "</ul>";
	      	$('#labList').html(output);
		}
	});
});