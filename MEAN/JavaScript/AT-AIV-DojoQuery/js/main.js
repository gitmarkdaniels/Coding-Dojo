var $Dojo = (function() {
	return function(htmlId) {
		var getHtmlId = document.getElementById(htmlId);
		return {
			click: function(callback) {
					getHtmlId.addEventListener('click', function() {
					callback(htmlId);
				});
			},
			hover: function(callback1, callback2) {
					getHtmlId.addEventListener('mouseover', function() {
					callback1(htmlId);
				});
					getHtmlId.addEventListener('mouseout', function() {
					callback2(htmlId);
				});
			}
		};
	};
})();

$Dojo('but1').click(function(item) {
	console.log('The button ' + item + ' was clicked!');
});

$Dojo('but1').hover(function(item) {
	console.log('The button ' + item + ' was hovered over!');
}, function(item) {
	console.log('The button ' + item + ' was hovered out!');
});