(function() {
	'use strict';
	angular.module('app', ['ui.router', "ngMaterial"])
	.config(Config);

	function Config($stateProvider, $urlRouterProvider) {
		$stateProvider.state('Home',{
			url: '/',
			templateUrl: 'views/home.html'
		})
		.state('Portfolio',{
			url: '/portfolio',
			templateUrl: 'views/portfolio.html'
		})
		.state('ArtofAscent',{
			url: '/artofascent',
			templateUrl: 'views/artofascent.html'
		})
		.state('Getful',{
			url: '/getful',
			templateUrl: 'views/getful.html'
		})
		.state('Forum',{
			url: '/forum',
			templateUrl: 'views/forum.html'
		})
		.state('Om-n',{
			url: '/om-n',
			templateUrl: 'views/om-n.html'
		});

		$urlRouterProvider.otherwise('/');
	}
})();
