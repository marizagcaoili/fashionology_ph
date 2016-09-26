
angular.module('ExampleApp', ['ngDraggable']).
controller('MainCtrl', function ($scope,$http) {

	$scope.draggableObjects = [{}];
		

	$scope.ourStore=function(){
		location.href='/';
	}
	$scope.showCategory=function(){
		$('.mixnmb-items').show();
	}

	$scope.categBack=function(){
		$('.mixnmb-items').hide();
		
	}

	$http.get("/admin/catalog/get_items")
	.then(function(response){
		$scope.draggableObjects=response.data;
	})

	$scope.droppedObjects1 = [];
	$scope.onDropComplete1=function(data,evt){
		var index = $scope.droppedObjects1.indexOf(data);
		if (index == -1)
			$scope.droppedObjects1.push(data);
	}
	$scope.onDragSuccess1=function(data,evt){
		var index = $scope.droppedObjects1.indexOf(data);
		if (index > -1) {
			$scope.droppedObjects1.spliSDce(index, 1);
		}
	}
	$scope.onDragSuccess2=function(data,evt){
		var index = $scope.droppedObjects2.indexOf(data);
		if (index > -1) {
			$scope.droppedObjects2.splice(index, 1);
		}
	}
	$scope.onDropComplete2=function(data,evt){
		var index = $scope.droppedObjects2.indexOf(data);
		if (index == -1) {
			$scope.droppedObjects2.push(data);
		}
	}
	var inArray = function(array, obj) {
		var index = array.indexOf(obj);
	}
});