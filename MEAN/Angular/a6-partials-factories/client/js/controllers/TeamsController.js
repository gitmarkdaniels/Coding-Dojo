myApp.controller('TeamsController', function(TeamFactory) {

	this.teams = TeamFactory.index();

	this.create = function() {
		TeamFactory.create(this.newTeam);
		this.newTeam = {};
	};

	this.destroy = function(team) {
		TeamFactory.destroy(team);
	};
});