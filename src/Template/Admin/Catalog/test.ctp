  <base href="/">
<div ng-app="admin" ng-controller='CategoryPrintController'>
    <script type="text/ng-template" id="categoryTree">
        {{ parent.category_name }}
        <ul ng-if="parent.categories">
            <li ng-repeat="parent in parent.categories" ng-include="'categoryTree'">           
            </li>
        </ul>
    </script>
    <ul>
        <li ng-repeat="parent in parents" ng-include="'categoryTree'"></li>
    </ul>    
</div>


<?php include LAYOUT_DIR . 'script.ctp'; ?>