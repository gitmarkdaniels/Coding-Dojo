$(document).ready(function() {

	$("button").click(function() {
		$.get('https://api.github.com/users/gitmarkdaniels', function(result) {
			displayName(result);
		}, 'json');
	});

	function displayName(data) {
		console.log(data.name);
		var htmlString = '';
		htmlString += '<h3>';
		htmlString += data.name;
		htmlString += '</h3>';
		$('#info').html(htmlString);
	}
})