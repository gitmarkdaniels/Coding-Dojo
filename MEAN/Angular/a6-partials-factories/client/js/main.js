var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(function($routeProvider) {
	$routeProvider
	.when('/players', {
		templateUrl: '/partials/players.html',
		controller: 'PlayersController',
		controllerAs: 'PCtrl'
	})
	.when('/teams', {
		templateUrl: '/partials/teams.html',
		controller: 'TeamsController',
		controllerAs: 'TCtrl'
	})
	.otherwise({
		redirectTo: '/players'
	})
});