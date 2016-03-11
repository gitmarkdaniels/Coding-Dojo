myApp.factory('TeamFactory', function() {

	var teams = [];

	return {
		index: function() {
			return teams;
		},
		create: function(newTeam) {
			teams.push(newTeam);
		},
		destroy:function(team) {
			teams.splice(teams.indexOf(team, 1));
		}
	}
});