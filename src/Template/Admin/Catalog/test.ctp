
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="/back/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/front/public/css/mixandmatch.css" />
    <title></title>
    <style type="text/css">
        #div1 {
    float: left;
    width: 200px;
    height: 230px;
    margin: 10px;
    padding: 5px;
    border: 1px solid black;
    margin-top: 20px;
  color: #d0d0d0;
  font-size: 10pt;
  text-align: center;

}

#div2 {
    float: left;
    width: 200px;
    height: 230px;
    margin-top: 258px;
    margin-left: -210px;
    padding: 5px;
    border: 1px solid black;
    color: #d0d0d0;
  font-size: 10pt;
  text-align: center;
}
#div3 {
    float: left;
    width: 200px;
    height: 230px;
    margin-top: 500px;
    margin-left:-210px;
    padding: 5px;
    border: 1px solid black;
    color: #d0d0d0;
  font-size: 10pt;
  text-align: center;
}
#div4 {
    float: left;
    width: 150px;
    height: 180px;
    margin-top: 265px;
    margin-left: 10px;
    padding: 5px;
    border: 1px solid black;
    color: #d0d0d0;
  font-size: 10pt;
  text-align: center;
}
    </style>
</head>
<body ng-app="admin" ng-controller="TestController">

<div class="row">
    <div class= "col-xs-8">
        <div id="div1">
            <img src="{{top}}" width="185" height="195">
        </div>
        <div id="div2">
             <img src="{{bottom}}" width="185" height="195">
        </div>
        <div id="div3">
            <img src="{{footwear}}" width="185" height="195">
        </div>
        <div id="div4">
            <img src="{{accessory}}" width="130" height="110">
        </div>
    </div>
    <div class="col-xs-4">
                <div class='mixnmatch-b'>

                <div class='mixnmb-content' >

                     <div class='mixnmb-body'>

                        <div class='mixnmb-items'>
                            <ul>
                                <li >
                                    <div ng-repeat="item in items">

                                        <img src='{{item.image.file_key}}' width='75px' height='65px'/>
                                        <button ng-click = "toTop(item.image.file_key)"><small>Top</small></button>
                                        <button ng-click = "toBottom(item.image.file_key)"><small>Bottom</small></button>
                                        <button ng-click = "toFootwear(item.image.file_key)"><small>Footwear</small></button>
                                        <button ng-click = "toAccessory(item.image.file_key)"><small>Accessory</small></button>


                                    </div>
                                </li>

                            </ul>
                        </div>
                        </div>
                        </div>
                        </div>

    </div>
</div>
<?php include LAYOUT_DIR . 'script.ctp'; ?>
</body>
</html>
