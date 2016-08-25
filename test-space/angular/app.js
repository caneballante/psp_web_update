// JavaScript Document


(function(){
var app = angular.module('store', []);

app.controller('StoreController', function() {
	this.products = gems;
	});

app.controller('ReviewController', function() {
	this.review = [];
	});
	
		
app.controller('PanelController', function() {
	this.tab = 1;
	this.selectTab = function (setTab) {
		this.tab = setTab;	
		};
	this.isSelected = function (checkTab) {
		return this.tab === checkTab;
		};
	});

var gems = [
		{
			name: 'dodo',
			price: 3.22,
			description: 'this is a description',
			canPurchase: false,
			soldOut: false,
			images : [
				{
					full: 'img/gem1_lg.jpg',
					thumb: 'img/gem1_sm.jpg',
				},
				{
					full: 'img/gem1_lg.jpg',
					thumb: 'img/gem1_sm.jpg',
				}
			]
		},
		
	]
})();