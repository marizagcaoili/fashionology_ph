<!doctype html>
<html >
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.js"></script>
    <script src="http://angular-ui.github.com/bootstrap/ui-bootstrap-tpls-0.1.0-SNAPSHOT.js"></script>
  


   	<script>
   		angular.module('plunker', ['ui.bootstrap']);



var TooltipDemoCtrl = function ($scope) {
  
  $scope.items = [ 
    {name: 'foo'},
    {name: 'bar'},
    {name: 'baz'}
  ];
  
};

   	</script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
  </head>
  <body ng-app="plunker">

<div ng-controller="TooltipDemoCtrl">
  
    <ul>
      <li ng-repeat="item in items"><span tooltip="On the Right!" tooltip-placement="right">{{item.name}}</span></li>
    </ul>  
      
</div>

  </body>
</html>
