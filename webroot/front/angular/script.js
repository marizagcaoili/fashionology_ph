angular.module('plunker', ['ui.bootstrap']);
var TooltipDemoCtrl = function ($scope) {
  
  $scope.items = [ 
    {name: 'foo', tooltip: 'foo ttip'},
    {name: 'bar', tooltip: 'bar ttip'},
    {name: 'baz', tooltip: 'baz ttip'}
  ];
  
};
