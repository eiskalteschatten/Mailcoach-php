$(document).ready(function() {
	fetchMail();
});

function fetchMail() {
	$.ajax({
		url: "app/fetchMail.php",
		type: "POST",
		data: {type:"fetch"}
	}).done(function(data) {
		console.log(data);
		var emails = $.parseJSON(data);
		
		$('#emailcount').html(emails.count);
		
		var html = "";
		
		for (var key in emails) {
			if (key != "count") {
				html += '<div class="emailrow">';
				html += emails[key];
				html += '</div>';
			}		
		}
		
		$('.emails').html(html);
		
		$('.emailrow').click(function () {
			getMailContents($(this));
		});
	}).fail(function() {
		alert("There was an ajax error when fetching mail.");
	});
}

function getMailContents(obj) {
	var emailNumber = obj.find('.emailnumber').text();
	
	$.ajax({
		url: "app/fetchMail.php",
		type: 'POST',
		data: {type:"content", email_number:emailNumber}
	}).done(function(data) {
		console.log(data);
		/*var emails = $.parseJSON(data);
		
		$('#emailcount').html(emails.count);
		
		var html = "";
		
		for (var key in emails) {
			if (key != "count") {
				html += emails[key];
			}		
		}*/
		
		$('.emails').html(data);
	}).fail(function() {
		alert("There was an ajax error when getting contents.");
	});
}
