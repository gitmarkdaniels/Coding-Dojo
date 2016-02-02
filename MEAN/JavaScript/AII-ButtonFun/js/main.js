$(document).ready(function() {
	var buttonNumber = 2;
	var clickCount = 0;
	var defaultColor = $('#default_button').css('background-color');

	// toggle blue and red
	$('#buttons').on('click', 'button', function() {
		clickCount++;
		if (clickCount % 2 == 0) {
			$(this).css('background-color', 'blue');
		} else {
			$(this).css('background-color', 'red');
		}
	});

	// green
	$('#buttons').on('mouseover', 'button', function() {
		$(this).css('background-color', 'green');
	});

	// revert to default color
	$('#buttons').on('mouseout', 'button', function() {
		$(this).css('background-color', defaultColor);
	});

	// press enter key: new button, having same events
	$(document).on('keypress', function() {
		if(event.which == 13) {
			$('#buttons').append('<button class="newButton">button ' + buttonNumber + '</button>');
			buttonNumber++;
		}
	});

});