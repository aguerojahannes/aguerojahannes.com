(function() {
	'use strict';
	angular.module('app')
	.controller('HomeController', HomeController);


	function HomeController($mdSidenav) {
		var vm = this;
		vm.title = 'Welcome to our App!';


		// BRAINSTORM CLOSE/TOGGLE
	vm.toggleArtofAscent = function () {
	$mdSidenav('right').toggle();
	};
	vm.close = function () {
	$mdSidenav('right').toggle();
	};


	vm.toggleGetful = function () {
	$mdSidenav('getful').toggle();
	};
	vm.closeGetful = function () {
	$mdSidenav('getful').toggle();
	};


	vm.toggleFoodForum = function () {
	$mdSidenav('foodforum').toggle();
	};
	vm.close = function () {
	$mdSidenav('foodforum').toggle();
	};


	vm.toggleOmn = function () {
	$mdSidenav('omn').toggle();
	};
	vm.close = function () {
	$mdSidenav('omn').toggle();
	};

	}
})();