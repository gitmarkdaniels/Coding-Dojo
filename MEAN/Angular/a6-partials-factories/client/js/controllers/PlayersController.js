myApp.controller('PlayersController', function(PlayerFactory) {

	this.players = PlayerFactory.index();

	this.create = function() {
		PlayerFactory.create(this.newPlayer);
		this.newPlayer = {};
	};

	this.destroy = function(player) {
		PlayerFactory.destroy(player);
	};
});