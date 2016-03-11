myApp.factory('PlayerFactory', function() {

	var players = [];

	return {
		index: function() {
			return players;
		},
		create: function(newUser) {
			players.push(newUser);
		},
		destroy: function(player) {
			players.splice(players.indexOf(player, 1));
		}
	}
});